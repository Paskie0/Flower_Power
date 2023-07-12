<?php
session_start();
include_once 'connect.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $userId = $_SESSION['user_id'];

    // Query to retrieve the sum of "hoeveelheid" from the "winkelwagen" table
    $cartQuery = "SELECT SUM(hoeveelheid) AS cartCount FROM winkelwagen WHERE klant_id = $userId";

    // Execute the query
    $cartResult = mysqli_query($conn, $cartQuery);

    // Check if the query was successful and retrieve the cart count
    if ($cartResult && mysqli_num_rows($cartResult) > 0) {
        $cartData = mysqli_fetch_assoc($cartResult);
        $cartCount = $cartData['cartCount'];
    } else {
        $cartCount = 0;
    }

    // Free the result set
    mysqli_free_result($cartResult);
} else {
    $cartCount = 0;
}

echo $cartCount;
