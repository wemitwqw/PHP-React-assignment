<?php 

namespace app\repositories;
use app\lib\Db;
use PDO;

class ItemRepo extends Db {
    public $db;

    public function __construct() {
        $this->db = new Db();
    }

    public function getAll($sql) { 
        $stmt = $this->db->buildQuery($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'app\models\ItemModel');
        $stmt->execute();
        while ($obj = $stmt->fetch()) {
            $result[] = $obj;
        }
        return $result;
    }

    public function getBySku($sql, $params) { 
        $stmt = $this->db->buildQuery($sql, $params);
        $stmt->execute();
        $col = $stmt->fetchColumn();
        return $col;
    }

    public function saveItem($params) {
        $stmt = $this->db->buildQuery("INSERT INTO `items` (`sku`, `name`, `price`, `type`, `attr`) values (:sku, :name, :price, :type, :attr)", $params);
        $stmt->execute();
        return $stmt;
    }

    public function deleteById($sql, $param) {
        $stmt = $this->db->buildQuery($sql, $param);
        $stmt->execute();
        return $stmt;
    }
}