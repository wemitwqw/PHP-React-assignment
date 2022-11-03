<?php

namespace app\services;
use app\core\service;
use app\models\itemmodel;

class MainService extends Service {
    public function getAll() {
        $res = $this->db->rows('SELECT id, sku, name, price, size, weight, dimensions FROM items ORDER BY id ASC');
        foreach ($res as $item => $val) {
            $itemList[] = new ItemModel($val->id, $val->sku, $val->name, $val->price, $val->size, $val->weight, $val->dimensions);
        }
        return $itemList;
    }

    public function saveItem($itemData) { 
        if ($found = $this->getBySku($itemData["sku"])) {
            http_response_code(403);
            debug('Item with the same SKU already in DB!');
        }
        $item = new ItemModel(null, $itemData['sku'], $itemData['name'], $itemData['price'], $itemData['size'], $itemData['weight'], $itemData['dimensions']);

        if($item->getSize() != null){
            $params = [
                "sku" => $item->getSku(),
                "name" => $item->getName(),
                "price" => $item->getPrice(),
                "size" => $item->getSize(),
            ];
            $res = $this->db->save("INSERT INTO `items` (`sku`, `name`, `price`, `size`) values (:sku, :name, :price, :size)", $params);
            return $res;
        }
        if($item->getWeight() != null){
            $params = [
                "sku" => $item->getSku(),
                "name" => $item->getName(),
                "price" => $item->getPrice(),
                "weight" => $item->getWeight(),
            ];
            $res = $this->db->save("INSERT INTO `items` (`sku`, `name`, `price`, `weight`) values (:sku, :name, :price, :weight)", $params);
            return $res;
        }
        if($item->getDimensions() != null){
            $params = [
                "sku" => $item->getSku(),
                "name" => $item->getName(),
                "price" => $item->getPrice(),
                "dimensions" => $item->getDimensions(),
            ];
            // debug($item->getDimensions());
            $res = $this->db->save("INSERT INTO `items` (`sku`, `name`, `price`, `dimensions`) values (:sku, :name, :price, :dimensions)", $params);
            return $res;
        }

    }

    public function massDelete($idsToDelete) { 
        foreach ($idsToDelete as $key => $val) {
            $param = ["id" => $val];
            $result = $this->db->delete('DELETE FROM items WHERE id = :id', $param);
        }
        $res[] = $result;
        return $res;
    }

    public function getBySku($sku) { 
        $param = ["sku" => $sku];
        $res = $this->db->rows('SELECT id, name, price, size, weight, dimensions FROM items WHERE sku = :sku', $param);
        return $res;
    }
}