<?php
$first_name = $_POST['first_name'] ?? null;
$last_name = $_POST['last_name'] ?? null;
$username = $_POST['username'] ?? null;
$email = $_POST['email'] ?? null;
$address = $_POST['address'] ?? null;
$password = $_POST['password'] ?? null;

if (!$first_name || !$last_name || !$username || !$email || !$address || !$password) {
    header("Location: ../pages/sign_up.php?error=All fields are required");
    exit;
}


// include "/ebay-php-clone/connection/database_connection.php";

$conn = mysqli_connect("localhost", "root", "", "ebay_database");


$query = "SELECT * FROM users WHERE user_username='$username'";
$result = $conn->query($query);

if ($result->num_rows == 0) {
    $insertQuery = "
        INSERT INTO users (user_firstname, user_lastname, user_username, user_email, user_password, user_type, user_address, created_date) 
        VALUES ('$first_name', '$last_name', '$username', '$email', '$password', 'user', '$address', NOW())
    ";
    if ($conn->query($insertQuery) === TRUE) {
        setcookie("username", $username, time() + (86400 * 30), "/");
        header("Location: ../index.php");
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    header("Location: ../pages/sign_up.php?error=Username already exists");
}