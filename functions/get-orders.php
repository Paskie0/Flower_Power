<?php
$query = "SELECT * FROM bestellingen";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach ($orders as $order) {
        $orderId = $order['bestelling_id'];
        $customerId = $order['klant_id'];
        $orderDate = $order['bestelling_datum'];
        $totalAmount = $order['bestelling_totaal'];

        echo "<p>Bestellings nr.: $orderId</p>";
        echo "<p>Klanten nr.: $customerId</p>";
        echo "<p>Besteldatum: $orderDate</p>";
        echo "<p>Totaal: $totalAmount</p>";
        echo "<hr>";
    }
} else {
    echo '<p>No orders found.</p>';
}

mysqli_free_result($result);

mysqli_close($conn);
