<?php

include "../connection/database_connection.php";

$product_id = isset($_GET['product']) ? (int)$_GET['product'] : null;

if (!$product_id) {
    echo "Invalid product ID.";
    exit;
}

$product_query = "SELECT * FROM products WHERE product_id = $product_id";
$product_result = mysqli_query($conn, $product_query);
$product = mysqli_fetch_row($product_result);

$user_query = "SELECT user_username FROM users WHERE user_id = $product[1]";
$user_result = mysqli_query($conn, $user_query);
$user_row = mysqli_fetch_row($user_result);

$image_query = "SELECT image_url, image_alt FROM images WHERE product_id = $product_id";
$image_result = mysqli_query($conn, $image_query);
$image_rows = mysqli_fetch_all($image_result);

if (isset($_GET['add_to_cart'])) {
    $product_id = (int)$_GET['add_to_cart'];
    $user_id = null;

    if (isset($_COOKIE['username'])) {
        $username = $_COOKIE['username'];
        $user_query = "SELECT user_id FROM users WHERE user_username = '$username'";
        $user_result = mysqli_query($conn, $user_query);
        $user_row = mysqli_fetch_row($user_result);
        $user_id = $user_row[0];
    }

    if ($user_id) {
        $check_cart_query = "SELECT * FROM carts WHERE user_id = $user_id AND product_id = $product_id";
        $check_cart_result = mysqli_query($conn, $check_cart_query);

        if (mysqli_num_rows($check_cart_result) > 0) {
            $update_cart_query = "UPDATE carts SET quantity = quantity + 1 WHERE user_id = $user_id AND product_id = $product_id";
            mysqli_query($conn, $update_cart_query);
        } else {
            $insert_cart_query = "INSERT INTO carts (user_id, product_id, quantity, created_date) VALUES ($user_id, $product_id, 1, NOW())";
            mysqli_query($conn, $insert_cart_query);
        }

        header("Location: product_details.php?product=$product_id");
        exit;
    } else {
        echo "You must be logged in to add products to the cart.";
    }
}

if (isset($_POST['comment'])) {
    $user_id = null;
    $comment = trim($_POST['comment']);
    $rating = isset($_POST['rating']) ? (int)$_POST['rating'] : 0;

    if (isset($_COOKIE['username'])) {
        $username = $_COOKIE['username'];
        $user_query = "SELECT user_id FROM users WHERE user_username = '$username'";
        $user_result = mysqli_query($conn, $user_query);

        if ($user_result && mysqli_num_rows($user_result) > 0) {
            $user_row = mysqli_fetch_row($user_result);
            $user_id = $user_row[0];
        }
    }

    if ($user_id && $comment) {
        $insert_query = "INSERT INTO feedbacks (user_id, product_id, rating, comment, created_date) 
                         VALUES ($user_id, $product_id, $rating, '$comment', NOW())";
        mysqli_query($conn, $insert_query);

        header("Location: product_details.php?product=$product_id");
        exit;
    }
}

$comments_query = "SELECT * FROM feedbacks WHERE product_id = $product_id ORDER BY created_date DESC";
$comments_result = mysqli_query($conn, $comments_query);
$comments = [];

if ($comments_result && mysqli_num_rows($comments_result) > 0) {
    while ($row = mysqli_fetch_row($comments_result)) {
        $user_query = "SELECT user_username FROM users WHERE user_id = $row[1]";
        $user_result = mysqli_query($conn, $user_query);
        $user_row = mysqli_fetch_row($user_result);
        
        $comments[] = [
            'comment' => $row[4],
            'created_date' => $row[5],
            'user_username' => $user_row[0]
        ];
    }
}

