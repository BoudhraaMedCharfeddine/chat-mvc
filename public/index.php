<?php

require_once '../vendor/autoload.php';

if(!isset($_SESSION)) {
    session_start();
}

$router = new Router();
$router->registerRoutes();
$routes = $router->getRoutes();

if(isset($_REQUEST['route'])){
    $requestedRoute = $_REQUEST['route'];
}
elseif(isset($_GET['route'])){
    $requestedRoute = $_GET['route'];
}else{
    $requestedRoute ="/";
}

$foundRoute = false;
$currentRoute = null;
foreach ($routes as $route){
    if($route->path === $requestedRoute){
        $currentRoute = $route;
        $foundRoute = true;
    }
}
if(!$foundRoute){
    die("Route ".$requestedRoute." Not found");
}else{
    $currentController = 'MVCApp\Controller\\'.$currentRoute->controller;
    $controller = new $currentController;
    $currentAction = $currentRoute->action;

    $result = $controller->$currentAction();
}



