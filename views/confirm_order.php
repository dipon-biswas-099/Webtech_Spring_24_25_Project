<?php
session_start();
require_once('../db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['cart_data'])) {
        die("No cart data received.");
    }

    $cartDataJson = $_POST['cart_data'];
    $cartItems = json_decode($cartDataJson, true);

    if (!$cartItems || !is_array($cartItems)) {
        die("Invalid cart data.");
    }

   
    $stmt = $conn->prepare("INSERT INTO orders (food_name, price, quantity, total_price, created_at) VALUES (?, ?, ?, ?, NOW())");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    foreach ($cartItems as $item) {
        $food_name = $item['name'];
        $price = (float)$item['price'];
        $quantity = (int)$item['qty'];
        $total_price = $price * $quantity;

        $stmt->bind_param("sddi", $food_name, $price, $quantity, $total_price);

        if (!$stmt->execute()) {
            die("Insert failed: " . $stmt->error);
        }
    }

    $stmt->close();

    $_SESSION['order_confirmed'] = true;

    header("Location: order.php");
    exit;
} else {
    die("Invalid request method.");
}
?>
