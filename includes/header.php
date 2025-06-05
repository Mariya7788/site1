<header class="header">
    <div class="container">
        <nav>
            <a href="index.php" class="logo">
                <img src="assets/images/food.png" alt="Логотип">
            </a>
            <div class="search">
                <input type="text" class="search-input" placeholder="Поиск">
                <button>Найти</button>
            </div>
            <div class="nav-buttons">
                <a href="index.php?page=cart" class="cart-button">
                    <img src="assets/images/cart.jpg" alt="Корзина">
                    <span class="cart-count"><?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?></span>
                </a>
                <a href="index.php" class="nav-button">Главная</a>
                <a href="index.php?page=profile" class="nav-button">Профиль</a>
                <?php if(isset($_SESSION['user'])): ?>
                    <a href="logout.php" class="nav-button">Выход</a>
                <?php else: ?>
                    <a href="index.php?page=login" class="nav-button">Вход</a>
                <?php endif; ?>
            </div>
        </nav>
    </div>
</header>