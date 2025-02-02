<?php
// Start the session
session_start();

// Include the database connection file
include './includes/db.php';

// Initialize variables to store form data and error messages
$email = $password = '';
$errors = [];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate form data
    $email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    // Validate email
    if (empty($email)) {
        $errors['email'] = 'Email address is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address.';
    }

    // Validate password
    if (empty($password)) {
        $errors['password'] = 'Password is required.';
    }

    // If there are no errors, proceed with sign-in
    if (empty($errors)) {
        // Fetch the user from the database
        $stmt = $conn->prepare("SELECT user_id, full_name, email, password, role FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Password is correct, start a session
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['full_name'] = $user['full_name'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role'];

                // Redirect based on the user's role
                if ($user['role'] === 'admin') {
                    header('Location: dashboard.php'); // Admin redirection
                    exit();
                } else {
                    header('Location: index.php'); // Customer redirection
                    exit();
                }
            } else {
                $errors['password'] = 'Incorrect password.';
            }
        } else {
            $errors['email'] = 'No account found with this email address.';
        }
        // Close the statement
        $stmt->close();
    }
}
?>
