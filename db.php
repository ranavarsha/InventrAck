$conn = mysqli_connect(
    getenv("DB_HOST"),
    getenv("DB_USER"),
    getenv("DB_PASS"),
    getenv("DB_NAME")
);

if (!$conn) {
    die("DB Connection Failed: " . mysqli_connect_error());
}
