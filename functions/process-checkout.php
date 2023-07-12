<?php
session_start();
include_once 'connect.php';

// Check if the user is logged in or redirect to the login page if not
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

// Retrieve the user ID from the session
$userId = $_SESSION['user_id'];

$query = "SELECT a.artikel_naam, a.artikel_prijs, c.hoeveelheid
          FROM artikelen AS a
          INNER JOIN winkelwagen AS c ON a.artikel_id = c.artikel_id
          WHERE c.klant_id = '$userId'";
$result = mysqli_query($conn, $query);

$klant_straatnaam = $_POST['klant_straatnaam'];
$klant_huisnummer = $_POST['klant_huisnummer'];
$klant_postcode = $_POST['klant_postcode'];
$klant_plaats = $_POST['klant_plaats'];
$klant_telefoon = $_POST['klant_telefoon'];

$updateQuery = "UPDATE klanten SET klant_straatnaam = '$klant_straatnaam',
                                klant_huisnummer = '$klant_huisnummer',
                                klant_postcode = '$klant_postcode',
                                klant_plaats = '$klant_plaats',
                                klant_telefoon = '$klant_telefoon'
                WHERE klant_id = '$userId'";
mysqli_query($conn, $updateQuery);

$totalAmount = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $productPrice = $row['artikel_prijs'];
    $quantity = $row['hoeveelheid'];
    $totalAmount += $productPrice * $quantity;
}

$insertQuery = "INSERT INTO bestellingen (klant_id, bestelling_datum, bestelling_totaal)
                VALUES ('$userId', NOW(), '$totalAmount')";
mysqli_query($conn, $insertQuery);
mysqli_close($conn);
header('Location: /Flower-Power/complete.php');
exit;
