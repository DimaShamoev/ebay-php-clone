<?php
// Database connection
include "../connection/database_connection.php";

// Check if the user is logged in via cookies
$user_id = null;
if (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
    $user_query = "SELECT user_id FROM users WHERE user_username = '$username'";
    $user_result = mysqli_query($conn, $user_query);
    $user_row = mysqli_fetch_row($user_result);
    $user_id = $user_row[0];
}

// Fetch cart items for the logged-in user
$cart_query = "SELECT * FROM carts WHERE user_id = $user_id";
$cart_result = mysqli_query($conn, $cart_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="png" href="../images/ebay.png">
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="../css/components.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Cart</title>
</head>
<body>
    <div class="body-wrapper">
        <?php include "../components/Header.php"; ?>

        <main class="main">
            <h1>Your Cart</h1>
            <table>
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Image</th>
                        <th>Product Title</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Loop through the cart items and fetch product details and images
                    while ($row = mysqli_fetch_assoc($cart_result)) {
                        $product_id = $row['product_id'];

                        // Fetch product details
                        $product_query = "SELECT product_title, product_price FROM products WHERE product_id = $product_id LIMIT 1";
                        $product_result = mysqli_query($conn, $product_query);
                        $product = mysqli_fetch_row($product_result);

                        // Fetch the first image for the product
                        $image_query = "SELECT image_url, image_alt FROM images WHERE product_id = $product_id LIMIT 1";
                        $image_result = mysqli_query($conn, $image_query);
                        $image = mysqli_fetch_row($image_result);
                    ?>
                        <tr>
                            <td><?= htmlspecialchars($product_id) ?></td>
                            <td>
                                <?php if ($image): ?>
                                    <img src="<?= htmlspecialchars($image[0]) ?>" alt="<?= htmlspecialchars($image[1]) ?>" width="100" height="100">
                                <?php else: ?>
                                    <p>No Image</p>
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($product[0]) ?></td>
                            <td><?= htmlspecialchars($product[1]) ?> $</td>
                            <td><?= htmlspecialchars($row['quantity']) ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </main>

        <?php include "../components/Footer.php"; ?>
    </div>
</body>
</html>
