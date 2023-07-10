<?php
include_once 'connect.php';

$klant_id = $_SESSION['user_id']; // Assuming you have the klant_id stored in a session variable

// Fetch the user data from the database based on klant_id
$sql = "SELECT * FROM klanten WHERE klant_id = '$klant_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Extract the values from the retrieved row
    $email = $row['klant_email'];
    $password = $row['klant_wachtwoord'];
    $firstName = $row['klant_voornaam'];
    $infix = $row['klant_tussenvoegsel'];
    $lastName = $row['klant_achternaam'];
    $dateOfBirth = $row['klant_geboortedatum'];
}

$conn->close();
