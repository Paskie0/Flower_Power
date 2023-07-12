<?php
include_once './functions/initialize.php';
include_once './functions/get-cart-items.php';

// Check if the form is submitted and the item ID is provided
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteItemId'])) {
    $servername = "localhost";
    $username = "u597563256_Pascal";
    $password = "3Lf6aR3s";
    $dbname = "u597563256_Flower_Power";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $itemId = $_POST['deleteItemId'];

    // Delete the item from the database
    $deleteQuery = "DELETE FROM winkelwagen WHERE artikel_id = '$itemId' AND klant_id = '$userId'";
    mysqli_query($conn, $deleteQuery);

    // Loop through the cart items and remove the item with the matching ID
    foreach ($cartItems as $key => $item) {
        if ($item['artikel_id'] === $itemId) {
            unset($cartItems[$key]);
            break;
        }
    }
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
    <h2 class="font-bold p-4">Winkelwagen:</h2>
    <ul class="p-4">
        <?php foreach ($cartItems as $item) : ?>
            <li>
                <?php echo $item['artikel_naam']; ?> (<?php echo $item['hoeveelheid']; ?>) - $<?php echo $item['artikel_prijs']; ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="hidden" name="deleteItemId" value="<?php echo $item['artikel_id']; ?>">
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="checkout.php" class="btn btn-primary m-4">Bestellen</a>
    <?php include './components/footer.php'; ?>
</body>

</html>