<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "ebay_database";

        $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

        if($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }

        $query = "SELECT * FROM users WHERE user_username='$username' AND user_password='$password'";

        $result = $conn->query($query);

        if ($result->num_rows == 1) {
            setcookie("username", $username, time() + (86400 * 30), "/");
            header("Location: ../index.php");
        } else {
            header("Location: ../pages/sign_in.php");
        }
    }   
