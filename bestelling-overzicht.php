<?php
include_once './functions/initialize.php';

if (!isset($_SESSION['loggedinMedewerker']) || $_SESSION['loggedinMedewerker'] !== true) {
    // Redirect the user to a login page or show an access denied message
    $succesMessage = "U bent niet ingelogd als medewerker";
    echo '<script type="text/javascript">';
    echo 'alert("' . $succesMessage . '");';
    echo 'window.location.href = "login.php"';
    echo '</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collectie</title>
    <link rel="stylesheet" href="./css/output.css">
    <script src="https://kit.fontawesome.com/d437031e9c.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include './components/header.php'; ?>
    <h1>Bestellingen:</h1>
    <?php include './functions/get-orders.php'; ?>
    <?php include './components/footer.php'; ?>
</body>

</html>