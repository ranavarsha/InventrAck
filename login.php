<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: list_products.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login | InventrAck</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2 class="login-title">Login</h2>

<form class="login-form" method="POST" action="login_check.php">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>

</body>
</html>
