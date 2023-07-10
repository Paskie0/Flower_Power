<?php
session_start();
include_once '../connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the user is logged in
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        // User is not logged in, handle accordingly (e.g., redirect to login page)
        header('HTTP/1.1 401 Unauthorized');
        exit();
    }

    // Get the product ID from the request
    $productId = $_POST['productId'];

    // Perform additional validation and sanitization if necessary

    // Add the product to the user's cart in the database
    $userId = $_SESSION['user_id'];
    $query = "INSERT INTO winkelwagen (klant_id, artikel_id) VALUES ('$userId', '$productId')";

    if (mysqli_query($conn, $query)) {
        // Product added successfully
        header('HTTP/1.1 200 OK');
        exit();
    } else {
        // Error occurred while adding the product
        header('HTTP/1.1 500 Internal Server Error');
        exit();
    }
} else {
    // Invalid request method
    header('HTTP/1.1 400 Bad Request');
    exit();
}
