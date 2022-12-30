<?php
/**
 * The local extension configuration.
 *
 * @noinspection PhpFullyQualifiedNameUsageInspection
 */

defined('TYPO3_MODE') or die();

(static function () {
    // === Frontend ===

    if (TYPO3_MODE === 'FE') {
        // Registers the `ContentPostProcAllHook` for cached content:
        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-all']['zz_t3vfrontend'] =
            \T3v\T3vFrontend\Hooks\ContentPostProcAllHook::class . '->process';
    }

    // === T3v Generator ===
})();
