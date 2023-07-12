<?php
include_once './functions/initialize.php';
include_once './functions/get-cart-items.php';

// Check if the deleteItemButton is clicked
if (isset($_POST['deleteItemButton'])) {

    $deleteItemId = $_POST['deleteItemId'];

    // Query to delete the item from the winkelwagen table
    $query = "DELETE FROM winkelwagen WHERE artikel_id = '$deleteItemId' AND klant_id = '$userId'";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        // Deletion successful
        // Redirect or display a success message
        header('Location: cart.php');
        exit();
    } else {
        // Error occurred during deletion
        // Handle the error accordingly
        echo 'Failed to delete the item from the cart.';
    }

    mysqli_close($conn); // Close the database connection
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
                    <button type="submit" class="btn btn-primary" name="deleteItemButton">Delete</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="checkout.php" class="btn btn-primary m-4">Bestellen</a>
    <?php include './components/footer.php'; ?>
</body>

</html>