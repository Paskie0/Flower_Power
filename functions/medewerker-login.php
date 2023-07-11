<?php
session_start();

include_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $medewerkerEmail = $_POST['medewerker-email'];
    $medewerkerPassword = $_POST['medewerker-password'];
    $sql = "SELECT * FROM `medewerkers` WHERE `medewerker_email` = '$medewerkerEmail' AND `medewerker_wachtwoord` = '$medewerkerPassword'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['loggedinMedewerker'] = true;
        $_SESSION['medewerker_id'] = $row['medewerker_id'];
        $_SESSION['medewerkerUsername'] = $row['medewerker_email'];
        header("Location: /Flower-Power/index.php");
        exit();
    } else {
        $message = "Fout wachtwoord of emailadres";

        echo '<script type="text/javascript">';
        echo 'alert("' . $message . '");';
        echo 'window.location.href = "index.php";';
        echo '</script>';
    }
    $conn->close();
}
