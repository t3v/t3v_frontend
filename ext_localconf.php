<?php
declare(strict_types=1);

/**
 * The local extension configuration.
 */

use T3v\T3vFrontend\Hooks\ContentPostProcAllHook;

defined('TYPO3') or die();

(static function () {
    // === Frontend ===

    if (TYPO3_MODE === 'FE') {
        // Registers the `ContentPostProcAllHook` for cached content:
        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-all']['zz_t3vfrontend'] =
            ContentPostProcAllHook::class . '->process';
    }

    // === T3v Generator ===
})();
