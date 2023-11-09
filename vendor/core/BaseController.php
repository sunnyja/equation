<?php

namespace vendor\core;

abstract class BaseController
{
    public $route = [];
    public $view;
    public function __construct($route)
    {
        $this->route = $route;
        $this->view = $route[Router::ACTION];
        include APP . "/views/{$route[Router::CONTROLLER]}/{$this->view}.php";
    }
}