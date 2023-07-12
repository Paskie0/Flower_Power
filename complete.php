<?php
include_once './functions/initialize.php';
include_once './functions/connect.php';

// Check if the user is logged in
if ($isLoggedIn) {
    $userId = $_SESSION['user_id'];

    // Retrieve the most recent order of the logged-in customer from the database
    $orderQuery = "SELECT * FROM bestellingen WHERE klant_id = '$userId' ORDER BY bestelling_datum DESC LIMIT 1";
    $orderResult = mysqli_query($conn, $orderQuery);

    // Check if the query was successful
    if ($orderResult && mysqli_num_rows($orderResult) > 0) {
        $order = mysqli_fetch_assoc($orderResult);
    } else {
        $order = null;
    }

    // Free the result set
    mysqli_free_result($orderResult);
} else {
    // User is not logged in, handle accordingly
    // Redirect to login page or display an error message
    // For example:
    header('Location: login.php');
    exit();
}

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
    <h1 class="pt-4 text-4xl font-bold text-center">Bedankt voor je bestelling!</h1>
    <div class="divider"></div>
    <?php if ($order) : ?>
        <table>
            <thead>
                <tr>
                    <th>Bestel nr.</th>
                    <th>Klant nr.</th>
                    <th>Totaal</th>
                    <th>Datum</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $order['bestelling_id']; ?></td>
                    <td><?php echo $order['klant_id']; ?></td>
                    <td><?php echo $order['bestelling_totaal']; ?></td>
                    <td><?php echo $order['bestelling_datum']; ?></td>
                </tr>
            </tbody>
        </table>
    <?php else : ?>
        <p>No order found.</p>
    <?php endif; ?>
    <?php include './components/footer.php'; ?>
</body>

</html>