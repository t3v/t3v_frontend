<?php
declare(strict_types=1);

namespace T3v\T3vFrontend\Hooks;

use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;

/**
 * The content post proc all hook class.
 *
 * @package T3v\T3vFrontend\Hooks
 */
class ContentPostProcAllHook
{
    /**
     * Processes the content output.
     *
     * @param array $parameters The parameters passed by the caller
     * @param TypoScriptFrontendController $typoScriptFrontendController The reference to the TypoScript frontend controller
     */
    public function process(array $parameters, TypoScriptFrontendController $typoScriptFrontendController): void
    {
        if (TYPO3_MODE === 'FE') {
            // Skips pages with USER_INT plugins:
            if ($typoScriptFrontendController->isINTincScript()) {
                return;
            }

            // Fetches the configuration:
            $configuration = $typoScriptFrontendController->config['config']['tx_t3vfrontend.'];

            // Quits if no search and replace configuration was found:
            if (!empty($configuration) && !is_array($configuration['search.']) || !is_array($configuration['replace.'])) {
                return;
            }

            // Replaces the content based on the configuration:
            $parameters['pObj']->content = preg_replace(
                $configuration['search.'],
                $configuration['replace.'],
                $parameters['pObj']->content
            );
        }
    }
}
