<?php
$host = '127.0.0.1';
$port = '3306';
$db   = 'buoi2_php';
$user = 'root';
$pass = ''; 

$dsn = "mysql:host=$host;port=$port;dbname=$db";

try {
    $conn = new PDO($dsn, $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\PDOException $e) {
    die('Hệ thống đang bảo trì, vui lòng quay lại sau');
    // die("Lỗi kết nối: " . $e->getMessage());
}
?>
