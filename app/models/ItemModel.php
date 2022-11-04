<?php

namespace app\models;
use app\repositories\itemrepo;
// $ins = new ItemModel([null, '89123h48', 'Harry Potter', 248.89, 'Book', 1.8]);

class ItemModel extends ItemRepo {
    public $repo;

    protected $id;
    protected $sku;
    protected $name;
    protected $price;
    protected $type;
    protected $attr;

    public function __construct() {
            $args = func_get_args();
        if (count($args) == 0) {
            $this->repo = new ItemRepo();
        } else {
            $this->repo = new ItemRepo();
            return call_user_func_array(array($this, 'AllArgsConstructor'), $args);
        } 
    }

    public function AllArgsConstructor($args) {
        $this->id = $args[0];
        $this->sku = $args[1];
        $this->name = $args[2];
        $this->price = $args[3];
        $this->type = $args[4];
        $this->attr = $args[5];
    }

    public function saveThis() { 
        $params = [
            "sku" => $this->getSku(),
            "name" => $this->getName(),
            "price" => $this->getPrice(),
            "type" => $this->getType(),
            "attr" => $this->getAttr(),
        ];
        $this->repo->saveItem($params);
    }

    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getSku() { return $this->sku; }
    public function setSku($sku) { $this->sku = $sku; }

    public function getName() { return $this->name; }
    public function setName($name) { $this->name = $name; }

    public function getPrice() { return $this->price; }
    public function setPrice($price) { $this->price = $price; }

    public function getSize() { return $this->size; }
    public function setSize($size) { $this->size = $size;}

    public function getType() { return $this->type; }
    public function setType($type) { $this->type = $type;}

    public function getAttr() { return $this->attr; }
    public function setAttr($attr) { $this->attr = $attr;}

}