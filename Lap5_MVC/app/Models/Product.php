<?php
namespace App\Models;

use PDO;

class Product extends BaseModel {
    public function getAllProducts() {
        $sql = "SELECT * FROM products"; // Đảm bảo bảng tên là 'products'
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>