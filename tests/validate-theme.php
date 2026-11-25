#!/usr/bin/env php
<?php
/**
 * Standalone validator for the Gratis WordPress block theme.
 *
 * Pure PHP standard library — no PHPUnit, no WordPress, no Composer.
 * Static, harness-free checks that are safe to run in CI:
 *   1. `php -l` syntax lint of every PHP file in the theme (excluding tests/).
 *   2. theme.json and styles/*.json parse as valid v3 JSON.
 *   3. Zero un-normalized `--wp--preset--font-size--[2-9]xl` or
 *      `var:preset|font-size|[2-9]xl` tokens across theme.json, patterns/,
 *      parts/, templates/, and assets/css/.
 *   4. Zero hotlinked unsplash.com or pravatar.cc URLs in patterns/, parts/, templates/.
 *   5. functions.php enables editor-styles and has zero plugin-territory meta/cache output.
 *   6. style.css and readme.txt exist, declare GPL-2.0-or-later, and share the same version.
 *
 * Usage:  php tests/validate-theme.php
 * Exit:   0 = all checks passed, 1 = at least one check failed (CI-usable).
 */

declare(strict_types=1);

$themeRoot = dirname(__DIR__);

$checks   = 0;
$failures = 0;

$report = static function (string $label, bool $ok, string $detail = '') use (&$checks, &$failures): void {
    ++$checks;
    if (!$ok) {
        ++$failures;
    }
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- CLI script, not web output.
    printf("[%s] %s%s\n", $ok ? 'PASS' : 'FAIL', $label, $detail !== '' ? " — {$detail}" : '');
};

// --- Check group 1: PHP syntax lint -----------------------------------------
$php      = PHP_BINARY;
$testsDir = $themeRoot . DIRECTORY_SEPARATOR . 'tests' . DIRECTORY_SEPARATOR;
$phpFiles = [];
$iter     = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($themeRoot, FilesystemIterator::SKIP_DOTS)
);
foreach ($iter as $entry) {
    if (
        $entry->isFile()
        && strtolower($entry->getExtension()) === 'php'
        && strpos($entry->getPathname(), $testsDir) !== 0
    ) {
        $phpFiles[] = $entry->getPathname();
    }
}
sort($phpFiles);

$report('found PHP files to lint', $phpFiles !== [], count($phpFiles) . ' file(s)');

foreach ($phpFiles as $file) {
    $output = [];
    $code   = 0;
    // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.system_calls_exec -- CLI lint tool.
    exec(escapeshellarg($php) . ' -l ' . escapeshellarg($file) . ' 2>&1', $output, $code);
    $rel = ltrim(str_replace($themeRoot, '', $file), '/');
    $report("lint {$rel}", $code === 0, $code === 0 ? '' : trim(implode(' ', $output)));
}

// --- Check group 2: theme.json & styles/*.json (v3) -------------------------
$themeJsonPath = $themeRoot . '/theme.json';

if (!is_file($themeJsonPath)) {
    $report('theme.json exists', false, "missing at {$themeJsonPath}");
} else {
    $report('theme.json exists', true);
    $data = json_decode((string) file_get_contents($themeJsonPath), true); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents -- local file.

    if (!is_array($data)) {
        $report('theme.json parses as JSON', false, 'json_decode failed: ' . json_last_error_msg());
    } else {
        $report('theme.json parses as JSON', true);
        $report('theme.json is version 3', ($data['version'] ?? null) === 3);
        $report('theme.json has top-level "settings"', array_key_exists('settings', $data));
        printf("[INFO] theme.json \"styles\" present: %s\n", array_key_exists('styles', $data) ? 'yes' : 'no');
    }
}

$styleJsonFiles = glob($themeRoot . '/styles/*.json') ?: [];
sort($styleJsonFiles);
$report('styles/*.json files present', $styleJsonFiles !== [], count($styleJsonFiles) . ' variation(s)');

foreach ($styleJsonFiles as $styleJson) {
    $rel  = ltrim(str_replace($themeRoot, '', $styleJson), '/');
    $data = json_decode((string) file_get_contents($styleJson), true); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents -- local file.
    $ok   = is_array($data) && (($data['version'] ?? null) === 3);
    $report("{$rel} parses as v3 JSON", $ok, is_array($data) ? '' : json_last_error_msg());
}

