<?php
session_start(); // Start the session

include_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email-login'];
    $password = $_POST['password-login'];
    $sql = "SELECT * FROM `klanten` WHERE `klant_email` = '$email' AND `klant_wachtwoord` = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['loggedin'] = true;
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        header("Location: account.php");
        exit();
    } else {
        echo "Foutief wachtwoord of emailadres";
    }

    // Close the database connection
    $conn->close();
}
