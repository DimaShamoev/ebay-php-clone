<?php
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "ebay_database";

    $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

    if (!$conn) die("Connection error: " . mysqli_connect_error());