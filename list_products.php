<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

include "db.php";

/* ---------- DASHBOARD DATA ---------- */
$totalProducts = $conn->query("SELECT COUNT(*) AS total FROM products")
                      ->fetch_assoc()['total'];

$totalStock = $conn->query("SELECT SUM(quantity) AS stock FROM products")
                   ->fetch_assoc()['stock'];

$lowStock = $conn->query("SELECT COUNT(*) AS low FROM products WHERE quantity < 5")
                 ->fetch_assoc()['low'];

$highStock = $conn->query("SELECT COUNT(*) AS high FROM products WHERE quantity > 15")
                  ->fetch_assoc()['high'];

/* ---------- SEARCH + LIST ---------- */
if (isset($_GET['search']) && $_GET['search'] !== "") {
    $search = $_GET['search'];
    $result = $conn->query("
        SELECT * FROM products
        WHERE product_name LIKE '%$search%'
           OR category LIKE '%$search%'
        ORDER BY id ASC
    ");
} else {
    $result = $conn->query("SELECT * FROM products ORDER BY id ASC");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>InventrAck | Product List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src="logo.jpeg" alt="InventrAck Logo" width="80">

    <a href="logout.php" class="logout-btn">Logout</a>

    <h1 style="text-align:center;">InventrAck Dashboard</h1>

<!-- DASHBOARD -->
<div class="dashboard">
    <div class="card">Total Products: <?php echo $totalProducts; ?></div>
    <div class="card">Total Stock: <?php echo $totalStock ?? 0; ?></div>
    <div class="card">Low Stock: <?php echo $lowStock; ?></div>
    <div class="card">High Stock: <?php echo $highStock; ?></div>
</div>

<!-- SEARCH -->
<form method="GET" style="text-align:center; margin-bottom:15px;">
    <input type="text" name="search" placeholder="Search product or category">
    <button class="card" style="background:#2ecc71;">Search</button>
</form>

<!-- TABLE -->
<table>
    <tr>
        <th>S.No</th>
        <th>Name</th>
        <th>Category</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Created At</th>
        <th>Action</th>
    </tr>

<?php
$sn = 1;
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        if ($row['quantity'] < 5) {
            $class = "low";
            $label = "Low Stock";
        } elseif ($row['quantity'] > 15) {
            $class = "high";
            $label = "High Stock";
        } else {
            $class = "";
            $label = "";
        }

        echo "<tr>
                <td>{$sn}</td>
                <td>{$row['product_name']}</td>
                <td>{$row['category']}</td>
                <td class='{$class}'>{$row['quantity']} {$label}</td>
                <td>{$row['price']}</td>
                <td>{$row['created_at']}</td>
                <td>
                    <a href='edit_product.php?id={$row['id']}'>Edit</a> |
                    <a href='delete_product.php?id={$row['id']}'
                       onclick=\"return confirm('Are you sure?')\">Delete</a>
                </td>
              </tr>";
        $sn++;
    }
} else {
    echo "<tr><td colspan='7'>No products found</td></tr>";
}
?>

</table>

<br>
<div style="text-align:center;">
    <a href="add_product.php" class="card">Add New Product</a>
</div>

<footer class="footer">
    © 2025 InventrAck | Inventory Management System
</footer>

</body>
</html>
