<?php

namespace app\services;
use app\core\service;
use app\models\itemmodel;

class MainService extends Service {
    public function getAllItems() {
        $result = $this->db->row('SELECT id, name FROM items');
        
        foreach ($result as $item => $val) {
            $itemList[] = new ItemModel($val['id'], $val['name']);
        }

        return $itemList;
    }
}