<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header('HTTP/1.1 401 Unauthorized');
        exit();
    }

    $productId = $_POST['productId'];


    $userId = $_SESSION['user_id'];
    $query = "INSERT INTO winkelwagen (klant_id, artikel_id) VALUES ('$userId', '$productId')";

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
