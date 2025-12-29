<?php
include "../includes/db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM products WHERE id = $id";

    if ($conn->query($sql)) {
        header("Location: ../pages/dashboard.php");
        exit();
    } else {
        echo "Error deleting product: " . $conn->error;
    }
}
?>
