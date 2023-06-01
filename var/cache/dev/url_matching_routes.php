<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'home', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null]],
        '/teams' => [[['_route' => 'team_index', '_controller' => 'App\\Controller\\TeamController::index'], null, ['GET' => 0], null, false, false, null]],
        '/teams/create' => [[['_route' => 'team_create', '_controller' => 'App\\Controller\\TeamController::create'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/players' => [[['_route' => 'player_index', '_controller' => 'App\\Controller\\PlayerController::index'], null, ['GET' => 0], null, false, false, null]],
        '/players/create' => [[['_route' => 'player_create', '_controller' => 'App\\Controller\\PlayerController::create'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/player/transfer' => [[['_route' => 'player_transfer', '_controller' => 'App\\Controller\\TransferController::transfer'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/teams/([^/]++)/(?'
                    .'|edit(*:192)'
                    .'|delete(*:206)'
                .')'
                .'|/players/([^/]++)/(?'
                    .'|edit(*:240)'
                    .'|delete(*:254)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        192 => [[['_route' => 'team_edit', '_controller' => 'App\\Controller\\TeamController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        206 => [[['_route' => 'team_delete', '_controller' => 'App\\Controller\\TeamController::delete'], ['id'], ['DELETE' => 0], null, false, false, null]],
        240 => [[['_route' => 'player_edit', '_controller' => 'App\\Controller\\PlayerController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        254 => [
            [['_route' => 'player_delete', '_controller' => 'App\\Controller\\PlayerController::delete'], ['id'], ['DELETE' => 0], null, false, false, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
