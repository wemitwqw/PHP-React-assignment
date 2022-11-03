<?php

namespace app\controllers;
use app\core\Controller;

class MainController extends Controller {
    public function indexAction() {
        $result = $this->service->getAll();
        $response = array();
        foreach ($result as $item) {
            array_push($response, [
                'id' => $item->getId(),
                'sku' => $item->getSku(),
                'name' => $item->getName(),
                'price' => $item->getPrice(),
                'size' => $item->getSize(),
                'weight' => $item->getWeight(),
                'dimensions' => $item->getDimensions(),
            ]);
        }
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
        echo json_encode('add item controller');
    }

    public function deleteItemAction() {
        if(($_SERVER['REQUEST_METHOD'] == 'DELETE')){
            $_DELETE = file_get_contents('php://input');
            $_DELETE = json_decode($_DELETE, TRUE);
            $result = $this->service->massDelete($_DELETE["ids"]);
            return $result;
        } else {
            echo json_encode('Error: DELETE request with form-data expected, but not received.');
        }
        echo json_encode('delete item controller');
    }
}
