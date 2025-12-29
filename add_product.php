<!DOCTYPE html>
<html>
<head>
    <title>Add Product | InventrAck</title>
</head>
<body>

<h2>Add New Product</h2>

<form method="POST" action="save_product.php">

    <input type="text" name="product_name" placeholder="Product Name" required>
    <br><br>

    <input type="text" name="category" placeholder="Category">
    <br><br>

    <input type="number" name="quantity" placeholder="Quantity" required>
    <br><br>

    <input type="number" step="0.01" name="price" placeholder="Price">
    <br><br>

    <button type="submit">Add Product</button>

</form>

</body>
</html>
