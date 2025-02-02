<?php
// Start the session
session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: signin.php');
    exit();
}

// Include the database connection file
include './includes/db.php';

// Fetch the product ID from the URL
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Delete the product from the database
$stmt = $conn->prepare("DELETE FROM products WHERE product_id = ?");
$stmt->bind_param("i", $product_id);

if ($stmt->execute()) {
    header('Location: admin_dashboard.php');
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
?>