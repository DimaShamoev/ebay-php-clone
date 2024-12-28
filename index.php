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

                    <div class="main-page-banner banner-block">
                        <div class="main-page-banner-title banner-title">
                            You don't run with the crowd
                        </div>
                        <div class="main-page-banner-text banner-text">
                            Get fit your own way with health and wellness gear on eBay.
                        </div>
                        <div class="main-page-banner-text banner-text">
                            <a href="#">Shop For Your Style</a>
                        </div>
                    </div>

                    <div class="popular-categories-block">
                        <div class="popular-categories-title">
                            <h4>Explore Popular Categories</h4>
                        </div>
                        <div class="popular-categories-navigation">
                            <!-- Previous button -->
                            <button class="prev-btn slide-btn"><i class='bx bx-chevron-left'></i></button>
                            <!-- Next button -->
                            <button class="next-btn slide-btn"><i class='bx bx-chevron-right'></i></button>
                        </div>
                        <div class="popular-categories-type">
                            <div class="popular-category popular-category-1">
                                <div class="popular-category-img">
                                    <img src="images/popular-categories-1.jfif" alt="Luxury">
                                </div>
                                <div class="popular-category-name">
                                    Luxury
                                </div>
                            </div>

                            <div class="popular-category popular-category-2">
                                <div class="popular-category-img">
                                    <img src="images/popular-categories-2.jpg" alt="Sneakers">
                                </div>
                                <div class="popular-category-name">
                                    Sneakers
                                </div>
                            </div>

                            <div class="popular-category popular-category-3">
                                <div class="popular-category-img">
                                    <img src="images/popular-categories-3.jpg" alt="P&A">
                                </div>
                                <div class="popular-category-name">
                                    P&A
                                </div>
                            </div>

                            <div class="popular-category popular-category-4">
                                <div class="popular-category-img">
                                    <img src="images/popular-categories-4.jpg" alt="Refurbished">
                                </div>
                                <div class="popular-category-name">
                                    Refurbished
                                </div>
                            </div>

                            <div class="popular-category popular-category-5">
                                <div class="popular-category-img">
                                    <img src="images/popular-categories-5.jpg" alt="Trading cards">
                                </div>
                                <div class="popular-category-name">
                                    Trading cards
                                </div>
                            </div>

                            <div class="popular-category popular-category-6">
                                <div class="popular-category-img">
                                    <img src="images/popular-categories-6.jpg" alt="Pre-loved Luxury">
                                </div>
                                <div class="popular-category-name">
                                    Pre-loved Luxury
                                </div>
                            </div>

                            <div class="popular-category popular-category-7">
                                <div class="popular-category-img">
                                    <img src="images/popular-categories-7.jpg" alt="Toys">
                                </div>
                                <div class="popular-category-name">
                                    Toys
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="get-fit-banner banner-block">
                        <div class="main-page-banner-title banner-title">
                            You don't run with the crowd
                        </div>
                        <div class="main-page-banner-text banner-text">
                            Get fit your own way with health and wellness gear on eBay.
                        </div>
                        <div class="main-page-banner-text banner-text">
                            <a href="#">Shop For Your Style</a>
                        </div>
                    </div>

                    <div class="discover-banner banner-block">
                        <div class="main-page-banner-title banner-title">
                            You don't run with the crowd
                        </div>
                        <div class="main-page-banner-text banner-text">
                            Get fit your own way with health and wellness gear on eBay.
                        </div>
                        <div class="main-page-banner-text banner-text">
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


    <script src="./js/index.js"></script>
</body>
</html>