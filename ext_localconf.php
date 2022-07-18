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

        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-output'][$extensionKey] =
            \T3v\T3vFrontend\Hooks\ContentPostProcOutputHook::class . '->process';
    }
    // === T3v Generator ===
})();
