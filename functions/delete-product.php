<?php
include_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['productId'];

    $query = "DELETE FROM artikelen WHERE artikel_id = '$productId'";

    if ($conn->query($query) === true) {
        echo "Product deleted successfully!";
    } else {
        echo "Error deleting product: " . $conn->error;
    }
}

$conn->close();
