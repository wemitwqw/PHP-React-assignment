<?php

namespace app\models;
use app\core\model;

class Main extends Model {
    public function getItems() {
        $result = $this->db->row('SELECT name, id FROM items');
        return $result;
    }
}