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
     * Replaces the content output.
     *
     * @param array $parameters The parameters delivered by the caller (`tslib_fe`)
     * @param TypoScriptFrontendController $parentObject The parent object (`tslib_fe`)
     */
    public function replaceContent(array &$parameters, TypoScriptFrontendController $parentObject): void
    {
        if (TYPO3_MODE === 'FE') {
            // Fetches the configuration:
            $configuration = $parentObject->config['config']['tx_t3vfrontend.'];

            // Quits if no search and replace configuration was found:
            if (!is_array($configuration['search.']) || !is_array($configuration['replace.'])) {
                return;
            }

            // Replaces the content:
            $parameters['pObj']->content = preg_replace(
                $configuration['search.'],
                $configuration['replace.'],
                $parameters['pObj']->content
            );
        }
    }
}
