<?php

namespace MVCApp\Controller;

class BaseController
{
    protected $repository;

    /**
     * @param $template
     * @param null $params
     */
    public function view($template, $params=null){
        if($params){
            extract($params);
        }
        require '../src/View/'.$template.'.php';
    }

    /**
     * @param $route
     */
    public function redirect($route){
        header('Location: '.strtok($_SERVER['REQUEST_URI'], '?').'?route='.$route);
        exit;
    }

}