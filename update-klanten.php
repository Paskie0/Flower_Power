<?php
// Connect to the database
include_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the field and value from the AJAX request
    $field = $_POST['field'];
    $value = $_POST['value'];

    // Escape the values to prevent SQL injection
    $field = mysqli_real_escape_string($conn, $field);
    $value = mysqli_real_escape_string($conn, $value);

    // Update the data in the database based on the field
    $query = "UPDATE klanten SET $field = '$value' WHERE klant_id = {USER_ID}";
    // Replace {USER_ID} with the actual user ID

    if ($conn->query($query) === true) {
        // Data updated successfully
        echo "Data updated successfully!";
    } else {
        // Error occurred while updating data
        echo "Error updating data: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
