<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/sell_product.css">
    <link rel="icon" type="png" href="../images/ebay.png">
    <link rel="stylesheet" href="../css/components.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
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
                    <form method="POST" action="" class="main-form">

                        <div class="form-title">
                            Publish Your Product
                        </div>

                        <div class="input-block product-value">
                            <input type="text" placeholder="Category">
                        </div>

                        <div class="input-block product-value">
                            <input type="text" placeholder="Title">
                        </div>

                        <div class="input-block product-value">
                            <input type="text" placeholder="Description">
                        </div>

                        <div class="input-block product-value">
                            <input type="text" placeholder="Price">
                        </div>

                        <div class="input-block product-value">
                            <input type="text" placeholder="Quantity">
                        </div>

                        <div class="input-block file-upload">
                            <input type="file">
                        </div>

                    </form>
                </div>
            </div>
        </main>

        <?php include "../components/Footer.php" ?>

    </div>
</body>
</html>