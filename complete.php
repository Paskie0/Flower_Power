<?php
include_once './functions/initialize.php';
include_once './functions/connect.php';

if ($isLoggedIn) {
    $userId = $_SESSION['user_id'];

    $orderQuery = "SELECT * FROM bestellingen WHERE klant_id = '$userId' ORDER BY bestelling_datum DESC LIMIT 1";
    $orderResult = mysqli_query($conn, $orderQuery);

    if ($orderResult && mysqli_num_rows($orderResult) > 0) {
        $order = mysqli_fetch_assoc($orderResult);

        $customerQuery = "SELECT * FROM klanten WHERE klant_id = '$userId'";
        $customerResult = mysqli_query($conn, $customerQuery);

        if ($customerResult && mysqli_num_rows($customerResult) > 0) {
            $customer = mysqli_fetch_assoc($customerResult);
        } else {
            $customer = null;
        }

        mysqli_free_result($customerResult);
    } else {
        $order = null;
        $customer = null;
    }

    mysqli_free_result($orderResult);
} else {
    header('Location: login.php');
    exit();
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Overview</title>
    <link rel="stylesheet" href="./css/output.css">
    <script src="https://kit.fontawesome.com/d437031e9c.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include './components/header.php'; ?>
    <h1 class="pt-4 text-4xl font-bold text-center">Bedankt voor je bestelling!</h1>
    <div class="divider"></div>
    <?php if ($order && $customer) : ?>
        <h2 class="text-center">Persoonlijke informatie</h2>
        <p class="text-center">Naam: <?php echo $customer['klant_voornaam']; ?></p>
        <p class="text-center">Email: <?php echo $customer['klant_email']; ?></p>
        <p class="text-center">Straatnaam: <?php echo $customer['klant_straatnaam']; ?></p>
        <p class="text-center">Huisnummer: <?php echo $customer['klant_huisnummer']; ?></p>
        <p class="text-center">Postcode: <?php echo $customer['klant_postcode']; ?></p>
        <div class="flex justify-center">
            <table class="w-full max-w-md bg-base-200 shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bestel Nr.</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bestel datum</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Totaal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr>
                        <td class="px-4 py-3"><?php echo $order['bestelling_id']; ?></td>
                        <td class="px-4 py-3"><?php echo $order['bestelling_datum']; ?></td>
                        <td class="px-4 py-3"><?php echo $order['bestelling_totaal']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php else : ?>
        <p>No order found or customer information missing.</p>
    <?php endif; ?>
    <?php include './components/footer.php'; ?>
</body>

</html>