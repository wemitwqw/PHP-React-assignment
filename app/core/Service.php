<?php

namespace app\core;
use app\lib\Db;

abstract class Service {
    public $db;

    public function __construct() {
        $this->db = new Db();
    }
}