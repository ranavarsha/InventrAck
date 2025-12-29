<?php
require_once "../includes/db.php";// connect to database

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $product_name = $_POST['product_name'];
    $category     = $_POST['category'];
    $quantity     = $_POST['quantity'];
    $price        = $_POST['price'];

    $sql = "INSERT INTO products (product_name, category, quantity, price)
            VALUES ('$product_name', '$category', $quantity, $price)";

    if ($conn->query($sql)) {
        echo "Product added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
