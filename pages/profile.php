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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="png" href="../images/ebay.png">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/components.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Profile</title>
</head>
<body>
    <div class="body-wrapper">
        <?php include "../components/Header.php"; ?>

        <main class="main">
            <div class="container">
                <div class="main-wrapper">
                    <h1>Your Profile</h1>

                    <div class="profile-section">
                        <div class="user-info-block">
                            <div class="profile-icon-block">
                                <div class="user-icon">
                                </div>
                                <div class="user-info">
                                    <?= htmlspecialchars($user_info['user_username']) ?>
                                </div>
                            </div>
                            <div class="user-full-info">
                                <ul>
                                    <li>FirstName: <?=$user_info['user_firstname']?></li>
                                    <li>LastName: <?=$user_info['user_lastname']?></li>
                                    <li>Email: <?=$user_info['user_email']?></li>
                                    <li>Address: <?=$user_info['user_address']?></li>
                                </ul>
                            </div>
                        </div>

                        <div class="orders-section">
                            <?php if (mysqli_num_rows($order_result) > 0): ?>
                                <table class="orders-table">
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Product ID</th>
                                        <th>Status</th>
                                        <th>Price</th>
                                        <th>Shipping Address</th>
                                        <th>Ordered At</th>
                                    </tr>
                                    <?php while ($order = mysqli_fetch_assoc($order_result)): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($order['order_id']) ?></td>
                                            <td><?= htmlspecialchars($order['product_id']) ?></td>
                                            <td><?= htmlspecialchars($order['order_status']) ?></td>
                                            <td><?= htmlspecialchars($order['order_price']) ?> $</td>
                                            <td><?= htmlspecialchars($order['shipping_address']) ?></td>
                                            <td><?= htmlspecialchars($order['ordered_at']) ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                </table>
                            <?php else: ?>
                                <p>You have no orders yet.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php include "../components/Footer.php"; ?>
    </div>
</body>
</html>
