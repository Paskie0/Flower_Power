<?php
include_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productNaam = $_POST['product_naam'];
    $productPrijs = $_POST['product_prijs'];
    $productBeschrijving = $_POST['product_beschrijving'];

    $insertQuery = "INSERT INTO artikelen (artikel_naam, artikel_prijs, artikel_beschrijving) VALUES ('$productNaam', '$productPrijs', '$productBeschrijving')";
    $insertResult = mysqli_query($conn, $insertQuery);

    if ($insertResult) {
        echo 'Product added successfully.';
    } else {
        echo 'Error adding product.';
    }
}
header("Location: /Flower-Power/product-overview.php");
mysqli_close($conn);
