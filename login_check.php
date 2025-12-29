<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

/* Simple hardcoded login (for college project) */
if ($username === "admin" && $password === "admin123") {
    $_SESSION['user'] = $username;
    header("Location: list_products.php");
} else {
    echo "Invalid login. <a href='login.php'>Try again</a>";
}
