<?php

namespace app\core;

abstract class Controller {

    public $route;
    // public $model;
    public $service;

    public function __construct($route) {
        $this->route = $route;
        // $this->model = $this->loadModel($route['controller']);
        $this->service = $this->loadService($route['controller']);
    }

    // public function loadModel($model) {
    //     $path = 'app\models\\'.ucfirst($model);
    //     if (class_exists($path)) {
    //         return new $path;
    //     }
    // }
    
    public function loadService($service) {
        $path = 'app\services\\'.ucfirst($service).'Service';
        if (class_exists($path)) {
            return new $path;
        }
    }
}
