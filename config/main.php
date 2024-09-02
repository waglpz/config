<?php

declare(strict_types=1);

\Locale::setDefault('de_DE.utf8');

return [
    'anonymizeLog'         => [
        'PAYLOAD' => ['apiSecret' => '*****'],
        '_SERVER' => [
            'DB_PASSWD' => '*****',
            'DB_USER'   => '*****',
        ],
        '_POST'   => [/* set here necessary keys wich should be anonymized in log*/],
    ],
    'logErrorsDir'         => $_SERVER['LOG_DIR'],
//    'router'               => include 'router.php',
//    'db'                   => include 'db.php',
    'logger'               => include 'logger.php',
//    'sso'                  => include 'sso.php',
//    'redirect_after_login' => '/',

//    'view'                 => [
//        'templates'  => \dirname(__DIR__) . '/templates/',
//        'attributes' => ['webseitenTitle' => 'Testseite'],
//        'layout'     => 'layout.phtml',
//    ],
    //uncomment to enable exception handler
//    'exception_handler'    => ExceptionHandler::class,

    //install waglpz/webapp-security component and uncomment to enable firewall
//    'firewall'             => include 'firewall.php',

//    'apiVersion'           => '0.1.0',
//    'swagger_scheme_file'  => __DIR__ . '/../swagger.json',
];
