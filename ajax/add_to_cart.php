<?php
session_start();
require_once '../config/database.php';

if(isset($_POST['dish_id'])) {
    $dish_id = $_POST['dish_id'];
    
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    
    if(isset($_SESSION['cart'][$dish_id])) {
        $_SESSION['cart'][$dish_id]++;
    } else {
        $_SESSION['cart'][$dish_id] = 1;
    }
    
    echo json_encode([
        'success' => true,
        'cartCount' => array_sum($_SESSION['cart'])
    ]);
} else {
    echo json_encode(['success' => false]);
}