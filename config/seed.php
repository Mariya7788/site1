<?php
require_once 'database.php';

// Добавление категорий
$categories = [
    ['name' => 'Индийская кухня', 'image' => 'indianfood.jpg'],
    ['name' => 'Итальянская кухня', 'image' => 'italianfood.jpg'],
    ['name' => 'Корейская кухня', 'image' => 'korean.png']
];

$stmt = $pdo->prepare("INSERT INTO categories (name, image) VALUES (?, ?)");
foreach ($categories as $category) {
    $stmt->execute([$category['name'], $category['image']]);
}

// Добавление блюд
$dishes = [
    [
        'category_id' => 1,
        'name' => 'Идли',
        'description' => 'Идли - это разновидность пикантного рисового пирога, популярного на завтрак в Южной Индии.',
        'price' => 50.00,
        'image' => 'Indfood-1.jpg',
        'featured' => true
    ],
    [
        'category_id' => 2,
        'name' => 'Спагетти',
        'description' => 'Классические итальянские спагетти с соусом.',
        'price' => 300.00,
        'image' => 'Italifood-1.jpg',
        'featured' => true
    ],
    [
        'category_id' => 3,
        'name' => 'Ттокпокки',
        'description' => 'Корейская уличная еда из рисовых пирожков.',
        'price' => 250.00,
        'image' => 'kor-1.jpg',
        'featured' => true
    ]
];

$stmt = $pdo->prepare("INSERT INTO dishes (category_id, name, description, price, image, featured) VALUES (?, ?, ?, ?, ?, ?)");
foreach ($dishes as $dish) {
    $stmt->execute([
        $dish['category_id'],
        $dish['name'],
        $dish['description'],
        $dish['price'],
        $dish['image'],
        $dish['featured']
    ]);
}

echo "База данных успешно заполнена тестовыми данными!";