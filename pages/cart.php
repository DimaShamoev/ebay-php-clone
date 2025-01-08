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

    // Clear the cart after buying
    $clear_cart_query = "DELETE FROM carts WHERE user_id = $user_id";
    mysqli_query($conn, $clear_cart_query);

    header("Location: cart.php");
    exit;
}

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
            <div class="container">

                <div class="main-wrapper">

                <h1>Your Cart</h1>
                <table class="table">
                    <tr>
                        <th>Image</th>
                        <th>Product ID</th>
                        <th>Product Title</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                        <?php
                            while ($row = mysqli_fetch_assoc($cart_result)) {
                                $product_id = $row['product_id'];

                                $product_query = "SELECT product_title, product_price FROM products WHERE product_id = $product_id LIMIT 1";
                                $product_result = mysqli_query($conn, $product_query);
                                $product = mysqli_fetch_row($product_result);

                                $image_query = "SELECT image_url, image_alt FROM images WHERE product_id = $product_id LIMIT 1";
                                $image_result = mysqli_query($conn, $image_query);
                                $image = mysqli_fetch_row($image_result);
                        ?>
                            <tr>
                                <td>
                                    <?php if ($image): ?>
                                        <img src="<?= htmlspecialchars($image[0]) ?>" alt="<?= htmlspecialchars($image[1]) ?>" width="100" height="100">
                                    <?php else: ?>
                                        <p>No Image</p>
                                    <?php endif; ?>
                                </td>
                                <td><?= htmlspecialchars($product_id) ?></td>
                                <td><?= htmlspecialchars($product[0]) ?></td>
                                <td><?= htmlspecialchars($product[1]) ?> $</td>
                                <td><?= htmlspecialchars($row['quantity']) ?></td>
                                <td>
                                    <form method="POST" action="cart.php">
                                        <input type="hidden" name="cart_id" value="<?= $row['cart_id'] ?>">
                                        <button type="submit" name="remove_cart" onclick="return confirm('Are you sure you want to remove this item?')">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                </table>

                <?php
                    if(mysqli_num_rows($cart_result) > 0) {
                ?>

                    <form method="POST" action="cart.php">
                        <button type="submit" name="buy_all" class="buy-button">Buy All</button>
                    </form>

                <?php } ?>

                </div>

            </div>
        </main>

        <?php include "../components/Footer.php"; ?>
    </div>
</body>
</html>
