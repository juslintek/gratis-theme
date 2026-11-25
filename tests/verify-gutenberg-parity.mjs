#!/usr/bin/env node
/**
 * Durable Gutenberg block-validation & Editor-vs-Frontend 1:1 style parity test.
 *
 * 1. Renders all 22 PHP patterns (via PHP with lightweight WP i18n/URI stubs)
 *    plus all 18 HTML templates and 5 template parts (45 files total).
 * 2. Logs into WordPress Gutenberg (`/wp-admin/post-new.php?post_type=page`)
 *    and validates every single file through `wp.blocks.parse()`, asserting
 *    0 invalid blocks across all 45 files.
 * 3. Inserts representative patterns (`hero-split`, `features-grid`,
 *    `pricing-cards`) into a temporary page, saves/publishes it, measures
 *    computed styles inside Gutenberg's `editor-canvas` iframe vs the live
 *    frontend page, and asserts 1:1 parity (canvas background, heading color,
 *    font family/weight, button styling, and visible animation opacity).
 *
 * Usage:
 *   BASE_URL=http://localhost:8888 node gratis-theme/tests/verify-gutenberg-parity.mjs
 */

import fs from 'node:fs';
import path from 'node:path';
import { execFileSync } from 'node:child_process';
import { createRequire } from 'node:module';
import { fileURLToPath } from 'node:url';

const __dirname = path.dirname(fileURLToPath(import.meta.url));
const THEME_DIR = path.resolve(__dirname, '..');
const SUITE_E2E_PKG = path.resolve(THEME_DIR, '..', 'gratis-suite', 'tests', 'e2e', 'package.json');

const require = createRequire(fs.existsSync(SUITE_E2E_PKG) ? SUITE_E2E_PKG : import.meta.url);
const { chromium } = require('@playwright/test');

const BASE_URL = (process.env.BASE_URL || 'http://localhost:8888').replace(/\/$/, '');
const WP_USER = process.env.WP_USER || 'admin';
const WP_PASS = process.env.WP_PASS || 'admin';
const KEEP_PAGE = process.env.KEEP_PAGE === '1';

function renderPatternPhp(filePath) {
  const runner = `
    error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
    if (!defined('ABSPATH')) { define('ABSPATH', '/tmp/'); }
    function __($t, $d = 'default') { return $t; }
    function esc_html__($t, $d = 'default') { return htmlspecialchars($t, ENT_QUOTES, 'UTF-8'); }
    function esc_attr__($t, $d = 'default') { return htmlspecialchars($t, ENT_QUOTES, 'UTF-8'); }
    function esc_html_e($t, $d = 'default') { echo htmlspecialchars($t, ENT_QUOTES, 'UTF-8'); }
    function esc_attr_e($t, $d = 'default') { echo htmlspecialchars($t, ENT_QUOTES, 'UTF-8'); }
    function esc_html($t) { return htmlspecialchars((string)$t, ENT_QUOTES, 'UTF-8'); }
    function esc_attr($t) { return htmlspecialchars((string)$t, ENT_QUOTES, 'UTF-8'); }
    function esc_url($u) { return htmlspecialchars((string)$u, ENT_QUOTES, 'UTF-8'); }
    function wp_kses($t, $a = []) { return (string)$t; }
    function wp_kses_post($t) { return (string)$t; }
    function get_template_directory_uri() { return '${BASE_URL}/wp-content/themes/gratis-theme'; }
    function get_theme_file_uri($f = '') { return '${BASE_URL}/wp-content/themes/gratis-theme/' . ltrim($f, '/'); }
    function home_url($p = '') { return '${BASE_URL}/' . ltrim($p, '/'); }
    include $argv[1];
  `;
  return execFileSync('php', ['-r', runner, filePath], { encoding: 'utf8' });
}

function collectThemeMarkupFiles() {
  const files = [];
  for (const dir of ['patterns', 'templates', 'parts']) {
    const fullDir = path.join(THEME_DIR, dir);
    for (const entry of fs.readdirSync(fullDir).sort()) {
      const fullPath = path.join(fullDir, entry);
      if (dir === 'patterns' && entry.endsWith('.php')) {
        files.push({ rel: `${dir}/${entry}`, content: renderPatternPhp(fullPath) });
      } else if (entry.endsWith('.html')) {
        files.push({ rel: `${dir}/${entry}`, content: fs.readFileSync(fullPath, 'utf8') });
      }
    }
  }
  return files;
}

