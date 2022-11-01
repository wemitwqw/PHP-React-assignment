<?php

namespace app\models;
use app\core\model;

class Main extends Model {
    // public function getItems() {
    //     $result = $this->db->row('SELECT name, id FROM items');
    //     return $result;
    // }

    protected $id;
    protected $name;

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }
}