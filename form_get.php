<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Form GET</title>
</head>
<body>
    <h2>Tìm kiếm (GET)</h2>
    <form action="" method="get">
        <input type="text" name="keyword" placeholder="Nhập từ khóa..." required>
        <button type="submit">Tìm kiếm</button>
    </form>

    <?php
    if (isset($_GET['keyword'])) {
        $kw = htmlspecialchars($_GET['keyword']); 
        echo "<h3 style='color: blue'>Bạn đang tìm kiếm từ khóa: " . $kw . "</h3>";
    }
    ?>
</body>
</html>