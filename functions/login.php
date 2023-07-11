<?php
session_start();

include_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email-login'];
    $password = $_POST['password-login'];
    $sql = "SELECT * FROM `klanten` WHERE `klant_email` = '$email' AND `klant_wachtwoord` = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['loggedin'] = true;
        $_SESSION['user_id'] = $row['klant_id'];
        $_SESSION['username'] = $row['klant_email'];
        header("Location: /Flower-Power/index.php");
        $succesMessage = "Ingelogd!";
        echo '<script type="text/javascript">';
        echo 'alert("' . $succesMessage . '");';
        echo 'window.location.href = "/Flower-Power/index.php";';
        echo '</script>';
        exit();
    } else {
        $errorMessage = "Fout wachtwoord of emailadres";

        echo '<script type="text/javascript">';
        echo 'alert("' . $message . '");';
        echo 'window.location.href = "/Flower-Power/index.php";';
        echo '</script>';
    }
    $conn->close();
}
