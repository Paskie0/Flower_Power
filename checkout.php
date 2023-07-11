<?php
$isLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
$isMedewerker = isset($_SESSION['loggedinMedewerker']) && $_SESSION['loggedinMedewerker'] === true;
include_once 'checkout-logic.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flower Power</title>
    <link rel="stylesheet" href="css/output.css">
    <script src="https://kit.fontawesome.com/d437031e9c.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include './components/header.php'; ?>
    <h1 class="font-bold p-4">Bestellen:</h1>

    <h2 class="p-4">Artikelen in winkelwagen:</h2>
    <ul class="p-4">
        <?php
        mysqli_data_seek($result, 0);
        while ($row = mysqli_fetch_assoc($result)) {
            $productName = $row['artikel_naam'];
            $productPrice = $row['artikel_prijs'];
            $quantity = 1;
            $subtotal = $productPrice * $quantity;
        ?>
            <li><?php echo $productName; ?> - Hoeveelheid: <?php echo $quantity; ?> - Totaal: $<?php echo $subtotal; ?></li>
        <?php
        }
        ?>
    </ul>
    <h2>Totaal: €<?php echo $totalPrice; ?></h2>
    <form action="process-checkout.php" method="post" class="p-4">
        <label for="klant_straatnaam" class="font-semibold py-1">Straatnaam:</label>
        <input type="text" id="klant_straatnaam" name="klant_straatnaam" required class="input input-bordered w-full">

        <label for="klant_huisnummer" class="font-semibold py-1">Huisnummer:</label>
        <input type="text" id="klant_huisnummer" name="klant_huisnummer" required class="input input-bordered w-full">

        <label for="klant_postcode" class="font-semibold py-1">Postcode:</label>
        <input type="text" id="klant_postcode" name="klant_postcode" required class="input input-bordered w-full">

        <label for="klant_plaats" class="font-semibold py-1">Plaats:</label>
        <input type="text" id="klant_plaats" name="klant_plaats" required class="input input-bordered w-full">

        <label for="klant_telefoon" class="font-semibold py-1">Telefoon:</label>
        <input type="text" id="klant_telefoon" name="klant_telefoon" required class="input input-bordered w-full">

        <button type="submit" class="btn btn-primary btn-wide btn-sm mt-4 no-animation">Bestelling afronden</button>
    </form>
    <?php include './components/footer.php'; ?>
    <script src="./js/scripts.js"></script>
</body>

</html>