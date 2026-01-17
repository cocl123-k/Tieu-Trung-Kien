<?php
session_start();

$products = [
    1 => "iPhone 15",
    2 => "Samsung S24",
    3 => "MacBook Pro"
];

if (isset($_GET['add_id'])) {
    $id = $_GET['add_id'];
    
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $_SESSION['cart'][] = $id;
    header("Location: cart.php");
    exit;
}

if (isset($_GET['action']) && $_GET['action'] == 'clear') {
    unset($_SESSION['cart']);
    header("Location: cart.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head><title>Giỏ hàng Session</title></head>
<body>
    <a href="dashboard.php">← Quay lại Dashboard</a>
    
    <h2>Danh sách sản phẩm</h2>
    <ul>
        <?php foreach ($products as $id => $name): ?>
            <li>
                <?php echo $name; ?> 
                <a href="cart.php?add_id=<?php echo $id; ?>">[Thêm vào giỏ]</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <hr>

    <h2>Giỏ hàng của bạn (Trong Session)</h2>
    <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
        <ul>
            <?php 
            // Duyệt qua các ID đang lưu trong Session
            foreach ($_SESSION['cart'] as $index => $productId) {
                // Hiển thị tên sản phẩm dựa trên ID
                $productName = isset($products[$productId]) ? $products[$productId] : "Sản phẩm ẩn";
                echo "<li>Sản phẩm ID: $productId - <strong>$productName</strong></li>";
            } 
            ?>
        </ul>
        <a href="cart.php?action=clear" style="color:red">Xóa sạch giỏ hàng</a>
    <?php else: ?>
        <p>Giỏ hàng đang trống.</p>
    <?php endif; ?>
    
    <p><em>Hãy thử F5 lại trang, bạn sẽ thấy danh sách giỏ hàng không bị mất!</em></p>
</body>
</html>