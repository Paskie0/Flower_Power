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
    <h1 class="pt-4 text-4xl font-bold text-center">Admin Dashboard</h1>
    <div class="divider"></div>
    <div class="grid grid-cols-3 gap-4">
        <div class="block bg-gray-800 rounded-lg shadow-md p-4 hover:scale-95 transition-all">
            <h2 class="text-xl font-semibold"><?php echo $productNaam; ?></h2>
            <p class="text-gray-600">Price: $<?php echo $productPrijs; ?></p>
            <p class="text-gray-600"><?php echo $productBeschrijving; ?></p>
        </div>
        <div class="block bg-gray-800 rounded-lg shadow-md p-4 hover:scale-95 transition-all">
            <h2 class="text-xl font-semibold"><?php echo $productNaam; ?></h2>
            <p class="text-gray-600">Price: $<?php echo $productPrijs; ?></p>
            <p class="text-gray-600"><?php echo $productBeschrijving; ?></p>
        </div>
        <div class="block bg-gray-800 rounded-lg shadow-md p-4 hover:scale-95 transition-all">
            <h2 class="text-xl font-semibold"><?php echo $productNaam; ?></h2>
            <p class="text-gray-600">Price: $<?php echo $productPrijs; ?></p>
            <p class="text-gray-600"><?php echo $productBeschrijving; ?></p>
        </div>
    </div>
    <?php include './components/footer.php'; ?>
</body>

</html>