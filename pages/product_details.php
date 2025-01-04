<?php
include "../connection/database_connection.php";

$product_id = isset($_GET['product']) ? (int)$_GET['product'] : null;

if ($product_id) {
    // Fetch product details
    $product_query = "SELECT * FROM products WHERE product_id = $product_id";
    $product_result = mysqli_query($conn, $product_query);
    $product = mysqli_fetch_row($product_result);

    // Fetch the username for the user related to the product
    $user_query = "SELECT user_username FROM users WHERE user_id = $product[1]";
    $user_result = mysqli_query($conn, $user_query);
    $user_row = mysqli_fetch_row($user_result);

    // Fetch product images
    $image_query = "SELECT image_url, image_alt FROM images WHERE product_id = $product_id";
    $image_result = mysqli_query($conn, $image_query);
    $image_rows = mysqli_fetch_all($image_result); // Use numerical indexes
} else {
    echo "Invalid product ID.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="png" href="../images/ebay.png">
    <link rel="stylesheet" href="../css/electronics_shop.css">
    <link rel="stylesheet" href="../css/components.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Product Details</title>
</head>
<body>
    <div class="body-wrapper">
        <?php include "../components/Header.php"; ?>

        <main class="main">
            <div class="container">
                <h1>Product Details</h1>

                <?php if ($product): ?>
                    <div class="product-details">
                        <div class="product-images">
                            <?php foreach ($image_rows as $image): ?>
                                <img src="<?=htmlspecialchars($image[0])?>" alt="<?=htmlspecialchars($image[1])?>" />
                            <?php endforeach; ?>
                        </div>

                        <div class="product-info">
                            <p class="title"><strong>Title:</strong> <?=htmlspecialchars($product[3])?></p>
                            <p class="desc"><strong>Description:</strong> <?=htmlspecialchars($product[4])?></p>
                            <p class="extra-info"><strong>Price:</strong> $<?=htmlspecialchars($product[5])?></p>
                            <p class="extra-info"><strong>Quantity:</strong> <?=htmlspecialchars($product[6])?></p>
                            <p class="extra-info"><strong>Uploaded by:</strong> <?=htmlspecialchars($user_row[0])?></p>
                            <p class="extra-info"><strong>Uploaded on:</strong> <?=htmlspecialchars($product[7])?></p>
                        </div>
                    </div>
                <?php else: ?>
                    <p>Product not found.</p>
                <?php endif; ?>
            </div>
        </main>

        <?php include "../components/Footer.php"; ?>
    </div>
</body>
</html>
