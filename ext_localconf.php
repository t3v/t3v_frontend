<?php
/**
 * The local extension configuration.
 *
 * @noinspection PhpFullyQualifiedNameUsageInspection
 */

defined('TYPO3_MODE') or die();

(static function () {
    // === Variables ===

    $extensionKey = 't3v_frontend';

    // === Frontend ===

    if (TYPO3_MODE === 'FE') {
        // --- Hooks ---

        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-all'][$extensionKey] =
            \T3v\T3vFrontend\Hooks\ContentPostProcAllHook::class . '->replaceContent';
    }

    // === T3v Generator ===
})();
