<?php
require 'config/database.php';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Shop - Quản Lý Cửa Hàng Thú Cưng</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>🐾 Pet Shop Management</h1>
            <nav>
                <?php if (isLoggedIn()): ?>
                    <span>Welcome, <?= $_SESSION['name'] ?></span>
                    <?php if (isAdmin()): ?>
                        <a href="app/admin/dashboard.php">Admin</a>
                    <?php else: ?>
                        <a href="app/customer/index.php">Shop</a>
                    <?php endif; ?>
                    <a href="logout.php">Logout</a>
                <?php else: ?>
                    <a href="login.php">Đăng Nhập</a>
                    <a href="register.php">Đăng Ký</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <div class="container">
        <div class="card">
            <h2>🎉 Chào Mừng Đến Pet Shop Management System</h2>
            <p>Hệ thống quản lý cửa hàng thú cưng toàn diện</p>
            
            <?php if (!isLoggedIn()): ?>
                <a href="login.php" class="btn btn-primary" style="margin-top: 1rem;">Đăng Nhập Ngay</a>
            <?php endif; ?>
        </div>

        <div class="grid">
            <div class="grid-item">
                <img src="https://via.placeholder.com/300x200?text=Admin" alt="Admin">
                <div class="grid-item-content">
                    <h3>👨‍💼 Admin Panel</h3>
                    <p>Quản lý sản phẩm, đơn hàng, khách hàng</p>
                    <?php if (isAdmin()): ?>
                        <a href="app/admin/dashboard.php" class="btn btn-primary">Vào Admin</a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="grid-item">
                <img src="https://via.placeholder.com/300x200?text=Shopping" alt="Shopping">
                <div class="grid-item-content">
                    <h3>🛍️ Mua Sắm Online</h3>
                    <p>Mua sản phẩm, đặt dịch vụ</p>
                    <?php if (isLoggedIn()): ?>
                        <a href="app/customer/index.php" class="btn btn-primary">Mua Hàng</a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="grid-item">
                <img src="https://via.placeholder.com/300x200?text=Services" alt="Services">
                <div class="grid-item-content">
                    <h3>🧴 Dịch Vụ</h3>
                    <p>Tắm, cắt tỉa, tiêm phòng</p>
                    <?php if (isLoggedIn()): ?>
                        <a href="app/customer/services.php" class="btn btn-primary">Xem Dịch Vụ</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
