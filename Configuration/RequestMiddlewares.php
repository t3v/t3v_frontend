<?php
declare(strict_types=1);

/**
 * The request middlewares configuration.
 */

use T3v\T3vFrontend\Middleware\ReplaceContentMiddleware;

return [
    'frontend' => [
        't3v/t3v_frontend/replace-content' => [
            'target' => ReplaceContentMiddleware::class,
            'after' => [
                'typo3/cms-frontend/maintenance-mode'
            ]
        ]
    ]
];
