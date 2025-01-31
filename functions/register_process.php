<?php
session_start();
include '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $full_name = trim(mysqli_real_escape_string($conn, $_POST['full_name']));
    $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $phone = trim(mysqli_real_escape_string($conn, $_POST['phone']));
    $address = trim(mysqli_real_escape_string($conn, $_POST['address']));
    $role = trim(mysqli_real_escape_string($conn, $_POST['role']));

    // Validate required fields
    if (empty($full_name) || empty($email) || empty($password) || empty($confirm_password)) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: signup.php");
        exit();
    }

    // Check if passwords match
    if ($password !== $confirm_password) {
        $_SESSION['error'] = "Passwords do not match.";
        header("Location: signup.php");
        exit();
    }

    // Check if email already exists
    $check_email = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $check_email);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['error'] = "Email is already registered.";
        header("Location: signup.php");
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into database
    $query = "INSERT INTO users (full_name, email, password,) 
              VALUES ('$full_name', '$email', '$hashed_password',)";

    if (mysqli_query($conn, $query)) {
        $_SESSION['success'] = "Registration successful. Please log in.";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['error'] = "Something went wrong. Please try again.";
        header("Location: signup.php");
        exit();
    }
} else {
    $_SESSION['error'] = "Invalid request.";
    header("Location: signup.php");
    exit();
}
?>
