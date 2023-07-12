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
        <a href="#" class="card bg-base-200 shadow-lg rounded-lg overflow-hidden transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110">
            <h2>Flower Arrangements</h2>
            <p>View our beautiful flower arrangements</p>
        </a>
        <a href="#" class="card bg-base-200 shadow-lg rounded-lg overflow-hidden transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110">
            <h2>Plants</h2>
            <p>Explore our collection of plants</p>
        </a>
        <a href="#" class="card bg-base-200 shadow-lg rounded-lg overflow-hidden transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110">
            <h2>Gifts</h2>
            <p>Find the perfect gift for any occasion</p>
        </a>
    </div>
    <?php include './components/footer.php'; ?>
</body>

</html>