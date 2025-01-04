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
                            <li><a href="#">Mobiles</a></li>
                            <li><a href="#">Tablets/Ipads</a></li>
                            <li><a href="#">Laptops</a></li>
                            <li><a href="#">PCs</a></li>
                            <li><a href="#">TVs</a></li>
                            <li><a href="#">Consoles</a></li>
                            <li><a href="#">Headsets</a></li>
                            <li><a href="#">Smartwatches</a></li>
                        </ul>

                        <div class="shop-filter-dashed-line"></div>

                        <ul>
                            <li><b>Price</b></li>
                            <li><a href="#">Mobiles</a></li>
                            <li><a href="#">Tablets/Ipads</a></li>
                            <li><a href="#">Laptops</a></li>
                            <li><a href="#">PCs</a></li>
                            <li><a href="#">TVs</a></li>
                            <li><a href="#">Consoles</a></li>
                            <li><a href="#">Headsets</a></li>
                            <li><a href="#">Smartwatches</a></li>
                        </ul>

                    </div>


                    <div class="shop-products">

                    <?php
include "../connection/database_connection.php";

$request = "SELECT * FROM products WHERE category_id IN (1, 2, 3)";
$result = mysqli_query($conn, $request);
$arr = mysqli_fetch_all($result);

foreach($arr as $elem) {
    $user_query = "SELECT user_username FROM users WHERE user_id = $elem[1]";
    $user_result = mysqli_query($conn, $user_query);
    $user_row = mysqli_fetch_row($user_result);
?>

<li>
    <p><?=$elem[0]?></p>
    <p><?=htmlspecialchars($user_row[0] ?? 'Unknown')?></p>
    <p><?=$elem[2]?></p>
    <p><?=$elem[3]?></p>
    <p><?=$elem[4]?></p>
    <p><?=$elem[5]?></p>
    <p><?=$elem[6]?></p>
    <p><?=$elem[7]?></p>
    <p>--------------</p>
</li>

<?php } ?>




                    </div>

                </div>
            </div>


        </main>

        <?php include "../components/Footer.php" ?>

    </div>

</body>
</html>