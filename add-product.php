<?php
// Assuming you have already established a database connection
include_once 'connect.php';
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the submitted form data
    $productNaam = $_POST['product_naam'];
    $productPrijs = $_POST['product_prijs'];
    $productBeschrijving = $_POST['product_beschrijving'];

    // Insert the new product into the database
    $insertQuery = "INSERT INTO artikelen (artikel_naam, artikel_prijs, artikel_beschrijving) VALUES ('$productNaam', '$productPrijs', '$productBeschrijving')";
    $insertResult = mysqli_query($conn, $insertQuery);

    // Check if the insertion was successful
    if ($insertResult) {
        echo 'Product added successfully.';
    } else {
        echo 'Error adding product.';
    }
}

// Close the database connection
mysqli_close($conn);
