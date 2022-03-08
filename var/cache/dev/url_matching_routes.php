<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/admin' => [[['_route' => 'admin', '_controller' => 'App\\Controller\\Admin\\DashboardController::index'], null, null, null, false, false, null]],
        '/agenda' => [[['_route' => 'agenda_index', '_controller' => 'App\\Controller\\AgendaController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/cours' => [[['_route' => 'api_cours_index', '_controller' => 'App\\Controller\\Api\\CoursController::index'], null, ['GET' => 0], null, false, false, null]],
        '/api/professeurs' => [[['_route' => 'api_professeurs_list', '_controller' => 'App\\Controller\\Api\\ProfesseurController::list'], null, ['GET' => 0], null, false, false, null]],
        '/api/salles' => [[['_route' => 'api_salles_index', '_controller' => 'App\\Controller\\Api\\SalleController::index'], null, ['GET' => 0], null, false, false, null]],
        '/professeurs' => [[['_route' => 'professeurs_list', '_controller' => 'App\\Controller\\ProfesseurController::list'], null, ['GET' => 0], null, true, false, null]],
        '/professeurs/create' => [[['_route' => 'professeurs_create', '_controller' => 'App\\Controller\\ProfesseurController::create'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/api/(?'
                    .'|cours/([^/]++)(*:29)'
                    .'|professeurs/(?'
                        .'|([^/]++)/avis(?'
                            .'|(*:67)'
                        .')'
                        .'|avis/([^/]++)(?'
                            .'|(*:91)'
                        .')'
                        .'|daily/([^/]++)(*:113)'
                    .')'
                    .'|salles/([^/]++)(*:137)'
                .')'
                .'|/professeurs/([^/]++)/(?'
                    .'|edit(*:175)'
                    .'|delete(*:189)'
                .')'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:226)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        29 => [[['_route' => 'api_cours_showDaily', '_controller' => 'App\\Controller\\Api\\CoursController::showDaily'], ['date'], ['GET' => 0], null, false, true, null]],
        67 => [
            [['_route' => 'api_professeurs_avis', '_controller' => 'App\\Controller\\Api\\ProfesseurController::avis'], ['id'], ['GET' => 0], null, false, false, null],
            [['_route' => 'api_professeurs_create_avis', '_controller' => 'App\\Controller\\Api\\ProfesseurController::createAvis'], ['id'], ['POST' => 0], null, false, false, null],
        ],
        91 => [
            [['_route' => 'api_professeurs_delete_avis', '_controller' => 'App\\Controller\\Api\\ProfesseurController::deleteAvis'], ['id'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_professeurs_edit_avis', '_controller' => 'App\\Controller\\Api\\ProfesseurController::editAvis'], ['id'], ['PATCH' => 0], null, false, true, null],
        ],
        113 => [[['_route' => 'api_professeurs_show', '_controller' => 'App\\Controller\\Api\\ProfesseurController::showDaily'], ['date'], ['GET' => 0], null, false, true, null]],
        137 => [[['_route' => 'api_salles_show', '_controller' => 'App\\Controller\\Api\\SalleController::show'], ['numero'], ['GET' => 0], null, false, true, null]],
        175 => [[['_route' => 'professeurs_edit', '_controller' => 'App\\Controller\\ProfesseurController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        189 => [[['_route' => 'professeurs_delete', '_controller' => 'App\\Controller\\ProfesseurController::delete'], ['id'], ['GET' => 0], null, false, false, null]],
        226 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
