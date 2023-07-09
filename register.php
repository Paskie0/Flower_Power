<?php
include_once './connect.php';

$email = $_POST['email-register'];
$password = $_POST['password-register'];
$firstName = $_POST['first-name'];
$infix = $_POST['infix'];
$lastName = $_POST['last-name'];
$dateOfBirth = $_POST['date-of-birth'];

$sql = "INSERT INTO `klanten` (`klant_email`, `klant_wachtwoord`, `klant_voornaam`, `klant_tussenvoegsel`, `klant_achternaam`, `klant_geboortedatum`) VALUES ('$email', '$password', '$firstName', '$infix', '$lastName', '$dateOfBirth')";

if ($conn->query($sql) === true) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
