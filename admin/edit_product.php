<?php
    $productId = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="png" href="../images/ebay.png">
    <link rel="stylesheet" href="./css/edit_product.css">
    <link rel="stylesheet" href="../css/components.css">
    <title>Edit Product</title>
</head>
<body>
    <div class="body-wrapper">

        <?php include "../components/Header.php"; ?>

        <div class="main">
            <div class="container">
                <div class="main-wrapper">
                    <form class="form" method="POST" action="admin_logic.php?action=update&id=<?= $productId ?>">
                        <div class="form-title">
                            Edit Product Details
                        </div>
                        <div class="input-block">
                            <label>Product Title</label>
                            <input type="text" name="product_title" value="<?= $product['product_title'] ?>" required>
                        </div>

                        <div class="input-block">
                            <label>Stock Quantity</label>
                            <input type="number" name="stock_quantity" value="<?= $product['stock_quantity'] ?>" required>
                        </div>

                        <div class="input-block">
                            <label>Product Price</label>
                            <input type="number" name="product_price" value="<?= $product['product_price'] ?>" required>
                        </div>
                        
                        
                        <div class="submit-btn">
                            <button type="submit">Update Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php include "../components/Footer.php"; ?>

    </div>
</body>
</html>
