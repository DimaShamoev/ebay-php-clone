<?php
if (!isset($_COOKIE['username'])) {
    header("Location: /ebay-php-clone/pages/sign_in.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $conn = mysqli_connect("localhost", "root", "", "ebay_database");

    if (!$conn) die("Connection failed: " . mysqli_connect_error());

    $username = $_COOKIE['username'];
    $userResult = mysqli_query($conn, "SELECT user_id FROM users WHERE user_username = '$username'");
    $user_id = mysqli_fetch_assoc($userResult)['user_id'];

    $category_id = $_POST['category_id'];
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    $stock_quantity = $_POST['stock_quantity'];
    $created_at = date("Y-m-d H:i:s");

    $insertProductQuery = "INSERT INTO products (user_id, category_id, product_title, product_description, product_price, stock_quantity, created_at) 
                           VALUES ('$user_id', '$category_id', '$product_title', '$product_description', '$product_price', '$stock_quantity', '$created_at')";

    if (mysqli_query($conn, $insertProductQuery)) {
        $product_id = mysqli_insert_id($conn);

        if (isset($_FILES['images']['tmp_name'])) {
            foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                if (is_uploaded_file($tmp_name)) {
                    $imagePath = "../Images/" . basename($_FILES['images']['name'][$key]);

                    if (move_uploaded_file($tmp_name, $imagePath)) {
                        mysqli_query($conn, "INSERT INTO images (product_id, image_url, image_alt, is_primary) 
                                             VALUES ('$product_id', '$imagePath', '{$_FILES['images']['name'][$key]}', 0)");
                    }
                }
            }
        }

        header("Location: /ebay-php-clone/index.php?success=Product posted successfully");
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}