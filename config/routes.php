<?php

return [

    '/' => [
        'App\Controllers\HomeController',
        'show'
    ],

    '/addargonaut' => [
        'App\Controllers\AddArgonautController',
        'add'
    ],

    '/getargonauts' => [
        'App\Controllers\GetArgonautsController',
        'get'
    ],

    '/deleteargonaut' => [
        'App\Controllers\DeleteArgonautController',
        'delete'
    ]
];