async function loginWp(page) {
  await page.goto(`${BASE_URL}/wp-login.php`, { waitUntil: 'domcontentloaded' });
  await page.fill('#user_login', WP_USER);
  await page.fill('#user_pass', WP_PASS);
  await Promise.all([
    page.waitForURL(/\/wp-admin\//, { timeout: 20_000 }),
    page.click('#wp-submit'),
  ]);
}

async function main() {
  const themeFiles = collectThemeMarkupFiles();
  console.log(`Collected ${themeFiles.length} theme block files (patterns + templates + parts).`);
  if (themeFiles.length !== 45) {
    throw new Error(`Expected 45 block files (22 patterns + 18 templates + 5 parts), found ${themeFiles.length}`);
  }

  const browser = await chromium.launch({ headless: true });
  const context = await browser.newContext({ viewport: { width: 1440, height: 900 } });
  const page = await context.newPage();
  let createdPostId = null;

  try {
    await loginWp(page);

    // 1. Validate all 45 files via Gutenberg wp.blocks.parse().
    await page.goto(`${BASE_URL}/wp-admin/post-new.php?post_type=page`, { waitUntil: 'domcontentloaded' });
    await page.waitForFunction(() => Boolean(window.wp && window.wp.blocks && window.wp.data), { timeout: 30_000 });

    const validationResults = await page.evaluate((files) => {
      function checkBlocks(blocks, trail = []) {
        const errors = [];
        for (const b of blocks) {
          const pathStr = [...trail, b.name].join(' > ');
          const isUnregisteredWoo =
            b.name === 'core/missing' &&
            b.isValid &&
            String(b.attributes?.originalName || '').startsWith('woocommerce/');
          if (!b.isValid || (b.name === 'core/missing' && !isUnregisteredWoo)) {
            errors.push({
              block: pathStr,
              isValid: b.isValid,
              originalName: b.attributes?.originalName || null,
              issues: (b.validationIssues || []).map((i) => i.log || String(i)),
            });
          }
          if (Array.isArray(b.innerBlocks) && b.innerBlocks.length > 0) {
            errors.push(...checkBlocks(b.innerBlocks, [...trail, b.name]));
          }
        }
        return errors;
      }

      return files.map((f) => {
        const parsed = window.wp.blocks.parse(f.content);
        const errors = checkBlocks(parsed);
        return { rel: f.rel, blockCount: parsed.length, errors };
      });
    }, themeFiles);

    const invalidFiles = validationResults.filter((r) => r.errors.length > 0 || r.blockCount === 0);
    for (const r of validationResults) {
      if (r.errors.length > 0 || r.blockCount === 0) {
        console.error(`FAIL ${r.rel}: blocks=${r.blockCount}, errors=${JSON.stringify(r.errors)}`);
      }
    }
    if (invalidFiles.length > 0) {
      throw new Error(`${invalidFiles.length}/${themeFiles.length} theme files had invalid Gutenberg blocks.`);
    }
    console.log(`PASS: ${validationResults.length}/${validationResults.length} files have 0 invalid blocks in wp.blocks.parse().`);

    // 2. Insert representative patterns, publish a test page, and compare Editor vs Frontend computed styles.
    const parityContent = [
      'hero-split.php',
      'features-grid.php',
      'pricing-cards.php',
    ]
      .map((name) => themeFiles.find((f) => f.rel === `patterns/${name}`)?.content || '')
      .join('\n\n');

    const created = await page.evaluate(async (content) => {
      const { dispatch, select } = window.wp.data;
      const blocks = window.wp.blocks.parse(content);
      await dispatch('core/editor').editPost({ title: 'Gutenberg Parity Check', status: 'publish' });
      await dispatch('core/block-editor').resetBlocks(blocks);
      await dispatch('core/editor').savePost();
      return {
        id: select('core/editor').getCurrentPostId(),
        link: select('core/editor').getPermalink(),
      };
    }, parityContent);

    // Wait for save to settle.
    await page.waitForFunction(
      () => !window.wp.data.select('core/editor').isSavingPost() && window.wp.data.select('core/editor').getPermalink(),
      { timeout: 15_000 }
    );
    const postInfo = await page.evaluate(() => ({
      id: window.wp.data.select('core/editor').getCurrentPostId(),
      link: window.wp.data.select('core/editor').getPermalink(),
    }));
    createdPostId = postInfo.id || created.id;

    // Reload editor on saved page so editor-canvas iframe reflects full saved state.
    await page.goto(`${BASE_URL}/wp-admin/post.php?post=${createdPostId}&action=edit`, { waitUntil: 'domcontentloaded' });
    const canvasLocator = page.frameLocator('iframe[name="editor-canvas"]');
    await canvasLocator.locator('h1').first().waitFor({ timeout: 30_000 });
    const editorFrame = page.frame({ name: 'editor-canvas' });
    if (!editorFrame) {
      throw new Error('Could not find Gutenberg editor-canvas iframe');
    }

    const editorMetrics = await editorFrame.evaluate(() => {
      const h1 = document.querySelector('h1.wp-block-heading') || document.querySelector('h1');
      const h2 = document.querySelector('h2.wp-block-heading') || document.querySelector('h2');
      const body = document.body;
      const btn = document.querySelector('.wp-block-button__link');
      const hiddenAnimate = Array.from(document.querySelectorAll('.gratis-animate')).filter(
        (el) => parseFloat(getComputedStyle(el).opacity) === 0
      ).length;
      return {
        bodyBg: getComputedStyle(body).backgroundColor,
        bodyFont: getComputedStyle(body).fontFamily,
        h1Color: h1 ? getComputedStyle(h1).color : null,
        h1Font: h1 ? getComputedStyle(h1).fontFamily : null,
        h1Weight: h1 ? getComputedStyle(h1).fontWeight : null,
        h2Color: h2 ? getComputedStyle(h2).color : null,
        btnBg: btn ? getComputedStyle(btn).backgroundColor : null,
        btnColor: btn ? getComputedStyle(btn).color : null,
        hiddenAnimate,
      };
    });

    const frontPage = await context.newPage();
    await frontPage.goto(postInfo.link, { waitUntil: 'load' });
    const frontendMetrics = await frontPage.evaluate(() => {
      const h1 = document.querySelector('main h1.wp-block-heading, .wp-block-post-content h1.wp-block-heading, h1.wp-block-heading');
      const h2 = document.querySelector('main h2.wp-block-heading, .wp-block-post-content h2.wp-block-heading, h2.wp-block-heading');
      const body = document.body;
      const btn = document.querySelector('.wp-block-post-content .wp-block-button__link, main .wp-block-button__link');
      return {
        bodyBg: getComputedStyle(body).backgroundColor,
        bodyFont: getComputedStyle(body).fontFamily,
        h1Color: h1 ? getComputedStyle(h1).color : null,
        h1Font: h1 ? getComputedStyle(h1).fontFamily : null,
        h1Weight: h1 ? getComputedStyle(h1).fontWeight : null,
        h2Color: h2 ? getComputedStyle(h2).color : null,
        btnBg: btn ? getComputedStyle(btn).backgroundColor : null,
        btnColor: btn ? getComputedStyle(btn).color : null,
      };
    });
    await frontPage.close();

    console.log('Editor metrics:  ', JSON.stringify(editorMetrics));
    console.log('Frontend metrics:', JSON.stringify(frontendMetrics));

    if (editorMetrics.hiddenAnimate !== 0) {
      throw new Error(`Found ${editorMetrics.hiddenAnimate} .gratis-animate elements with opacity:0 inside editor!`);
    }

    const keys = ['bodyBg', 'bodyFont', 'h1Color', 'h1Font', 'h1Weight', 'h2Color', 'btnBg', 'btnColor'];
    const mismatches = keys.filter((k) => editorMetrics[k] !== frontendMetrics[k]);
    if (mismatches.length > 0) {
      throw new Error(`Editor <-> Frontend style mismatch on: ${mismatches.join(', ')}`);
    }
    console.log('PASS: 1:1 Editor <-> Frontend computed styles match across all checked properties.');
  } finally {
    if (createdPostId && !KEEP_PAGE) {
      try {
        await page.evaluate(async (id) => {
          if (window.wp?.apiFetch) {
            await window.wp.apiFetch({ path: `/wp/v2/pages/${id}?force=true`, method: 'DELETE' });
          }
        }, createdPostId);
      } catch {
        // Best-effort cleanup.
      }
    }
    await browser.close();
  }
}

main().catch((err) => {
  console.error(err);
  process.exit(1);
});
