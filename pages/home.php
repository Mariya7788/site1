<?php
require_once 'config/database.php';

$stmt = $pdo->query("SELECT * FROM categories ORDER BY id ASC");
$categories = $stmt->fetchAll();

$stmt = $pdo->query("SELECT * FROM dishes WHERE featured = 1 LIMIT 6");
$featured_dishes = $stmt->fetchAll();
?>

<div class="home">
    <div class="slider">
        <!-- Slider implementation -->
    </div>
    
    <section class="categories">
        <h2>Категории</h2>
        <div class="category-grid">
            <?php foreach($categories as $category): ?>
            <div class="category-card">
                <img src="assets/images/categories/<?php echo $category['image']; ?>" alt="<?php echo $category['name']; ?>">
                <h3><?php echo $category['name']; ?></h3>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="featured-dishes">
        <?php foreach($featured_dishes as $dish): ?>
        <div class="dish-card">
            <img src="assets/images/dishes/<?php echo $dish['image']; ?>" alt="<?php echo $dish['name']; ?>">
            <h4><?php echo $dish['name']; ?></h4>
            <p><?php echo $dish['description']; ?></p>
            <span class="price">₽<?php echo $dish['price']; ?></span>
            <button onclick="addToCart(<?php echo $dish['id']; ?>)">Добавить в корзину</button>
        </div>
        <?php endforeach; ?>
    </section>
</div>