// --- Check group 3: Zero un-normalized font-size tokens ---------------------
$tokenCheckFiles = array_merge(
    [$themeJsonPath],
    glob($themeRoot . '/patterns/*.php') ?: [],
    glob($themeRoot . '/parts/*.html') ?: [],
    glob($themeRoot . '/templates/*.html') ?: [],
    glob($themeRoot . '/assets/css/*.css') ?: []
);
$badFontTokenFiles = [];
foreach ($tokenCheckFiles as $file) {
    if (!is_file($file)) {
        continue;
    }
    $src = (string) file_get_contents($file); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents -- local file.
    if (
        preg_match('/var\(\s*--wp--(?:preset|custom)--[a-z-]+--[2-9]xl\b/', $src)
        || preg_match('/var:(?:preset|custom)\|[a-z-]+\|[2-9]xl\b/', $src)
    ) {
        $badFontTokenFiles[] = ltrim(str_replace($themeRoot, '', $file), '/');
    }
}
$report(
    'zero un-normalized --2xl..9xl font-size tokens',
    $badFontTokenFiles === [],
    $badFontTokenFiles === [] ? '' : implode(', ', $badFontTokenFiles)
);

// --- Check group 4: Zero hotlinked external images --------------------------
$markupFiles = array_merge(
    glob($themeRoot . '/patterns/*.php') ?: [],
    glob($themeRoot . '/parts/*.html') ?: [],
    glob($themeRoot . '/templates/*.html') ?: []
);
$hotlinkFiles = [];
foreach ($markupFiles as $file) {
    $src = (string) file_get_contents($file); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents -- local file.
    if (preg_match('/https?:\/\/[^\s"\']*(?:unsplash\.com|pravatar\.cc)/i', $src)) {
        $hotlinkFiles[] = ltrim(str_replace($themeRoot, '', $file), '/');
    }
}
$report(
    'zero hotlinked unsplash.com or pravatar.cc URLs',
    $hotlinkFiles === [],
    $hotlinkFiles === [] ? '' : implode(', ', $hotlinkFiles)
);

// --- Check group 5: functions.php editor-styles & zero plugin territory -----
$functionsPath = $themeRoot . '/functions.php';
if (!is_file($functionsPath)) {
    $report('functions.php exists', false);
} else {
    $fnSrc = (string) file_get_contents($functionsPath); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents -- local file.
    $hasEditorStyles = (bool) preg_match('/add_theme_support\s*\(\s*[\'"]editor-styles[\'"]\s*\)/', $fnSrc)
        && str_contains($fnSrc, 'add_editor_style');
    $report('functions.php registers editor-styles and add_editor_style', $hasEditorStyles);

    $hasPluginTerritory = str_contains($fnSrc, '<meta property="og:')
        || str_contains($fnSrc, '<meta name="description"')
        || str_contains($fnSrc, 'Cache-Control:');
    $report('functions.php free of plugin-territory meta/Cache-Control output', !$hasPluginTerritory);
}

// --- Check group 6: style.css & readme.txt headers + version sync -----------
$styleCssPath  = $themeRoot . '/style.css';
$readmeTxtPath = $themeRoot . '/readme.txt';

$styleOk  = is_file($styleCssPath);
$readmeOk = is_file($readmeTxtPath);
$report('style.css and readme.txt exist', $styleOk && $readmeOk);

if ($styleOk && $readmeOk) {
    $styleSrc  = (string) file_get_contents($styleCssPath); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents -- local file.
    $readmeSrc = (string) file_get_contents($readmeTxtPath); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents -- local file.

    $styleGpl  = (bool) preg_match('/^License:\s*GPL-2\.0-or-later\b/mi', $styleSrc);
    $readmeGpl = (bool) preg_match('/^License:\s*GPL-2\.0-or-later\b/mi', $readmeSrc);
    $report('style.css and readme.txt declare GPL-2.0-or-later', $styleGpl && $readmeGpl);

    $styleVer  = preg_match('/^Version:\s*([0-9]+\.[0-9]+\.[0-9]+)\b/mi', $styleSrc, $sm) ? $sm[1] : '';
    $readmeVer = preg_match('/^=\s*([0-9]+\.[0-9]+\.[0-9]+)\s*=\s*$/m', $readmeSrc, $rm) ? $rm[1] : '';
    $report(
        'style.css Version matches latest readme.txt changelog version',
        $styleVer !== '' && $styleVer === $readmeVer,
        "style.css={$styleVer}, readme.txt={$readmeVer}"
    );
}

// --- Summary ----------------------------------------------------------------
// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- CLI script.
echo str_repeat('-', 60), "\n";
if ($failures === 0) {
    printf("SUMMARY: PASS — %d checks, 0 failures\n", $checks); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    exit(0);
}
// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- CLI script.
printf("SUMMARY: FAIL — %d checks, %d failure(s)\n", $checks, $failures);
exit(1);
