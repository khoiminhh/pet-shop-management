<?php
require '../../config/database.php';

if (!isLoggedIn()) {
    redirect('../../login.php');
}

// Lấy danh sách sản phẩm
$result = $conn->query("SELECT p.*, c.name as category_name FROM products p LEFT JOIN categories c ON p.category_id = c.id WHERE p.status = 'active' ORDER BY p.created_at DESC");
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản Phẩm - Pet Shop</title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <style>
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }
        .product-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        .product-card:hover {
            transform: translateY(-5px);
        }
        .product-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }
        .product-info {
            padding: 1rem;
        }
        .product-price {
            color: var(--primary-color);
            font-size: 1.3rem;
            font-weight: bold;
            margin: 0.5rem 0;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>🐾 Pet Shop</h1>
            <nav>
                <?php if (isLoggedIn()): ?>
                    <span><?= $_SESSION['name'] ?></span>
                    <a href="index.php">Trang Chủ</a>
                    <a href="profile.php">👤 Tài Khoản</a>
                    <a href="../../logout.php">Logout</a>
                <?php else: ?>
                    <a href="../../login.php">Đăng Nhập</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <div class="container">
        <h2>🛍️ Sản Phẩm Của Chúng Tôi</h2>
        
        <div class="product-grid">
            <?php while ($product = $result->fetch_assoc()): ?>
            <div class="product-card">
                <img src="https://via.placeholder.com/200x150?text=<?= urlencode($product['name']) ?>" alt="<?= $product['name'] ?>">
                <div class="product-info">
                    <h4><?= $product['name'] ?></h4>
                    <p style="font-size: 0.9rem; color: #666;"><?= $product['category_name'] ?></p>
                    <div class="product-price"><?= formatCurrency($product['price']) ?></div>
                    <button onclick="addToCart(<?= $product['id'] ?>, '<?= $product['name'] ?>', <?= $product['price'] ?>)" class="btn btn-sm btn-primary" style="width: 100%;">
                        🛒 Thêm Giỏ
                    </button>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>

    <script src="../../public/js/main.js"></script>
</body>
</html>
