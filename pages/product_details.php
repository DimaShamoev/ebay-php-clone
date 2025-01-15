<?php
    include "../logic/product_details_logic.php"
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
