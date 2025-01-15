<?php

include "../connection/database_connection.php";

$user_id = null;
$user_info = null;
if (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];

    $user_query = "SELECT * FROM users WHERE user_username = '$username'";
    $user_result = mysqli_query($conn, $user_query);

    if ($user_result && mysqli_num_rows($user_result) > 0) {
        $user_info = mysqli_fetch_assoc($user_result);
        $user_id = $user_info['user_id'];
    } else {
        die("User not found.");
    }
} else {
    die("No user logged in.");
}

$order_query = "SELECT * FROM orders WHERE user_id = $user_id ORDER BY ordered_at DESC";
$order_result = mysqli_query($conn, $order_query);