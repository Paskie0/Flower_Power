<?php
session_start();
include_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header('HTTP/1.1 401 Unauthorized');
        exit();
    }

    $productId = $_POST['productId'];
    $userId = $_SESSION['user_id'];
    $quantity = $_POST['quantity']; // Get the selected quantity from the request

    $query = "INSERT INTO winkelwagen (klant_id, artikel_id, hoeveelheid) VALUES ('$userId', '$productId', '$quantity')";


    if (mysqli_query($conn, $query)) {
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
