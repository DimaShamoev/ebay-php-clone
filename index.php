<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="icon" type="png" href="./images/ebay.png">
    <title>MyEbay</title>
</head>
<body>
    

    <div class="body-wrapper">

        <?php
            include "./components/Header.php"
        ?>

        <main>

            <div class="container">

                <div class="main-wrapper">

                    <div class="main-page-navigation">
                        <ul>
                            <li><a href="#">Explore (New!)</a></li>
                            <li><a href="#">Saved</a></li>
                            <li><a href="#">Electronics</a></li>
                            <li><a href="#">Motors</a></li>
                            <li><a href="#">Fashion</a></li>
                            <li><a href="#">Collectibles and Art</a></li>
                            <li><a href="#">Sports</a></li>
                            <li><a href="#">Health & Beauty</a></li>
                            <li><a href="#">Industrial equipment</a></li>
                            <li><a href="#">Home & Garden</a></li>
                            <li><a href="#">Deals</a></li>
                            <li><a href="#">Sell</a></li>
                        </ul>
                    </div>

                    <div class="main-page-banner">
                        <div class="main-page-banner-title">
                            You don't run with the crowd
                        </div>
                        <div class="main-page-banner-text">
                            Get fit your own way with health and wellness gear on eBay.
                        </div>
                        <div class="main-page-banner-text">
                            <a href="#">Shop For Your Style</a>
                        </div>
                    </div>

                </div>

            </div>

        </main>

        <?php
            include "./components/Footer.php"
        ?>

    </div>


</body>
</html>