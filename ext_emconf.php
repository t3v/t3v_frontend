<?php
/** @var string $_EXTKEY */

$EM_CONF[$_EXTKEY] = [
    'title' => 'T3v Frontend',
    'description' => 'The frontend extension of TYPO3voilà.',
    'author' => 'Maik Kempe',
    'author_email' => 'mkempe@bitaculous.com',
    'author_company' => 'Bitaculous - It\'s all about the bits, baby!',
    'category' => 'misc',
    'state' => 'stable',
    'version' => '1.0.0',
    'createDirs' => '',
    'uploadfolder' => false,
    'clearCacheOnLoad' => false,
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.0-11.5.99',
            't3v_core' => '',
            't3v_translations' => ''
        ],
        'conflicts' => [
        ],
        'suggests' => []
    ],
    'autoload' => [
        'psr-4' => [
            'T3v\\T3vFrontend\\' => 'Classes'
        ]
    ],
    'autoload-dev' => [
        'psr-4' => [
            'T3v\\T3vFrontend\\Tests\\' => 'Tests'
        ]
    ]
];
