<?php
include './config/config.php';

// Create a MySQLi connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Optional: Set charset to utf8mb4 for better compatibility
$conn->set_charset("utf8mb4");

echo "Connected successfully!"; // Debugging line (remove in production)
?>