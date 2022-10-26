<?php
declare(strict_types=1);

/**
 * The local extension configuration.
 */

use T3v\T3vFrontend\Hooks\ContentPostProcOutputHook;

defined('TYPO3') or die();

(static function () {
    // === Variables ===

    $extensionKey = 't3v_frontend';

    // === Frontend ===

    if (TYPO3_MODE === 'FE') {
        // --- Hooks ---

        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-output'][$extensionKey] =
            ContentPostProcOutputHook::class . '->process';
    }
    // === T3v Generator ===
})();
