<?php

namespace app\lib;
use PDO;

class Db {

    protected $pdo;

    public function __construct() {
        $config = require 'app/config/db.php';
        $this->pdo = new PDO('mysql:host='.$config['host'].';dbname='.$config['db'].'', $config['db_user'], $config['db_password']);
    }

    public function buildQuery($sql, $params = []) { 
        $stmt = $this->pdo->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $value) {
                $stmt->bindValue(':'.$key, $value);
            }
        }
        return $stmt;
    }
}