<?php
include_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $field = $_POST['field'];
    $value = $_POST['value'];

    $field = mysqli_real_escape_string($conn, $field);
    $value = mysqli_real_escape_string($conn, $value);

    session_start();
    $klant_id = $_SESSION['user_id'];

    $query = "UPDATE klanten SET $field = ? WHERE klant_id = ?";
    $statement = $conn->prepare($query);

    $statement->bind_param("ss", $value, $klant_id);

    if ($statement->execute()) {
        echo "Data updated successfully!";
    } else {
        echo "Error updating data: " . $statement->error;
    }

    $statement->close();
}

$conn->close();
