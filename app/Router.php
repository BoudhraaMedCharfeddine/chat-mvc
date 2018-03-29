<?php

use MVCApp\Core\Route;

class Router
{
    /**
     * @var array
     */
    protected $routes;

    /**
     * register routes of application
     */
    public function registerRoutes(){
        $this->routes =  [
            new  Route("home","/","UserController","index"),
            new  Route("login","/login","UserController","login"),
            new  Route("logout","/logout","UserController","logout"),
            new  Route("messages-list","/message/list","MessageController","list"),
            new  Route("new-message","/message/new","MessageController","new"),
        ];
    }

    /**
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }

}