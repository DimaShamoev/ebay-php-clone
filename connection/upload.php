<?php
if (!isset($_COOKIE['username'])) {
    header("Location: /ebay-php-clone/pages/sign_in.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $conn = new mysqli("localhost", "root", "", "ebay_database");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_COOKIE['username'];

    $userResult = $conn->query("SELECT user_id FROM users WHERE user_username = '$username'");
    $userRow = $userResult->fetch_assoc();
    $user_id = $userRow['user_id'];

    $category_id = $_POST['category_id'];
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    $stock_quantity = $_POST['stock_quantity'];
    $created_at = date("Y-m-d H:i:s");

    $insertProductQuery = "INSERT INTO products (user_id, category_id, product_title, product_description, product_price, stock_quantity, created_at) 
                           VALUES ('$user_id', '$category_id', '$product_title', '$product_description', '$product_price', '$stock_quantity', '$created_at')";

    if ($conn->query($insertProductQuery)) {
        $product_id = $conn->insert_id;

        // Handle image uploads
        if (isset($_FILES['images']['tmp_name'])) {
            foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                if (is_uploaded_file($tmp_name)) {
                    $imageName = $_FILES['images']['name'][$key];
                    $imagePath = "../Images/" . basename($imageName);

                    if (move_uploaded_file($tmp_name, $imagePath)) {
                        $conn->query("INSERT INTO images (product_id, image_url, image_alt, is_primary) 
                                      VALUES ('$product_id', '$imagePath', '$imageName', 0)");
                    }
                }
            }
        }

        header("Location: /ebay-php-clone/index.php?success=Product posted successfully");
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
