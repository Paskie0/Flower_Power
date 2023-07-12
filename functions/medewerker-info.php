<?php
include_once 'connect.php';

$medewerker = $_SESSION['medewerker_id'];

$sql = "SELECT * FROM medewerkers WHERE medewerker_id = '$medewerker'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $email = $row['medewerker_email'];
    $password = $row['medewerker_wachtwoord'];
    $firstName = $row['medewerker_voornaam'];
    $infix = $row['medewerker_tussenvoegsel'];
    $lastName = $row['medewerker_achternaam'];
}

$conn->close();
