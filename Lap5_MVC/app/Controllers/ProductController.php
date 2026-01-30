<?php
namespace App\Controllers;

use App\Models\Product;

class ProductController {
    public function list() {
        $productModel = new Product();
        $products = $productModel->getAllProducts();

        include 'views/product_list.php';
    }
}