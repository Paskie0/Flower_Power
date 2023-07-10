<?php
session_start();
include_once 'connect.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

$userId = $_SESSION['user_id'];

$query = "SELECT a.artikel_naam, a.artikel_prijs
          FROM artikelen AS a
          INNER JOIN winkelwagen AS c ON a.artikel_id = c.artikel_id
          WHERE c.klant_id = '$userId'";
$result = mysqli_query($conn, $query);


$totalPrice = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $productPrice = $row['artikel_prijs'];
    $quantity = 1;
    $subtotal = $productPrice * $quantity;
    $totalPrice += $subtotal;
}

mysqli_close($conn);
