<?php
$klant_id = $_SESSION['user_id'];

$sql = "SELECT * FROM klanten WHERE klant_id = '$klant_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $email = $row['klant_email'];
    $password = $row['klant_wachtwoord'];
    $firstName = $row['klant_voornaam'];
    $infix = $row['klant_tussenvoegsel'];
    $lastName = $row['klant_achternaam'];
    $dateOfBirth = $row['klant_geboortedatum'];
    $street = $row['klant_straatnaam'];
    $houseNumber = $row['klant_huisnummer'];
    $postcode = $row['klant_postcode'];
    $city = $row['klant_plaats'];
    $phone = $row['klant_telefoon'];
}

$conn->close();
