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
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="png" href="../images/ebay.png">
    <link rel="stylesheet" href="../css/product_details.css">
    <link rel="stylesheet" href="../css/components.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Product Details</title>
</head>
<body>
    <div class="body-wrapper">
        <?php include "../components/Header.php"; ?>

        <main class="main">
            <div class="container">
                <div class="main-wrapper">
                    <?php if ($product) { ?>
                        <div class="product-details">
                            <div class="product-images">
                                <div class="product-images-column">

                                    <?php foreach ($image_rows as $image) { ?>
                                        <img src="<?=htmlspecialchars($image[0])?>" alt="<?=htmlspecialchars($image[1])?>" onclick="this.requestFullscreen()" />
                                    <?php } ?>
                                </div>
                                <div class="primary-product-image">
                                    <?php if (!empty($image_rows)) { ?>
                                        <img src="<?= htmlspecialchars($image_rows[0][0]) ?>" alt="<?= htmlspecialchars($image_rows[0][1]) ?>" onclick="this.requestFullscreen()" />
                                    <?php }?>
                                </div>
                            </div>

                            <div class="product-info">
                                <div class="product-title-desc">
                                    <p class="title"><?=htmlspecialchars($product[3])?></p>
                                    <div class="line"></div>
                                    <p class="desc"><?=htmlspecialchars($product[4])?></p>
                                    <div class="line"></div>
                                </div>
                                <div class="product-extra-info-block">
                                    <p class="extra-info price">US $<?=htmlspecialchars($product[5])?></p>
                                    <p class="extra-info quantity"><strong>Quantity:</strong> <?=htmlspecialchars($product[6])?></p>
                                    <p class="extra-info upload"><strong>Uploaded by:</strong> <?=htmlspecialchars($user_row[0])?></p>
                                    <p class="extra-info created-at"><strong>Uploaded on:</strong> <?=htmlspecialchars($product[0])?></p>
                                </div>

                                <div class="buy-btn">
                                    <button>Buy It Now</button>
                                    <a href="product_details.php?product=<?= htmlspecialchars($product_id) ?>&add_to_cart=<?= htmlspecialchars($product_id) ?>">
                                        <button>Add To Cart</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php  } else { ?>
                        <p>Product not found.</p>
                    <?php } ?>

                    <div class="comment-block">
                        <div class="container">
                            <div class="comment-block-wrapper">
                                <div class="comment-title">
                                    Leave Your Comment
                                </div>
                                <form method="POST" action="product_details.php?product=<?= $product_id ?>" class="comment-form">
                                    <div class="comment-input-block">
                                        <textarea class="comments-textbox" name="comment" required placeholder="Write your comment here..."></textarea>
                                    </div>
                                    <div class="rating-input-block">
                                        <label for="rating">Rating:</label>
                                        <select name="rating" id="rating">
                                            <option value="5">5 - Excellent</option>
                                            <option value="4">4 - Good</option>
                                            <option value="3">3 - Average</option>
                                            <option value="2">2 - Poor</option>
                                            <option value="1">1 - Terrible</option>
                                        </select>
                                    </div>
                                    <div class="btn-submit">
                                        <button type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="comments-block">
                        <div class="comments-block-title">
                            <h3>All Comments: </h3>
                        </div>
                        <?php if (count($comments) > 0){ ?>
                            <div class="comments-block-wrapper">
                                <?php foreach ($comments as $comment) { ?>
                                    <div class="comment">
                                        <div class="comment-info">
                                            <p class="comment-author"><?= htmlspecialchars($comment['user_username']) ?></p>
                                            <p>•</p>
                                            <p class="comment-date"><?= htmlspecialchars($comment['created_date']) ?></p>
                                        </div>
                                        <p class="comment-txt"><?= htmlspecialchars($comment['comment']) ?></p>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } else { ?>
                            <p>No comments yet. Be the first to comment!</p>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </main>

        <?php include "../components/Footer.php"; ?>
    </div>
</body>
</html>
