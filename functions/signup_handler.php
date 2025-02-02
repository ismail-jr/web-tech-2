<?php
// Include the database connection file
include './includes/db.php';

// Initialize variables to store form data and error messages
$full_name = $email = $phone = $address = $password = $confirm_password = '';
$errors = [];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate form data
    $full_name = isset($_POST['full_name']) ? htmlspecialchars(trim($_POST['full_name'])) : '';
    $email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : '';
    $phone = isset($_POST['phone']) ? htmlspecialchars(trim($_POST['phone'])) : '';
    $address = isset($_POST['address']) ? htmlspecialchars(trim($_POST['address'])) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    $confirm_password = isset($_POST['confirm_password']) ? trim($_POST['confirm_password']) : '';

    // Validate full name
    if (empty($full_name)) {
        $errors['full_name'] = 'Full name is required.';
    }

    // Validate email
    if (empty($email)) {
        $errors['email'] = 'Email address is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address.';
    } else {
        // Check if email already exists in the database
        $stmt = $conn->prepare("SELECT user_id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $errors['email'] = 'This email is already registered.';
        }
        $stmt->close();
    }

    // Validate phone number
    if (empty($phone)) {
        $errors['phone'] = 'Phone number is required.';
    }

    // Validate address
    if (empty($address)) {
        $errors['address'] = 'Address is required.';
    }

    // Validate password
    if (empty($password)) {
        $errors['password'] = 'Password is required.';
    } elseif (strlen($password) < 8) {
        $errors['password'] = 'Password must be at least 8 characters long.';
    }

    // Validate confirm password
    if (empty($confirm_password)) {
        $errors['confirm_password'] = 'Please confirm your password.';
    } elseif ($password !== $confirm_password) {
        $errors['confirm_password'] = 'Passwords do not match.';
    }

    // Validate terms agreement
    if (!isset($_POST['agree_terms'])) {
        $errors['agree_terms'] = 'You must agree to the Terms & Conditions.';
    }

    // Role is determined by email for admin
    $role = 'customer'; // Default role
    if ($email === 'jibrielismail2110@gmail.com') { // Admin email
        $role = 'admin'; // Assign admin role securely
    }

    // If there are no errors, proceed with registration
    if (empty($errors)) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the SQL statement to insert the user data into the database
        $stmt = $conn->prepare("INSERT INTO users (full_name, email, phone, address, password, role) VALUES (?, ?, ?, ?, ?, ?)");
        if ($stmt === false) {
            $errors['database'] = 'Registration failed. Please try again.';
        } else {
            $stmt->bind_param("ssssss", $full_name, $email, $phone, $address, $hashed_password, $role);

            // Execute the statement
            if ($stmt->execute()) {
                // Redirect to the homepage after successful registration
                header('Location: index.php');
                exit();
            } else {
                $errors['database'] = 'Registration failed. Please try again.';
            }

            // Close the statement
            $stmt->close();
        }
    }
}
?>