<?php
session_start();
$isLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
$isMedewerker = isset($_SESSION['loggedinMedewerker']) && $_SESSION['loggedinMedewerker'] === true;
include_once '../connect.php';

// Check if the user is logged in
if (!$isLoggedIn) {
    // Redirect the user to the login page or handle accordingly
    header('Location: login.php');
    exit();
}

// Get the user ID from the session
$userId = $_SESSION['user_id'];

// Retrieve the cart items for the user from the database
$query = "SELECT a.artikel_naam, a.artikel_prijs
          FROM artikelen AS a
          INNER JOIN cart AS c ON a.artikel_id = c.product_id
          WHERE c.user_id = '$userId'";
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result && mysqli_num_rows($result) > 0) {
    $cartItems = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $cartItems = [];
}

// Free the result set
mysqli_free_result($result);

// Close the database connection
mysqli_close($conn);
