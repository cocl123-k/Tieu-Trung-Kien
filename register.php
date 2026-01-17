<?php
require 'db_connect.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    try {
        $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (:email, :pass)");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pass', $hashed_password);
        
        if ($stmt->execute()) {
            $message = "Đăng ký thành công!";
        }
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            $message = "Email này đã tồn tại!";
        } else {
            $message = "Lỗi: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Đăng ký</title></head>
<body>
    <h2>Đăng ký tài khoản</h2>
    <p style="color:red"><?php echo $message; ?></p>
    <form method="POST" action="">
        Email: <input type="email" name="email" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <button type="submit">Đăng ký</button>
    </form>
</body>
</html>