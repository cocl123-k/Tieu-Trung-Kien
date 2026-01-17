<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit; 
}
?>

<!DOCTYPE html>
<html>
<head><title>Dashboard</title></head>
<body>
    <h1>Trang quản trị (Protected Page)</h1>
    
    <p>Xin chào, <strong><?php echo $_SESSION['user']; ?></strong>!</p>
    
    <p>Đây là nội dung chỉ dành cho thành viên đã đăng nhập.</p>

    <a href="cart.php">Đi tới Giỏ hàng (Bài 4)</a> <br><br>
    
    <a href="logout.php" style="color: red; font-weight: bold;">Đăng xuất</a>
</body>
</html>