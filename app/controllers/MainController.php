<?php

namespace app\controllers;

use app\lib\Db;
use app\core\Controller;

class MainController extends Controller {
    public function indexAction() {
        $db = new Db();
        $data = $db->row('SELECT name FROM items');
        
        echo 'index controller';
    }

    public function addItemAction() {
        $form = 2;

        $db = new Db();
        $data = $db->column('SELECT name FROM items WHERE id='.$form);
        debug($data);

        echo 'add item controller';
    }
}
