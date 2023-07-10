<?php
include_once 'connect.php';

$medewerker = $_SESSION['medewerker_id']; // Assuming you have the klant_id stored in a session variable

// Fetch the user data from the database based on klant_id
$sql = "SELECT * FROM medewerkers WHERE medewerker_id = '$medewerker'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Extract the values from the retrieved row
    $email = $row['medewerker_email'];
    $password = $row['medewerker_wachtwoord'];
    $firstName = $row['medewerker_voornaam'];
    $infix = $row['medewerker_tussenvoegsel'];
    $lastName = $row['medewerker_achternaam'];
    $dateOfBirth = $row['medewerker_geboortedatum'];
}

$conn->close();
