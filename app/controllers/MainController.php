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
        // $form = 2;

        // $params = [
        //     'id' => 2,
        // ];

        // $db = new Db();
        // $data = $db->column('SELECT id, name FROM items WHERE id = :id', $params);
        // debug($data);

        if ($_POST) {
            
            
            foreach ($_POST as $key => $value) {
                echo $key.'='.$value.'<br>';
            };
        } else {
            echo json_encode('Error: POST request with form-data expected, but not received.');
        }
        echo json_encode('add item controller');
    }
}
