<?php

namespace app\controllers;

use app\lib\Db;
use app\core\Controller;

class MainController extends Controller {
    public function indexAction() {
        $result = $this->model->getItems();
        echo json_encode($result);
    }

    public function addItemAction() {
        $form = 2;

        $params = [
            'id' => 2,
        ];

        $db = new Db();
        $data = $db->column('SELECT id, name FROM items WHERE id = :id', $params);
        debug($data);

        echo 'add item controller';
    }
}
