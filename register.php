<?php
// Khai báo biến để chứa thông tin nhập vào và lỗi
$errors = [];
$username = $email = $password = $repeatPassword = "";

// Kiểm tra nếu form được gửi đi
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Kiểm tra và xử lý tên người dùng
    if (empty($_POST['username'])) {
        $errors['username'] = "Vui lòng nhập họ tên.";
    } else {
        $username = htmlspecialchars(trim($_POST['username']));
    }

    // Kiểm tra và xử lý email
    if (empty($_POST['email'])) {
        $errors['email'] = "Vui lòng nhập email.";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email không hợp lệ.";
    } else {
        $email = htmlspecialchars(trim($_POST['email']));
    }

    // Kiểm tra và xử lý mật khẩu
    if (empty($_POST['password'])) {
        $errors['password'] = "Vui lòng nhập mật khẩu.";
    } elseif (strlen($_POST['password']) < 6) {
        $errors['password'] = "Mật khẩu phải có ít nhất 6 ký tự.";
    } else {
        $password = htmlspecialchars(trim($_POST['password']));
    }

    // Kiểm tra và xử lý xác nhận mật khẩu
    if (empty($_POST['repeat-password'])) {
        $errors['repeat-password'] = "Vui lòng xác nhận mật khẩu.";
    } elseif ($_POST['repeat-password'] !== $_POST['password']) {
        $errors['repeat-password'] = "Mật khẩu xác nhận không khớp.";
    } else {
        $repeatPassword = htmlspecialchars(trim($_POST['repeat-password']));
    }

    // Nếu không có lỗi, hiển thị thông báo thành công
    if (empty($errors)) {
        $successMessage = "Chào mừng bạn đã đăng ký thành công, $username!";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Đăng Ký</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="wrapper">
        <div id="form-content">
            <h2>Đăng Ký</h2>

            <form method="POST" action="">
                <!-- Tên -->
                <input type="text" name="username" placeholder="Họ tên" value="<?php echo htmlspecialchars($username); ?>" />
                <?php if (isset($errors['username'])): ?>
                    <div class="error"><?php echo $errors['username']; ?></div>
                <?php endif; ?>

                <!-- Email -->
                <input type="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($email); ?>" />
                <?php if (isset($errors['email'])): ?>
                    <div class="error"><?php echo $errors['email']; ?></div>
                <?php endif; ?>

                <!-- Mật khẩu -->
                <input type="password" name="password" placeholder="Mật khẩu" value="<?php echo htmlspecialchars($password); ?>" />
                <?php if (isset($errors['password'])): ?>
                    <div class="error"><?php echo $errors['password']; ?></div>
                <?php endif; ?>

                <!-- Xác nhận mật khẩu -->
                <input type="password" name="repeat-password" placeholder="Xác nhận mật khẩu" value="<?php echo htmlspecialchars($repeatPassword); ?>" />
                <?php if (isset($errors['repeat-password'])): ?>
                    <div class="error"><?php echo $errors['repeat-password']; ?></div>
                <?php endif; ?>

                <input type="submit" value="Đăng ký" />
            </form>

            <?php if (isset($successMessage)): ?>
                <div class="success"><?php echo $successMessage; ?></div>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>
