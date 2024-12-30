<?php
if (!isset($_COOKIE['username'])) {
    header("Location: /ebay-php-clone/pages/sign_in.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_COOKIE['username'];

    // Get user_id from the database based on the username
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "ebay_database";

    $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve user_id from the database
    $userQuery = "SELECT user_id FROM users WHERE user_username = ?";
    $stmt = $conn->prepare($userQuery);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($user_id);
    $stmt->fetch();
    $stmt->close();

    // Get product details from the form
    $category_id = $_POST['category_id'];
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    $stock_quantity = $_POST['stock_quantity'];
    $created_at = date("Y-m-d H:i:s");

    // Check if the category_id exists in the categories table
    $categoryCheckQuery = "SELECT category_id FROM categorys WHERE category_id = ?";
    $categoryCheckStmt = $conn->prepare($categoryCheckQuery);
    $categoryCheckStmt->bind_param("i", $category_id);
    $categoryCheckStmt->execute();
    $categoryCheckStmt->store_result();

    if ($categoryCheckStmt->num_rows > 0) {
        // Insert product details into the products table
        $insertQuery = "INSERT INTO products (user_id, category_id, product_title, product_description, product_price, stock_quantity, created_at) 
                        VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("iissdis", $user_id, $category_id, $product_title, $product_description, $product_price, $stock_quantity, $created_at);

        if ($stmt->execute()) {
            $product_id = $conn->insert_id; // Get the inserted product's ID

            // Handle image upload
            if (isset($_FILES['images'])) {
                $images = $_FILES['images'];
                foreach ($images['name'] as $index => $image_name) {
                    $tempname = $images['tmp_name'][$index];
                    $folder = 'Images/' . $image_name;

                    if (move_uploaded_file($tempname, $folder)) {
                        $image_url = $folder;
                        $image_alt = $image_name; // Optional: You can allow users to provide alt text for images
                        $is_primary = ($index == 0) ? 1 : 0;  // Mark the first uploaded image as primary

                        // Insert image details into the images table
                        $insertImageQuery = "INSERT INTO images (product_id, image_url, image_alt, is_primary) VALUES (?, ?, ?, ?)";
                        $image_stmt = $conn->prepare($insertImageQuery);
                        $image_stmt->bind_param("issi", $product_id, $image_url, $image_alt, $is_primary);
                        $image_stmt->execute();
                    }
                }
            }

            header("Location: /ebay-php-clone/index.php?success=Product posted successfully");
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: The selected category does not exist.";
    }

    $categoryCheckStmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Product</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <label for="category_id">Category ID:</label>
        <input type="text" name="category_id" id="category_id" required><br><br>

        <label for="product_title">Product Title:</label>
        <input type="text" name="product_title" id="product_title" required><br><br>

        <label for="product_description">Product Description:</label>
        <textarea name="product_description" id="product_description" required></textarea><br><br>

        <label for="product_price">Product Price:</label>
        <input type="number" name="product_price" id="product_price" required><br><br>

        <label for="stock_quantity">Stock Quantity:</label>
        <input type="number" name="stock_quantity" id="stock_quantity" required><br><br>

        <label for="images">Product Images:</label>
        <input type="file" name="images[]" id="images" multiple><br><br>

        <button type="submit">Post Product</button>
    </form>
</body>
</html>
