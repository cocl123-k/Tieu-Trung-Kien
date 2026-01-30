<?php
namespace App\Controllers;

use App\Models\Product;

class ProductController {
    public function list() {
        // 1. Chuẩn bị dữ liệu (Giả lập Model)
        $productModel = new Product();
        $products = $productModel->getAllProducts();

        // 2. Gọi View và truyền dữ liệu
        include 'views/product_list.php';
    }
}