<?php
include "db.php";

if (!isset($_GET['id'])) {
    echo "Invalid request";
    exit;
}

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM products WHERE id = $id");

if ($result->num_rows == 0) {
    echo "Product not found";
    exit;
}

$product = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product | InventrAck</title>
</head>
<body>

<h2>Edit Product</h2>

<form method="POST" action="update_product.php">

    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">

    <label>Product Name</label><br>
    <input type="text" name="product_name"
           value="<?php echo $product['product_name']; ?>" required><br><br>

    <label>Category</label><br>
    <input type="text" name="category"
           value="<?php echo $product['category']; ?>"><br><br>

    <label>Quantity</label><br>
    <input type="number" name="quantity"
           value="<?php echo $product['quantity']; ?>" required><br><br>

    <label>Price</label><br>
    <input type="number" step="0.01" name="price"
           value="<?php echo $product['price']; ?>" required><br><br>

    <button type="submit">Update Product</button>
</form>

<br>
<a href="list_products.php">Back to Product List</a>

</body>
</html>
