<?php
$servername = "localhost";
$username = "u597563256_Pascal";
$password = "3Lf6aR3s!";
$dbname = "u597563256_Flower_Power";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
