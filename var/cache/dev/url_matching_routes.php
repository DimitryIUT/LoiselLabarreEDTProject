<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/admin' => [[['_route' => 'admin', '_controller' => 'App\\Controller\\Admin\\DashboardController::index'], null, null, null, false, false, null]],
        '/api/professeurs' => [[['_route' => 'api_professeurslist', '_controller' => 'App\\Controller\\Api\\ProfesseurController::list'], null, ['GET' => 0], null, false, false, null]],
        '/professeurs' => [[['_route' => 'professeurs_list', '_controller' => 'App\\Controller\\ProfesseurController::list'], null, ['GET' => 0], null, true, false, null]],
        '/professeurs/create' => [[['_route' => 'professeurs_create', '_controller' => 'App\\Controller\\ProfesseurController::create'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/api/professeurs/(?'
                    .'|([^/]++)(?'
                        .'|(*:38)'
                        .'|/avis(?'
                            .'|(*:53)'
                        .')'
                    .')'
                    .'|avis/([^/]++)(?'
                        .'|(*:78)'
                    .')'
                .')'
                .'|/professeurs/([^/]++)/(?'
                    .'|edit(*:116)'
                    .'|delete(*:130)'
                .')'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:167)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => 'api_professeursshow', '_controller' => 'App\\Controller\\Api\\ProfesseurController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        53 => [
            [['_route' => 'api_professeursavis', '_controller' => 'App\\Controller\\Api\\ProfesseurController::avis'], ['id'], ['GET' => 0], null, false, false, null],
            [['_route' => 'api_professeurscreate_avis', '_controller' => 'App\\Controller\\Api\\ProfesseurController::createAvis'], ['id'], ['POST' => 0], null, false, false, null],
        ],
        78 => [
            [['_route' => 'api_professeursdelete_avis', '_controller' => 'App\\Controller\\Api\\ProfesseurController::deleteAvis'], ['id'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_professeursedit_avis', '_controller' => 'App\\Controller\\Api\\ProfesseurController::editAvis'], ['id'], ['PATCH' => 0], null, false, true, null],
        ],
        116 => [[['_route' => 'professeurs_edit', '_controller' => 'App\\Controller\\ProfesseurController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        130 => [[['_route' => 'professeurs_delete', '_controller' => 'App\\Controller\\ProfesseurController::delete'], ['id'], ['GET' => 0], null, false, false, null]],
        167 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
