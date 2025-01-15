<?php

include "../connection/database_connection.php";

$user_id = null;
if (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
    $user_query = "SELECT user_id FROM users WHERE user_username = '$username'";
    $user_result = mysqli_query($conn, $user_query);
    $user_row = mysqli_fetch_row($user_result);
    $user_id = $user_row[0];
}

if (isset($_POST['remove_cart'])) {
    $cart_id = (int)$_POST['cart_id'];
    $remove_query = "DELETE FROM carts WHERE cart_id = $cart_id AND user_id = $user_id";
    mysqli_query($conn, $remove_query);
    header("Location: cart.php");
    exit;
}

if (isset($_POST['buy_all'])) {
    $cart_query = "SELECT * FROM carts WHERE user_id = $user_id";
    $cart_result = mysqli_query($conn, $cart_query);

    while ($cart_item = mysqli_fetch_assoc($cart_result)) {
        $product_id = $cart_item['product_id'];
        $quantity = $cart_item['quantity'];

        $product_query = "SELECT product_price FROM products WHERE product_id = $product_id LIMIT 1";
        $product_result = mysqli_query($conn, $product_query);
        $product_row = mysqli_fetch_row($product_result);
        $product_price = $product_row[0];

        $order_price = $product_price * $quantity;

        $user_query = "SELECT user_address FROM users WHERE user_id = $user_id LIMIT 1";
        $user_result = mysqli_query($conn, $user_query);
        $user_row = mysqli_fetch_assoc($user_result);
        $shipping_address = $user_row['user_address'];


        $order_query = "INSERT INTO orders (user_id, product_id, order_status, order_price, shipping_address, ordered_at) 
                        VALUES ($user_id, $product_id, 'Pending', $order_price, '$shipping_address', NOW())";
        mysqli_query($conn, $order_query);
    }

    $clear_cart_query = "DELETE FROM carts WHERE user_id = $user_id";
    mysqli_query($conn, $clear_cart_query);

    header("Location: cart.php");
    exit;
}

$cart_query = "SELECT * FROM carts WHERE user_id = $user_id";
$cart_result = mysqli_query($conn, $cart_query);