<?php

namespace MVCApp\Core;


class Route
{
    public $name;
    public $path;
    public $controller;
    public $action;
    public $options;

    /**
     * Route constructor.
     * @param $name
     * @param $path
     * @param $controller
     * @param $action
     * @param $options
     */
    public function __construct($name, $path, $controller, $action, $options = null)
    {
        $this->name = $name;
        $this->path = $path;
        $this->controller = $controller;
        $this->action = $action;
        $this->options = $options;
    }


}