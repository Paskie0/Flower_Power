<?php
session_start();
include_once './functions/get-cart-items.php';
include_once './functions/initialize.php';


if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $userId = $_SESSION['user_id'];

    // Check if the form is submitted and the item ID is provided
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteItemId'])) {
        $itemId = $_POST['deleteItemId'];

        // Query to delete the item from the cart
        $deleteQuery = "DELETE FROM winkelwagen WHERE klant_id = '$userId' AND artikel_id = '$itemId'";

        // Execute the query
        if (mysqli_query($conn, $deleteQuery)) {
            // Deletion successful, refresh the page
            header('Location: cart.php');
            exit();
        } else {
            // Error occurred during deletion
            echo 'Failed to delete the item from the cart.';
        }
    }
} else {
    // User is not logged in, handle accordingly
    header('Location: login.php');
    exit();
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
                <?php echo $item['artikel_naam']; ?> - $<?php echo $item['artikel_prijs']; ?>
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