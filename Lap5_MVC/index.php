<?php
require 'vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\ProductController;

$page = $_GET['page'] ?? 'home';

if ($page === 'home') {
    $controller = new HomeController();
} elseif ($page === 'product_list') {
    $controller = new ProductController();
    $controller->list();
} else {
    echo "404 - Page Not Found";
}
?>