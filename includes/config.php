<?php
$host = "localhost";
$user = "root"; // mặc định XAMPP
$pass = "";
$db   = "news_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?> 