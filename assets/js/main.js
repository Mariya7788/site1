function addToCart(dishId) {
    fetch('ajax/add_to_cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'dish_id=' + dishId
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            updateCartCount(data.cartCount);
            alert('Блюдо добавлено в корзину');
        }
    });
}

function updateCartCount(count) {
    document.querySelector('.cart-count').textContent = count;
}