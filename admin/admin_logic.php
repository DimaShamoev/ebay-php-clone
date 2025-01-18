<?php
    include "../connection/database_connection.php";

    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
        $productId = $_GET['id'];
        $deleteQuery = "DELETE FROM products WHERE product_id = '$productId'";

        if (mysqli_query($conn, $deleteQuery)) {
            header("Location: admin_interface.php?message=Product+deleted+successfully");
            exit();
        } else {
            echo "Error deleting product: " . mysqli_error($conn);
        }
    }

    if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
        $productId = $_GET['id'];

        $query = "SELECT * FROM products WHERE product_id = '$productId'";
        $result = mysqli_query($conn, $query);
        $product = mysqli_fetch_assoc($result);

        if ($product) {
            include "edit_product.php";
        } else {
            echo "Product not found.";
        }
    }

    if (isset($_GET['action']) && $_GET['action'] == 'update' && isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $productId = $_GET['id'];
        $productTitle = $_POST['product_title'];
        $stockQuantity = $_POST['stock_quantity'];
        $productPrice = $_POST['product_price'];

        $editQuery = "UPDATE products 
                    SET product_title = '$productTitle', 
                        stock_quantity = '$stockQuantity', 
                        product_price = '$productPrice' 
                    WHERE product_id = '$productId'";

        if (mysqli_query($conn, $editQuery)) {
            header("Location: admin_interface.php?message=Product+updated+successfully");
            exit();
        } else {
            echo "Error updating product: " . mysqli_error($conn);
        }
    }

    mysqli_close($conn);