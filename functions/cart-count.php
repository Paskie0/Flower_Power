<?php
session_start();
include_once 'connect.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $userId = $_SESSION['user_id'];

    $cartQuery = "SELECT SUM(hoeveelheid) AS cartCount FROM winkelwagen WHERE klant_id = $userId";

    $cartResult = mysqli_query($conn, $cartQuery);

    if ($cartResult && mysqli_num_rows($cartResult) > 0) {
        $cartData = mysqli_fetch_assoc($cartResult);
        $cartCount = $cartData['cartCount'];
    } else {
        $cartCount = 0;
    }

    mysqli_free_result($cartResult);
} else {
    $cartCount = 0;
}

echo $cartCount;
