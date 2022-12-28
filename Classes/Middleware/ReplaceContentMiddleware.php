<?php
declare(strict_types=1);

namespace T3v\T3vFrontend\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use T3v\T3vFrontend\Helpers\ReplaceContentHelper;
use TYPO3\CMS\Core\Http\NullResponse;
use TYPO3\CMS\Core\Http\Stream;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * The replace content middleware class.
 *
 * @package T3v\T3vFrontend\Middleware
 */
class ReplaceContentMiddleware implements MiddlewareInterface
{
    /**
     * Process an incoming server request.
     *
     * Processes an incoming server request in order to produce a response.
     * If unable to produce the response itself, it may delegate to the provided request handler to do so.
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $response = $handler->handle($request);

        if ($response instanceof NullResponse || !$GLOBALS['TSFE']->isINTincScript()) {
            return $response;
        }

        $content = GeneralUtility::makeInstance(ReplaceContentHelper::class)->replace((string)$response->getBody(), $GLOBALS['TSFE']);
        $body = new Stream('php://temp', 'rw');
        $body->write($content);

        return $response->withBody($body);
    }
}
