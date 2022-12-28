<?php
declare(strict_types=1);

namespace T3v\T3vFrontend\Hooks;

use T3v\T3vFrontend\Helpers\ReplaceContentHelper;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;

/**
 * The content post proc all hook class.
 *
 * @package T3v\T3vFrontend\Hooks
 */
class ContentPostProcAllHook
{
    /**
     * Processes the content via the legacy `contentPostProc-all` hook for older TYPO3 versions.
     *
     * For TYPO3 versions greater than 10.4, the `ReplaceContentMiddleware` will be used.
     *
     * @param array $parameters The parameters passed by the caller
     * @param TypoScriptFrontendController $typoScriptFrontendController The reference to the TypoScript frontend controller
     */
    public function process(array $parameters, TypoScriptFrontendController $typoScriptFrontendController): void
    {
        if ($typoScriptFrontendController->isINTincScript()) {
            return;
        }

        $replaceContentHelper = GeneralUtility::makeInstance(ReplaceContentHelper::class);

        $typoScriptFrontendController->content = $replaceContentHelper->replace(
            $typoScriptFrontendController->content,
            $typoScriptFrontendController
        );
    }
}
