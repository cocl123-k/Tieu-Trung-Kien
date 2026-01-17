<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Form POST</title>
</head>
<body>
    <h2>Đăng ký (POST)</h2>
    <form action="" method="post">
        <label>Tên:</label><br>
        <input type="text" name="fullname" required><br><br>
        
        <label>Mật khẩu:</label><br>
        <input type="password" name="password" required><br><br>
        
        <button type="submit" name="btn_submit">Đăng ký</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = htmlspecialchars($_POST['fullname']);
        $pass = $_POST['password'];
        
        echo "<h3 style='color: green'>Đã nhận thông tin của: " . $name . "</h3>";
    }
    ?>
</body>
</html>