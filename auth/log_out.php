<?php
    setcookie("username", "", time() - 3600, "/"); 
    header("Location: /ebay-php-clone/index.php");
    exit(); 