<?php
if(!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$cart_items = [];
if(!empty($_SESSION['cart'])) {
    $ids = array_keys($_SESSION['cart']);
    $stmt = $pdo->prepare("SELECT * FROM dishes WHERE id IN (" . implode(',', $ids) . ")");
    $stmt->execute();
    $cart_items = $stmt->fetchAll();
}

$total = 0;
foreach($cart_items as $item) {
    $total += $item['price'] * $_SESSION['cart'][$item['id']];
}
?>

<div class="cart-bg">
    <div class="cart">
        <h1>Корзина</h1>
        
        <?php if(empty($cart_items)): ?>
            <div style="margin-bottom: 165px; padding: 10px;">
                <p>Ваша корзина пуста</p>
            </div>
        <?php else: ?>
            <div class="cart-main">
                <div class="cart-main-head">
                    <h3>Товар</h3>
                    <h3>Цена</h3>
                    <h3>Количество</h3>
                    <h3>Итого</h3>
                </div>
                
                <?php foreach($cart_items as $item): ?>
                    <div class="cart-main-body">
                        <div class="cart-main-body-div">
                            <img src="assets/images/dishes/<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>">
                            <div>
                                <h3><?php echo $item['name']; ?></h3>
                                <button onclick="removeFromCart(<?php echo $item['id']; ?>)">Удалить</button>
                            </div>
                        </div>
                        <div class="cart-main-body-div2">
                            <h5>₽<?php echo $item['price']; ?></h5>
                        </div>
                        <div class="quantity">
                            <button onclick="updateQuantity(<?php echo $item['id']; ?>, 'decrease')">-</button>
                            <span><?php echo $_SESSION['cart'][$item['id']]; ?></span>
                            <button onclick="updateQuantity(<?php echo $item['id']; ?>, 'increase')">+</button>
                        </div>
                        <div class="cart-main-body-div2">
                            <div style="color: green; font-size: 23px">
                                ₽<?php echo $item['price'] * $_SESSION['cart'][$item['id']]; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                
                <div class="cart-summary">
                    <button class="clearCart-button" onclick="clearCart()">Очистить корзину</button>
                    <div>
                        <p>Итого: <b>₽<?php echo $total; ?></b></p>
                        <button class="Order-button" onclick="placeOrder()">Заказать</button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>