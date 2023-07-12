<?php
session_start();
include_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header('HTTP/1.1 401 Unauthorized');
        exit();
    }

    // Get the product ID from the POST data
    $productId = $_POST['productId'];
    $userId = $_SESSION['user_id'];

    // Delete the item from the cart
    $deleteQuery = "DELETE FROM winkelwagen WHERE klant_id = '$userId' AND artikel_id = '$productId'";

    if (mysqli_query($conn, $deleteQuery)) {
        header('HTTP/1.1 200 OK');
        exit();
    } else {
        header('HTTP/1.1 500 Internal Server Error');
        exit();
    }
} else {
    header('HTTP/1.1 400 Bad Request');
    exit();
}
