<?php
session_start(); // Start the session

// Unset or destroy the session variables
unset($_SESSION['loggedin']);
unset($_SESSION['user_id']);
unset($_SESSION['username']);

// Optional: Destroy the entire session
// session_destroy();

// Redirect the user to the desired page after logout
header("Location: index.php");
exit();
