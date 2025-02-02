<?php
session_start();
session_destroy(); // Destroy session
header("Location: signin.php"); // Redirect to sign-in page
exit();
?>
