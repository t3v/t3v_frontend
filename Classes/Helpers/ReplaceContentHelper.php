<?php
declare(strict_types=1);

namespace T3v\T3vFrontend\Helpers;

use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;

use function preg_replace;

/**
 * The replace content helper class.
 *
 * The helper encapsulates the content replacement functionality.
 *
 * @package T3v\T3vFrontend\Helpers
 */
class ReplaceContentHelper
{
    /**
     * Searches and replaces content via TypoScript setup.
     *
     * The search and replace patterns must be set via TypoScript:
     *
     * config {
     *   tx_t3vfrontend {
     *     search {
     *       1 = ~T3v~
     *       2 = ~TYPO3~
     *     }
     *
     *     replace {
     *       1 = TYPO3voilà
     *       2 = TYPO3 Inspire People to Share
     *     }
     *   }
     * }
     *
     * @param string $contentToReplace The content to replace
     * @param TypoScriptFrontendController $typoScriptFrontendController The reference to the TypoScript frontend controller
     * @return string The replaced content
     */
    public function replace(string $contentToReplace, TypoScriptFrontendController $typoScriptFrontendController): string
    {
        // Fetches the configuration:
        $configuration = $typoScriptFrontendController->config['config']['tx_t3vfrontend.'] ?? [];

        // Checks if the search and replace configuration is available:
        if (!empty($configuration) && !empty($configuration['search.']) && !empty($configuration['replace.'])) {
            // Replaces the content based on the configuration:
            $contentToReplace = preg_replace($configuration['search.'], $configuration['replace.'], $contentToReplace);
        }

        return $contentToReplace;
    }
}
