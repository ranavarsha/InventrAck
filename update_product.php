<?php
require_once "../includes/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $name = $_POST['product_name'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $sql = "UPDATE products 
            SET product_name = '$name',
                category = '$category',
                quantity = $quantity,
                price = $price
            WHERE id = $id";

    if ($conn->query($sql)) {
        header("Location: ../pages/dashboard.php");
        exit;
    } else {
        echo "Error updating product";
    }
}
?>
