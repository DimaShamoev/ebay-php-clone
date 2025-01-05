<?php
include "../connection/database_connection.php";

$product_id = isset($_GET['product']) ? (int)$_GET['product'] : null;

if ($product_id) {
    $product_query = "SELECT * FROM products WHERE product_id = $product_id";
    $product_result = mysqli_query($conn, $product_query);
    $product = mysqli_fetch_row($product_result);

    $user_query = "SELECT user_username FROM users WHERE user_id = $product[1]";
    $user_result = mysqli_query($conn, $user_query);
    $user_row = mysqli_fetch_row($user_result);

    $image_query = "SELECT image_url, image_alt FROM images WHERE product_id = $product_id";
    $image_result = mysqli_query($conn, $image_query);
    $image_rows = mysqli_fetch_all($image_result);
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

                    <h1>Product Details</h1>

                    <?php if ($product) { ?>
                        <div class="product-details">
                            <div class="product-images">
                                <div class="product-images-column">

                                    <?php foreach ($image_rows as $image) { ?>
                                        <img src="<?=htmlspecialchars($image[0])?>" alt="<?=htmlspecialchars($image[1])?>" />
                                    <?php } ?>
                                </div>
                                <div class="primary-product-image">
                                    <?php if (!empty($image_rows)) { ?>
                                        <img src="<?= htmlspecialchars($image_rows[0][0]) ?>" alt="<?= htmlspecialchars($image_rows[0][1]) ?>" />
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
                                    <p class="extra-info created-at"><strong>Uploaded on:</strong> <?=htmlspecialchars($product[7])?></p>
                                </div>

                                <div class="buy-btn">
                                    <button>
                                        Buy It Now  
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php  } else { ?>
                        <p>Product not found.</p>
                    <?php } ?>

                    <div class="comment-block">
                        <div class="container">
                            <div class="comment-block-wrapper">

                                <div class="comment-input-block">
                                    <textarea></textarea>
                                </div>

                                <div class="btn-submit">
                                    <button type="submit">
                                        Submit
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <?php include "../components/Footer.php"; ?>
    </div>
</body>
</html>
