<?php

namespace app\models;
use app\core\model;

class ItemModel extends Model {

    protected $id;
    protected $sku;
    protected $name;
    protected $price;
    protected $size;
    protected $weight;
    protected $dimensions;

    public function __construct($id, $sku, $name, $price, $size = null, $weight = null, $dimensions = null) {
        $this->id = $id;
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->size = $size;
        $this->weight = $weight;
        $this->dimensions = $dimensions;
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

    public function getWeight() { return $this->weight; }

    public function setWeight($weight) { $this->weight = $weight; }

    public function getDimensions() { return $this->dimensions; }

    public function setDimensions($dimensions) { $this->dimensions = $dimensions; }


}