<?php

use CoffeeCode\Router\Router;

/* define a URL padrão do sistema para o mapeamento das rotas */
$router = new Router(getenv('APP_URL'));

/**
 * Controllers Mapping
 */
$router->namespace("app\Controllers");

$router->group( group: null );
$router->get( route: "/", handler: "WelcomeController:index" );


$router->group( group: "auth" );
$router->get("/login", "Auth\LoginController:index");
$router->get("/create-user", "Auth\CreateController:index");
$router->get("/forgot-password", "Auth\ForgotPasswordController:index");

/**
 * Controller Admin
 */
$router->group( group: "admin" );
$router->get("/dashboard", "Admin\DashboardController:index");

/**
 * Controller Pages
 */
$router->group( group: "page" );
$router->get("/home", "Pages\HomeController:index");

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