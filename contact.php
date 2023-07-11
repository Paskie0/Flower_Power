<?php
session_start();
$isLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="css/output.css">
    <script src="https://kit.fontawesome.com/d437031e9c.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include './components/header.php'; ?>
    <h1 class="pt-4 text-4xl font-bold text-center">Contact informatie</h1>
    <div class="divider"></div>
    <div class="hero min-h-[30%]">
        <div class="hero-content flex-col sm:flex-row">
            <img src="./img/flower7.jpg" class="object-cover max-h-[30rem] w-full sm:w-64 rounded-lg shadow-2xl" />
            <div>
                <h1 class="text-4xl font-bold">Filiaal Almere</h1>
                <h3 class="text-xl font-semibold py-2">Adres</h3>
                <p>Straat van Florida 1</p>
                <h3 class="text-xl font-semibold py-2">Telefoon nr.</h3>
                <a href="tel:+31(030)539-87-65">(030) 539 87 65</a>
                <h3 class="text-xl font-semibold py-2">E-mailadres</h3>
                <a href="mailto:Almere@flowerpower.nl" class="link">Almere@flowerpower.nl</a>
            </div>
        </div>
    </div>
    <div class="hero min-h-[30%]">
        <div class="hero-content flex-col sm:flex-row">
            <img src="./img/flower8.jpg" class="object-cover max-h-[30rem] w-full sm:w-64 rounded-lg shadow-2xl" />
            <div>
                <h1 class="text-4xl font-bold">Filiaal Utrecht</h1>
                <h3 class="text-xl font-semibold py-2">Adres</h3>
                <p>Rotterdamseweg 12</p>
                <h3 class="text-xl font-semibold py-2">Telefoon nr.</h3>
                <a href="tel:+31(030)539-87-65">(030) 539 87 65</a>
                <h3 class="text-xl font-semibold py-2">E-mailadres</h3>
                <a href="mailto:Utrecht@flowerpower.nl" class="link">Utrecht@flowerpower.nl</a>
            </div>
        </div>
    </div>
    <?php include './components/footer.php'; ?>
    <script src="./js/script.js"></script>
</body>

</html>