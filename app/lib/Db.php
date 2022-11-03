<?php

namespace app\lib;
use PDO;

class Db {

    protected $db;

    public function __construct() {
        $config = require 'app/config/db.php';
        $this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['db'].'', $config['db_user'], $config['db_password']);
    }

    public function query($sql, $params = []) {
        $stmt = $this->db->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $value) {
                $stmt->bindValue(':'.$key, $value);
            }
        }
        $stmt->execute();
        return $stmt;
    }

    public function rows($sql, $params = []) {
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_OBJ);
    }

    public function column($sql, $params = []) {
        $result = $this->query($sql, $params);
        return $result->fetchColumn();
    }

    public function delete($sql, $params = []) {
        $result = $this->query($sql, $params);
        return $result;
    }

    public function save($sql, $params = []) {
        // $query = $this->db->prepare($sql);
        // if (!empty($params)) {
        //     foreach ($params as $key => $value) {
        //         $query->bindParam(':'.$key, $value);
        //     }
        // }
        // $result = $query->execute();
        $result = $this->query($sql, $params);
        // debug($result);
        return $result;
    }
}