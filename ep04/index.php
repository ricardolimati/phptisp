<?php
require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);

/*
 * Controller
 */
$router->namespace("Source\App");

/*
 * Web
 * home
 */
$router->group(null);
$router->get("/", "Web:home");
$router->get("/{filter}", "Web:home");
$router->get("/{filter}/{page}", "Web:home");

/*
 * Contato
 */
$router->group("contato");
$router->get("/", "Web:contact");
$router->post("/", "Web:contact");

/*
 * Blog
 */
$router->group("blog");
$router->get("/", "Web:blog");
$router->get("/{post_uri}", "Web:post");
$router->get("/categoria/{cat_uri}", "Web:category");


$router->group('admin');
$router->get("/", "Admin:home");


/*
 * Erros
 */
$router->group('ooops');
$router->get("/{errcode}", "Web:error");


$router->dispatch();
if($router->error()){
  $router->redirect("/ooops/{$router->error()}");
}
