<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/sell_product.css">
    <link rel="icon" type="png" href="../images/ebay.png">
    <link rel="stylesheet" href="../css/components.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Sell Product</title>
</head>
<body>
    <div class="body-wrapper">
        <header class="header">
            <div class="container">
                <div class="header-wrapper">
                    <div class="header-logo">
                        <img src="../images/ebay-logo.svg" alt="eBay" height="50">
                    </div>
                    <div class="header-links">
                        <a href="#">Return Home</a>
                    </div>
                </div>
            </div>
        </header>

        <main class="main">
            <div class="container">
                <div class="main-wrapper">
                    <form method="POST" action="/ebay-php-clone/connection/upload.php" class="main-form" enctype="multipart/form-data">
                        <div class="form-title">
                            Publish Your Product
                        </div>

                        <div class="input-block product-value">
                            <select name="category_id" required>
                                <option value="" disabled selected>Select Category</option>
                                <option value="1">Tech</option>
                                <option value="2">Fashion</option>
                                <option value="3">Motors</option>
                            </select>
                        </div>

                        <div class="input-block product-value">
                            <input type="text" name="product_title" placeholder="Title" required>
                        </div>

                        <div class="input-block product-value">
                            <input name="product_description" type="text" placeholder="Description" required>
                        </div>

                        <div class="input-block product-value">
                            <input type="text" name="product_price" placeholder="Price" required>
                        </div>

                        <div class="input-block product-value">
                            <input type="text" name="stock_quantity" placeholder="Quantity" required>
                        </div>

                        <div class="input-block file-upload">
                            <input type="file" name="images[]" required>
                        </div>

                        <div class="submit-btn">
                            <button type="submit">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>

        <?php include "../components/Footer.php" ?>
    </div>
</body>
</html>
