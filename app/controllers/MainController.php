<?php

namespace app\controllers;
use app\core\Controller;

class MainController extends Controller {
    public function indexAction() {
        $response = $this->service->getAllItems();
        header('Content-type:application/json;charset=utf-8');
        echo json_encode($response);
    }

    public function addItemAction() {
        if ($_POST) {
            $result = $this->service->saveItem($_POST);
            return $result;
        } else {
            echo json_encode('Error: POST request with form-data expected, but not received.');
        }
    }

    public function deleteItemAction() {
        if(($_SERVER['REQUEST_METHOD'] == 'DELETE')){
            $_DELETE = file_get_contents('php://input');
            $_DELETE = json_decode($_DELETE, TRUE);
            $result = $this->service->massDeleteItems($_DELETE["ids"]);
            echo ('Delete request successful! ');
        } else {
            echo json_encode('Error: DELETE request with form-data expected, but not received.');
        }
    }
}
