<?php

namespace app\core;

abstract class Controller {

    public $route;
    public $model;

    public function __construct($route) {
        $this->route = $route;
        $this->model = $this->loadModel($route['controller']);
        // debug($this->model);
    }

    public function loadModel($model) {
        $path = 'app\models\\'.ucfirst($model);
        if (class_exists($path)) {
            return new $path;
        }
        
    }
}
