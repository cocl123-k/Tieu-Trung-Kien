<?php
require_once 'db_connect.php';

try {
    $sql = "SELECT * FROM students";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Lỗi truy vấn: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
    <style>
        /* CSS trang trí bảng cho đẹp mắt */
        body { font-family: Arial, sans-serif; padding: 20px; }
        h2 { text-align: center; color: #333; }
        
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        
        th, td { 
            padding: 12px; 
            text-align: left; 
            border-bottom: 1px solid #ddd; 
        }
        
        th { 
            background-color: #4CAF50; 
            color: white; 
        }
        
    </style>
</head>
<body>

    <h2>Danh sách Sinh viên</h2>
    
    <a href="add_student.php" style="display:inline-block; margin-bottom:10px; text-decoration:none;">⬅ Thêm sinh viên mới</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Họ và Tên</th>
                <th>Mã SV</th>
                <th>Email</th>
        </thead>
        <tbody>
            <?php if (count($students) > 0): ?>
                <?php foreach ($students as $row): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo htmlspecialchars($row['fullname']); ?></td>
                        <td><?php echo htmlspecialchars($row['student_code']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" style="text-align:center; color:red;">Chưa có sinh viên nào trong danh sách!</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>