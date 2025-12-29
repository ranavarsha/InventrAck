<?php
$conn = new mysqli(
    "127.0.0.1",          // host
    "inventrack_user",    // username
    "1234",          // password (use your actual password)
    "inventrack",         // database
    3307                  // 🔥 IMPORTANT: MySQL PORT
);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
