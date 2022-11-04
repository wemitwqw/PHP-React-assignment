<?php

namespace app\services;
use app\models\ItemModel;
use app\repositories\ItemRepo;

class MainService extends ItemRepo {
    public $repo;

    public function __construct() {
        $this->repo = new ItemRepo();
    }
    
    public function getAllItems() {
        $res = $this->repo->getAll('SELECT id, sku, name, price, type, attr FROM items ORDER BY id ASC');
        $response = array();
        foreach ($res as $item) {
            array_push($response, [
                'id' => $item->getId(),
                'sku' => $item->getSku(),
                'name' => $item->getName(),
                'price' => $item->getPrice(),
                'type' => $item->getType(),
                'attr' => $item->getAttr(),
            ]);
        }
        return $response;
    }

    public function saveItem($itemData) { 
        if ($this->validateSku($itemData['sku'])) {
            http_response_code(403);
            echo('Item with the same SKU already in DB!');
            return;
        }
        $item = new ItemModel([null, $itemData['sku'], $itemData['name'], $itemData['price'], $itemData['type'], $itemData['attr']]);
        $item->saveThis();
    }

    public function massDeleteItems($idsToDelete) { 
        foreach ($idsToDelete as $key => $val) {
            $param = ["id" => $val];
            $result = $this->repo->deleteById('DELETE FROM items WHERE id = :id', $param);
        }
        $res[] = $result;
        return $res;
    }

    public function validateSku($sku) { 
        $param = ["sku" => $sku];
        $res = $this->repo->getBySku('SELECT id, sku, name, price, type, attr FROM items WHERE sku = :sku', $param);
        return $res;
    }
}