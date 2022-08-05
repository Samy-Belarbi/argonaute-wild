<?php

return [

    '/' => [
        'App\Controllers\HomeController',
        'show'
    ],

    '/addArgonaut' => [
        'App\Controllers\AddArgonautController',
        'add'
    ],

    '/getArgonauts' => [
        'App\Controllers\GetArgonautsController',
        'get'
    ],

    '/deleteArgonaut' => [
        'App\Controllers\DeleteArgonautController',
        'delete'
    ],

    '/krorys' => [
        'App\Controllers\KrorysController',
        'lol'
    ]
];