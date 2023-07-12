<?php
include_once './functions/initialize.php';
include_once './functions/get-cart-items.php';

// Check if the form for deleting an item is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteItemId'])) {
    $itemId = $_POST['deleteItemId'];

    // Perform the deletion operation
    $deleteQuery = "DELETE FROM winkelwagen WHERE klant_id = '$userId' AND artikel_id = '$itemId'";

    if (mysqli_query($conn, $deleteQuery)) {
        // Refresh the page to update the cart items
        header('Location: cart.php');
        exit();
    } else {
        // Handle the deletion error
        $deletionError = true;
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
                <?php echo $item['artikel_naam']; ?> - $<?php echo $item['artikel_prijs']; ?>
                <form method="post" action="cart.php">
                    <input type="hidden" name="deleteItemId" value="<?php echo $item['artikel_id']; ?>">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php if (isset($deletionError)) : ?>
        <p>Error occurred during item deletion. Please try again.</p>
    <?php endif; ?>
    <a href="checkout.php" class="btn btn-primary m-4">Bestellen</a>
    <?php include './components/footer.php'; ?>
</body>

</html>