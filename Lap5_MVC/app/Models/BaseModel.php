<?php
namespace App\Models;

use PDO;

class BaseModel {
    protected $conn;    

    public function __construct() {
        $host = '127.0.0.1';
        $port = '3306';
        $db   = 'buoi2_php';
        $user = 'root';
        $pass = ''; 

        $dsn = "mysql:host=$host;port=$port;dbname=$db";

        try {
            $this->conn = new PDO($dsn, $user, $pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die('Hệ thống đang bảo trì, vui lòng quay lại sau');
        }
    }
}