<?php
// Khởi tạo mảng lỗi và các biến
$errors = [];
$email = $password = "";

// Kiểm tra khi form đăng nhập được gửi
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Kiểm tra và xử lý thông tin email
    if (empty($_POST['email'])) {
        $errors['email'] = "Vui lòng nhập email.";
    } else {
        $email = htmlspecialchars(trim($_POST['email']));
    }

    // Kiểm tra và xử lý thông tin mật khẩu
    if (empty($_POST['password'])) {
        $errors['password'] = "Vui lòng nhập mật khẩu.";
    } else {
        $password = htmlspecialchars(trim($_POST['password']));
    }

    // Kiểm tra đăng nhập (Giả sử bạn có cơ sở dữ liệu hoặc danh sách người dùng đã đăng ký)
    // Ở đây mình chỉ làm ví dụ đơn giản là kiểm tra email và mật khẩu cứng
    $stored_email = "user@example.com"; // Email mẫu
    $stored_password = "password123";  // Mật khẩu mẫu

    if (empty($errors)) {
        // Kiểm tra thông tin đăng nhập
        if ($email == $stored_email && $password == $stored_password) {
            echo "<p>Đăng nhập thành công. Chào mừng bạn!</p>";
        } else {
            $errors['login'] = "Thông tin đăng nhập không chính xác.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./reset.css" />
    <link rel="stylesheet" href="./style.css" />
    <title>Login Page</title>
  </head>
  <body>
    <div class="wrapper fade-in-down">
      <div id="form-content">
        <!-- Tabs Titles -->
        <a href="dangnhap.php">
          <h2 class="active">Đăng nhập</h2>
        </a>
        <a href="register.php">
          <h2 class="inactive underline-hover">Đăng ký</h2>
        </a>

        <!-- Icon -->
        <div class="fade-in first">
          <img src="./imgs/avatar.png" id="avatar" alt="User Icon" />
        </div>

        <!-- Login Form -->
        <form method="POST" action="login.php">
          <input
            type="email"
            id="email"
            class="fade-in first"
            name="email"
            placeholder="Email"
            value="<?php echo htmlspecialchars($email); ?>"
          />
          <?php if (isset($errors['email'])): ?>
            <div class="error"><?php echo $errors['email']; ?></div>
          <?php endif; ?>

          <input
            type="password"
            id="password"
            class="fade-in second"
            name="password"
            placeholder="Mật khẩu"
            value="<?php echo htmlspecialchars($password); ?>"
          />
          <?php if (isset($errors['password'])): ?>
            <div class="error"><?php echo $errors['password']; ?></div>
          <?php endif; ?>

          <!-- Display login error message -->
          <?php if (isset($errors['login'])): ?>
            <div class="error"><?php echo $errors['login']; ?></div>
          <?php endif; ?>

          <input type="submit" class="fade-in five" value="Đăng nhập" />
        </form>

        <!-- Remind Password -->
        <div id="form-footer">
          <a class="underline-hover" href="#">Quên mật khẩu?</a>
        </div>
      </div>
    </div>
  </body>
</html>
