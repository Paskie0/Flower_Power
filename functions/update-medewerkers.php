<?php
include_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $field = $_POST['field'];
    $value = $_POST['value'];

    $field = mysqli_real_escape_string($conn, $field);
    $value = mysqli_real_escape_string($conn, $value);

    session_start();
    $medewerker_id = $_SESSION['medewerker_id'];

    // Prepare the statement with a parameterized query
    $query = "UPDATE medewerkers SET $field = ? WHERE medewerker_id = ?";
    $statement = $conn->prepare($query);

    // Bind the values to the prepared statement parameters
    $statement->bind_param("ss", $value, $klant_id);

    // Execute the prepared statement
    if ($statement->execute()) {
        echo "Data updated successfully!";
    } else {
        echo "Error updating data: " . $statement->error;
    }

    // Close the prepared statement
    $statement->close();
}

$conn->close();