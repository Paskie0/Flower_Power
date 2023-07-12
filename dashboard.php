<?php
include_once './functions/initialize.php';

if (!isset($_SESSION['loggedinMedewerker']) || $_SESSION['loggedinMedewerker'] !== true) {
    // Redirect the user to a login page or show an access denied message
    $succesMessage = "U bent niet ingelogd als medewerker";
    echo '<script type="text/javascript">';
    echo 'alert("' . $succesMessage . '");';
    echo 'window.location.href = "index.php"';
    echo '</script>';
}
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
    <h1 class="pt-4 text-4xl font-bold text-center">Admin Dashboard</h1>
    <div class="divider"></div>
    <div class=" gap-4 flex justify-evenly flex-wrap">
        <a href="/Flower-Power/bestelling-overzicht.php" class="card w-96 bg-gray-800 shadow-xl hover:scale-95 transition-all">
            <div class="card-body">
                <h2 class="card-title">Overzicht bestellingen</h2>
            </div>
        </a>
        <a href="/Flower-Power/product-overview.php" class="card w-96 bg-gray-800 shadow-xl hover:scale-95 transition-all">
            <div class="card-body">
                <h2 class="card-title">Overzicht producten</h2>
            </div>
        </a>
    </div>
    <?php include './components/footer.php'; ?>
</body>

</html>