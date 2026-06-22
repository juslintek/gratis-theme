#!/usr/bin/env php
<?php
/**
 * Standalone validator for the Gratis WordPress block theme.
 *
 * Pure PHP standard library — no PHPUnit, no WordPress, no Composer.
 * Static, harness-free checks that are safe to run in CI:
 *   1. `php -l` syntax lint of every PHP file in the theme (all patterns/*.php,
 *      functions.php, index.php, inc/*.php, ...), excluding this tests/ dir.
 *   2. theme.json: exists, parses, has top-level "version" + "settings"
 *      (and reports whether "styles" is present).
 *
 * Usage:  php tests/validate-theme.php
 * Exit:   0 = all checks passed, 1 = at least one check failed (CI-usable).
 *
 * ponytail: WP-runtime checks (WooCommerce template overrides, style-variation
 * runtime loading, `wp theme check`) are intentionally out of scope here — they
 * require a live WordPress + WooCommerce environment that is not available.
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
// Use the interpreter currently running this script (no hardcoded "php" path).
$php = PHP_BINARY;

// Collect every *.php file in the theme, excluding this tests/ directory.
// (Covers all patterns/*.php, functions.php, index.php, inc/*.php, etc.)
$testsDir = $themeRoot . DIRECTORY_SEPARATOR . 'tests' . DIRECTORY_SEPARATOR;
$phpFiles = [];
$iter = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($themeRoot, FilesystemIterator::SKIP_DOTS)
);
foreach ($iter as $entry) {
    if ($entry->isFile() && strtolower($entry->getExtension()) === 'php'
        && strpos($entry->getPathname(), $testsDir) !== 0) {
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

// --- Check group 2: theme.json ----------------------------------------------
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
        $report('theme.json has top-level "version"', array_key_exists('version', $data));
        $report('theme.json has top-level "settings"', array_key_exists('settings', $data));
        // "styles" is reported, not required.
        printf("[INFO] theme.json \"styles\" present: %s\n", array_key_exists('styles', $data) ? 'yes' : 'no');
    }
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
