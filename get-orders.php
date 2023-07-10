<?php
include_once 'connect.php';

// Retrieve all orders from the database
$query = "SELECT * FROM bestellingen";
$result = mysqli_query($conn, $query);

// Check if any orders are found
if (mysqli_num_rows($result) > 0) {
    $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Loop through each order and display the details
    foreach ($orders as $order) {
        $orderId = $order['bestelling_id'];
        $customerId = $order['klant_id'];
        $orderDate = $order['bestelling_datum'];
        $totalAmount = $order['bestelling_totaal'];

        // Display the order details
        echo "<p>Order ID: $orderId</p>";
        echo "<p>Customer ID: $customerId</p>";
        echo "<p>Order Date: $orderDate</p>";
        echo "<p>Total Amount: $totalAmount</p>";
        echo "<hr>";
    }
} else {
    echo '<p>No orders found.</p>';
}

// Free the result set
mysqli_free_result($result);

// Close the database connection
mysqli_close($conn);
