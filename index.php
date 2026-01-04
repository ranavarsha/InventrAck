<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
} else {
    header("Location: list_products.php");
    exit();
}
?>
