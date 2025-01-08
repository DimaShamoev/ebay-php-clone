<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-top-wrapper">
                <div class="header-top-left-side">
                    <ul>
                        <?php
                            if(isset($_COOKIE['username'])) {
                                $username = $_COOKIE['username'];
                        ?>
                            <li>Hello <b><?=$username?></b> | <a href="/ebay-php-clone/auth/log_out.php">Log Out</a></li>
                        <?php } else { ?>
                            <li><a class="underline-link" href="/ebay-php-clone/pages/sign_in.php">Sign In</a> Or <a class="underline-link" href="/ebay-php-clone/pages/sign_up.php">Sign Up</a></li>
                        <?php } ?>
                        <li class="header-top-left-side-hidden-link"><a href="#">Daily Deals</a></li>
                        <li class="header-top-left-side-hidden-link"><a href="#">Help & Contact</a></li>
                    </ul>
                </div>
                <div class="header-top-right-side">
                    <ul>
                        <?php
                            if(isset($_COOKIE['username'])) {
                                $username = $_COOKIE['username'];
                        ?>
                            <li><a href="/ebay-php-clone/pages/sell_product.php">Sell</a></li>
                            <li><a href="/ebay-php-clone/pages/cart.php">Cart</a></li>
                        <?php } else { ?>
                            <li><a href="/ebay-php-clone/pages/sign_in.php">Sell</a></li>
                            <li><a href="/ebay-php-clone/pages/sign_in.php">Cart</a></li>
                        <?php } ?>
                        
                        <li class="header-top-right-side-hidden-link"><a href="#">My eBay <i class='bx bx-chevron-down'></i></a></li>
                        <li><a href="#"><i class='bx bx-bell'></i></a></li>
                        <li><a href="#"><i class='bx bx-cart'></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="header-bottom-wrapper">

                <div class="header-bottom-logo">
                    <a href="/ebay-php-clone/index.php">
                        <img height="45" src="/ebay-php-clone/images/ebay-logo.svg" alt="Ebay">
                    </a>
                </div>

                <div class="header-bottom-search-input-block">
                    <div class="search-input-icon">
                        <i class='bx bx-search-alt-2' ></i>
                    </div>
                    <div class="search-input">
                        <input type="text" placeholder="Search For Everything">
                    </div>
                    <div class="search-input-filter">
                        <div class="category-block">
                            <span>All Categories</span> <i class='bx bx-chevron-down'></i>
                        </div>
                        <div class="search-btn-block">
                            <i class='bx bx-search-alt-2'></i>
                        </div>
                    </div>
                </div>

                <div class="header-bottom-search-button">
                    <button>Search</button>
                </div>

            </div>
        </div>
    </div>
</header>