<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "ebay_database";

    $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    $query = "SELECT * FROM users WHERE user_username='$username'";
    $result = $conn->query($query);

    if ($result->num_rows == 0) {
        $insertQuery = "INSERT INTO users (user_username, user_email, user_password) VALUES ('$username', '$email', '$password')";
        if ($conn->query($insertQuery) === TRUE) {
            setcookie("username", $username, time() + (86400 * 30), "/"); // Set cookie for 30 days
            header("Location: ../index.php");
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        header("Location: ../pages/sign_up.php?error=Username already exists");
    }
}
?>