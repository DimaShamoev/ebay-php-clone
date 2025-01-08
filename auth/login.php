<?php
$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;

if (!$username || !$password) {
    header("Location: ../pages/sign_in.php?error=Invalid credentials");
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "ebay_database");

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM users WHERE user_username='$username' AND user_password='$password'";
$result = mysqli_query($conn, $query);

if ($user = mysqli_fetch_assoc($result)) {
    setcookie("username", $username, time() + (86400 * 30), "/");
    header("Location: ../index.php");
} else {
    header("Location: ../pages/sign_in.php?error=Invalid credentials");
}
