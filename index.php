<?php
// Thiết lập mã vùng và định dạng của trang web (Tùy chọn)
header('Content-Type: text/html; charset=UTF-8');

// Tiêu đề trang
$title = "Trang Chủ";

// In ra tiêu đề và một đoạn nội dung cơ bản
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="index.css"> <!-- Liên kết với tệp CSS -->
</head>
<body>
    <header>
        <div class="header-container">
            <div class="logo">
                <img src="logo.png" alt="Logo" /> <!-- Đảm bảo bạn có hình logo -->
            </div>
            <nav>
                <ul>
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Giới thiệu</a></li>
                    <li><a href="#">Liên hệ</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="intro">
        <div class="intro-container">
            <h2>Chào Mừng Đến Với Trang Web Của Kiệt</h2>
            <p>Đây là một trang PHP đơn giản. Chúng tôi cung cấp các dịch vụ tuyệt vời cho khách hàng của mình.</p>
            <p>Hãy đăng ký hoặc đăng nhập để khám phá thêm nhiều tính năng thú vị.</p>
            <a href="login.php" class="btn">Đăng nhập</a>
            <a href="register.php" class="btn">Đăng ký</a>
        </div>
    </section>

    <footer>
        <p>&copy; 2025 Công ty của bạn. Tất cả quyền lợi được bảo vệ.</p>
    </footer>
</body>
</html>
