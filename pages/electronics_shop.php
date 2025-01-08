<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="png" href="../images/ebay.png">
    <link rel="stylesheet" href="../css/electronics_shop.css">
    <link rel="stylesheet" href="../css/components.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Electronics Shop</title>
</head>
<body>

    <div class="body-wrapper">

        <?php include "../components/Header.php" ?>

        <main class="main">
            <div class="container">

                <div class="sort-by-controllers-block"></div>

            </div>

                <div class="shop-body">

                    <div class="shop-filter">
                    <ul>
                        <li><b>Type</b></li>
                        <li><a href="?category=mobiles">Mobiles</a></li>
                        <li><a href="?category=pcs">PCs</a></li>
                        <li><a href="?category=accessories">Accessories</a></li>
                        <li><a href="?category=consoles">Consoles</a></li>
                        <li><a href="?category=headsets">Headsets</a></li>
                        <li><a href="?category=smartwatches">Smartwatches</a></li>
                    </ul>

                        <div class="shop-filter-dashed-line"></div>

                        <ul>
                            <li><b>Price</b></li>
                            <li><a href="#">0$ - 100$</a></li>
                            <li><a href="#">100$ - 250$</a></li>
                            <li><a href="#">250$ - 500$</a></li>
                            <li><a href="#">500$</a></li>
                        </ul>

                    </div>


                    <div class="shop-products">


                    <?php
                            include "../connection/database_connection.php";

                            $category = isset($_GET['category']) ? $_GET['category'] : null;

                            $category_map = [
                                'mobiles' => 1,
                                'pcs' => 2,
                                'accessories' => 3,
                            ];

                            if ($category && isset($category_map[$category])) {
                                $category_id = $category_map[$category];
                                $request = "SELECT * FROM products WHERE category_id = $category_id";
                            } else {
                                $request = "SELECT * FROM products WHERE category_id IN (1, 2, 3)";
                            }

                            $result = mysqli_query($conn, $request);
                            $arr = mysqli_fetch_all($result);

                            foreach($arr as $elem) {
                                $user_query = "SELECT user_username FROM users WHERE user_id = $elem[1]";
                                $user_result = mysqli_query($conn, $user_query);
                                $user_row = mysqli_fetch_row($user_result);

                                $image_query = "SELECT image_url, image_alt FROM images WHERE product_id = $elem[0]";
                                $image_result = mysqli_query($conn, $image_query);
                                $image_row = mysqli_fetch_row($image_result);
                        ?>

                            <a href="product_details.php?product=<?=$elem[0]?>">

                                <div class="product-images">
                                    <img src="<?=htmlspecialchars($image_row[0] ?? 'default.png')?>" alt="<?=htmlspecialchars($image_row[1] ?? 'No description')?>" />
                                </div>    

                                <div class="product-info">
                                    <p class="title"><?=$elem[3]?></p>
                                    <p class="desc"><?=$elem[4]?></p>
                                    <p class="extra-info">Price: <?=$elem[5]?></p>
                                    <p class="extra-info">Quantity: <?=$elem[6]?></p>
                                    <p class="extra-info">Upload: <?=$user_row[0]?></p>
                                    <p class="extra-info">Uploaded: <?=$elem[7]?></p>
                                </div>                                
                            </a>

                        <?php } ?>  

                    </div>

                </div>
            </div>


        </main>

        <?php include "../components/Footer.php" ?>

    </div>

</body>
</html>