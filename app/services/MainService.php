<?php

namespace app\services;
use app\core\service;
use app\models\mainmodel;

class Main extends Service {
    public function getAllItems() {
        $result = $this->db->row('SELECT id, name FROM items');
        debug(new Main);


        return $result;
    }
}