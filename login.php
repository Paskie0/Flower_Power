<?php
session_start(); // Start the session

include_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the submitted email and password
    $email = $_POST['email-login'];
    $password = $_POST['password-login'];

    // Perform any necessary validation

    // Query the database to check if the email and password match a user record
    $sql = "SELECT * FROM `klanten` WHERE `klant_email` = '$email' AND `klant_wachtwoord` = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // User found, set session variables and redirect to a secure page
        $row = $result->fetch_assoc();
        $_SESSION['loggedin'] = true;
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        header("Location: account.php");
        exit();
    } else {
        // Invalid credentials, display error message
        echo "Invalid email or password.";
    }

    // Close the database connection
    $conn->close();
}
