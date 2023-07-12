<?php
include_once './functions/initialize.php';
include_once './functions/connect.php';

// Retrieve order and customer data from the database
$orderQuery = "SELECT * FROM bestellingen";
$orderResult = mysqli_query($conn, $orderQuery);

// Check if the query was successful
if ($orderResult && mysqli_num_rows($orderResult) > 0) {
    $orders = mysqli_fetch_all($orderResult, MYSQLI_ASSOC);
} else {
    $orders = [];
}

// Free the result set
mysqli_free_result($orderResult);

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Overview</title>
    <link rel="stylesheet" href="./css/output.css">
</head>

<body>
    <?php include './components/header.php'; ?>
    <h1>Order Overview</h1>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Email</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order) : ?>
                <tr>
                    <td><?php echo $order['bestelling_id']; ?></td>
                    <td><?php echo $order['klant_id']; ?></td>
                    <td><?php echo $order['bestelling_totaal']; ?></td>
                    <td><?php echo $order['bestelling_datum']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php include './components/footer.php'; ?>
</body>

</html>