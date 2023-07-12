<?php
session_start();
$isLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
$isMedewerker = isset($_SESSION['loggedinMedewerker']) && $_SESSION['loggedinMedewerker'] === true;
include_once 'connect.php';

if (!$isLoggedIn) {
    $message = "U moet eerst inloggen!";
    echo '<script type="text/javascript">';
    echo 'alert("' . $message . '");';
    echo 'history.back()';
    echo '</script>';
}

$userId = $_SESSION['user_id'];

$query = "SELECT a.artikel_id, a.artikel_naam, a.artikel_prijs, c.hoeveelheid
          FROM artikelen AS a
          INNER JOIN winkelwagen AS c ON a.artikel_id = c.artikel_id
          WHERE c.klant_id = '$userId'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $cartItems = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $cartItems = [];
}

mysqli_free_result($result);

// Close the database connection
mysqli_close($conn);
