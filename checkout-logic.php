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

// Retrieve the cart items for the user from the database
$query = "SELECT a.artikel_naam, a.artikel_prijs
          FROM artikelen AS a
          INNER JOIN winkelwagen AS c ON a.artikel_id = c.artikel_id
          WHERE c.klant_id = '$userId'";
$result = mysqli_query($conn, $query);

// Retrieve other user details, such as shipping address, from the database if necessary

// Calculate the total price of the cart
$totalPrice = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $productPrice = $row['artikel_prijs'];
    $quantity = 1;
    $subtotal = $productPrice * $quantity;
    $totalPrice += $subtotal;
}

// Close the database connection
mysqli_close($conn);
