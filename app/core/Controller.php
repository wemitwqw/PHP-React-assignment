<?php

namespace app\core;

abstract class Controller {

    public $route;
    public $service;

    public function __construct($route) {
        $this->route = $route;
        $this->service = $this->loadService($route['controller']);
    }
    
    public function loadService($service) {
        $path = 'app\services\\'.ucfirst($service).'Service';
        if (class_exists($path)) {
            return new $path;
        }
    }
}
