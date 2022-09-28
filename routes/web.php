<?php

use CoffeeCode\Router\Router;

/* define a URL padrão do sistema para o mapeamento das rotas */

$router = new Router(getenv('APP_URL'));

/**
 * Mapeamento do Path dos (Controllers)
 */
$router->namespace("app\Controllers");

/**
 * Página de start da aplicação
 */
$router->group( group: null );
$router->get( route: "/", handler: "Auth\LoginController:index");

/**
 * Controller Auth
 */
$router->group( group: "auth" );
$router->get( route: "/create-user", handler: "Auth\CreateController:index");
$router->post( route: "/create-user", handler: "Auth\CreateController:store");
$router->get( route: "/forgot-password", handler: "Auth\ForgotPasswordController:index");

$router->group( group: "login" );
$router->post( route: "/", handler: "Auth\LoginController:store" );

/**
 * Controller Admin
 */
$router->group( group: "admin" );
$router->get( route: "/dashboard", handler: "Admin\DashboardController:index");

/**
 * Controller Pages
 */
$router->group( group: "page" );
$router->get( route: "/home", handler: "Pages\HomeController:index");

/**
 * Group Error
 * This monitors all Router errors. Are they: 400 Bad Request, 404 Not Found, 405 Method Not Allowed and 501 Not Implemented
 */
$router->group("error")->namespace("Test");
$router->get("/{errcode}", "Coffee:notFound");

/**
 * This method executes the routes
 */
$router->dispatch();

/*
 * Redirect all errors
 */
if ($router->error()) {
    $router->redirect("/error/{$router->error()}");
}
