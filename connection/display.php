<?php
// Include the database connection
include './database_connection.php'; // Update the path if needed

// Check if product is set in the URL (parameter: 'product')
if (isset($_GET['product'])) {
    $product_id = $_GET['product'];

    // Query the database for the product details
    $query = "SELECT * FROM products WHERE product_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    $stmt->close();

    if ($product) {
        // Display product details
        echo "<h1>" . htmlspecialchars($product['product_title']) . "</h1>";
        echo "<p>" . htmlspecialchars($product['product_description']) . "</p>";
        echo "<p>Price: $" . htmlspecialchars($product['product_price']) . "</p>";
        echo "<p>Stock: " . htmlspecialchars($product['stock_quantity']) . "</p>";

        // Fetch product images
        $imageQuery = "SELECT * FROM images WHERE product_id = ?";
        $imageStmt = $conn->prepare($imageQuery);
        $imageStmt->bind_param("i", $product_id);
        $imageStmt->execute();
        $imageResult = $imageStmt->get_result();
        $images = [];

        // If there are images, store them in the $images array
        while ($image = $imageResult->fetch_assoc()) {
            $images[] = $image; // Add each image to the $images array
        }

        $imageStmt->close();

        // Display images
        if (!empty($images)) {
            foreach ($images as $image) {
                echo '<img src="./' . htmlspecialchars($image['image_url']) . '" alt="' . htmlspecialchars($image['image_alt']) . '" width="300">';
            }
        } else {
            echo "<p>No images available for this product.</p>";
        }
    } else {
        echo "Product not found.";
    }
} else {
    echo "Product ID not provided.";
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
</head>
<body>
    <?php if ($product): ?>
        <h1>Product: <?php echo htmlspecialchars($product['product_title']); ?></h1>
        <p><strong>Description:</strong> <?php echo nl2br(htmlspecialchars($product['product_description'])); ?></p>
        <p><strong>Price:</strong> $<?php echo number_format($product['product_price'], 2); ?></p>
        <p><strong>Stock Quantity:</strong> <?php echo $product['stock_quantity']; ?></p>
        <p><strong>Category ID:</strong> <?php echo $product['category_id']; ?></p>
        <p><strong>Created At:</strong> <?php echo $product['created_at']; ?></p>

        <!-- Display product images -->
        <h3>Product Images:</h3>
        <?php foreach ($images as $image): ?>
            <img src="<?php echo htmlspecialchars($image['image_url']); ?>" alt="<?php echo htmlspecialchars($image['image_alt']); ?>" width="300"><br>
        <?php endforeach; ?>

    <?php else: ?>
        <p>Product not found.</p>
    <?php endif; ?>
</body>
</html>
