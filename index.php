<?php
include_once './functions/initialize.php';
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
    <div class="hero min-h-screen" style="background-image: url(./img/bouquet-showcase.jpg);">
        <div class="hero-overlay bg-opacity-60"></div>
        <div class="hero-content text-center text-white">
            <div class="max-w-md">
                <h1 class="mb-5 text-5xl font-bold">Welkom bij,</h1>
                <h1 class="mb-5 text-5xl text-green-200 font-bold font-logo">Flower Power</h1>
                <p class="mb-5 text-lg">Ontdek onze adembenemende selectie van bloemen voor elke gelegenheid en laat je betoveren door hun kleuren en geuren.</p>
                <a href="catalogue/index.php" role="button" class="btn btn-primary">Shop Nu</a>
            </div>
        </div>
    </div>
    <h2 class="p-4 text-2xl">Onze Bestsellers</h2>
    <div class="carousel carousel-center max-w-full p-4 space-x-4">
        <?php
        $query = "SELECT * FROM artikelen ORDER BY RAND() LIMIT 6";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $productNaam = $row['artikel_naam'];
                $productPrijs = $row['artikel_prijs'];
        ?>
                <div class="carousel-item flex-col w-40">
                    <img src="img/flower1.webp" class="rounded-box" />
                    <h3 class="font-semibold text-lg"><?php echo $productNaam; ?></h3>
                    <p>€<?php echo $productPrijs; ?></p>
                </div>
        <?php
            }
        }
        mysqli_free_result($result);
        ?>
    </div>
    <h3 class="py-4 pl-4 text-xl inline">Ontdek al onze producten</h3>
    <a href="#" role="button" class="m-4 btn btn-primary">Klik Hier</a>
    <div class="hero min-h-[30%]">
        <div class="hero-content flex-col sm:flex-row">
            <img src="./img/flower5.jpg" class="object-cover max-h-[30rem] w-full sm:w-64 rounded-lg shadow-2xl" />
            <div>
                <h1 class="text-5xl font-bold">Over Ons</h1>
                <p class="py-6">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
                <button class="btn btn-primary">Meer Informatie</button>
            </div>
        </div>
    </div>
    <div class="hero min-h-[30%]">
        <div class="hero-content flex-col sm:flex-row-reverse">
            <img src="./img/flower6.jpg" class="object-cover max-h-[30rem] w-full sm:w-64 rounded-lg shadow-2xl" />
            <div>
                <h1 class="text-5xl font-bold">Duurzaam</h1>
                <p class="py-6">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
                <button class="btn btn-primary">Meer Informatie</button>
            </div>
        </div>
    </div>
    <?php include './components/footer.php'; ?>
</body>

</html>