<?php
include_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['productId'];
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productDescription = $_POST['productDescription'];

    $productName = mysqli_real_escape_string($conn, $productName);
    $productPrice = mysqli_real_escape_string($conn, $productPrice);
    $productDescription = mysqli_real_escape_string($conn, $productDescription);

    $query = "UPDATE artikelen SET artikel_naam = '$productName', artikel_prijs = '$productPrice', artikel_beschrijving = '$productDescription' WHERE artikel_id = '$productId'";

    if ($conn->query($query) === true) {
        echo "Product details updated successfully!";
    } else {
        echo "Error updating product details: " . $conn->error;
    }
}

$conn->close();
