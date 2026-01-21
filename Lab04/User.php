<?php
class User {
    private $name;
    private $email;
    private $password;

    public function __construct($name, $email, $password) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function login($inemail, $inpassword) {
        if (!$inemail || !$inpassword) {
            echo "<span style='color:red'>Sai thông tin.</span> <br>";
            return;
        }
        if ($inemail !== $this->email){
            echo "<span style='color:red'>Sai thông tin.</span> <br>"; // Gợi ý: Thực tế nên báo chung chung để bảo mật
            return;
        }
        if ($inpassword !== $this->password){
            echo "<span style='color:red'>Sai thông tin.</span> <br>";
            return;
        }
        echo "<span style='color:green'>Đăng nhập thành công" . $this->name . ".</span> <br>";
    }
}

$newUser = new User("Tieu Trung Kien", "kien@example.com", "kien123");
echo "User tạo: " . $newUser->getName() . " - " . $newUser->getEmail() . "<br>";
?>

<!DOCTYPE html>
<html lang="vi">
<head>
</head>
<body>

    <div class="form-container">
        <h3>Đăng nhập Test</h3>
        <form method="POST" action="">
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <br>
            <label for="password">Mật khẩu:</label>
            <input type="password" name="password" required>
            <br>
            <button type="submit">Đăng nhập</button>
        </form>
    </div>

    <div class="result">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $inputEmail = $_POST['email'] ?? '';
                $inputPassword = $_POST['password'] ?? '';

                $newUser->login($inputEmail, $inputPassword);
            }
        ?>
    </div>

</body>
</html>