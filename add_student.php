<?php
require_once 'db_connect.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $fullname = $_POST['fullname'];
    $student_code = $_POST['student_code'];
    $email = $_POST['email'];

    $sql = "INSERT INTO students (fullname, student_code, email) VALUES (?, ?, ?)";

    try {
        $stmt = $conn->prepare($sql);

        if ($stmt->execute([$fullname, $student_code, $email])) {
            $message = "✅ Thêm sinh viên thành công!";
        } else {
            $message = "❌ Có lỗi xảy ra!";
        }
    } catch (PDOException $e) {
        $message = "❌ Lỗi: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm sinh viên</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        .msg { padding: 10px; margin-bottom: 10px; border: 1px solid #ddd; background: #f0f0f0; }
        input { display: block; margin-bottom: 10px; width: 300px; padding: 5px; }
        button { padding: 8px 15px; cursor: pointer; }
    </style>
</head>
<body>

    <h2>Thêm Sinh Viên Mới</h2>

    <?php if ($message != ""): ?>
        <div class="msg"><?php echo $message; ?></div>
    <?php endif; ?>

    <form action="" method="post">
        <label>Họ và tên:</label>
        <input type="text" name="fullname" required placeholder="Ví dụ: Nguyễn Văn A">

        <label>Mã sinh viên:</label>
        <input type="text" name="student_code" required placeholder="Ví dụ: SV001">

        <label>Email:</label>
        <input type="email" name="email" required placeholder="Ví dụ: email@domain.com">

        <button type="submit" name="btn_add">Thêm mới</button>
    </form>

</body>
</html>