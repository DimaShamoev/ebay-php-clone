<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="png" href="../images/ebay.png">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/components.css">
    <title>Admin Dashboard</title>
</head>
<body>

    <div class="body-wrapper">

    <?php include "../components/Header.php" ?>
    
    <div class="main">

        <div class="container">

            <div class="main-wrapper">

            <table class="table">
                <tr>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Product ID</th>
                    <th>Product Quantity</th>
                    <th>Delete</th>
                    <th>Edit</th>

                </tr>
            </table>

            </div>

        </div>

    </div>

    <?php include "../components/Footer.php" ?>

    </div>

</body>
</html>