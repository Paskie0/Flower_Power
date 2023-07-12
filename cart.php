<?php
include_once './functions/initialize.php';
include_once './functions/get-cart-items.php';
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
                <button class="delete-button" data-product-id="<?php echo $item['artikel_id']; ?>">Delete</button>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="checkout.php" class="btn btn-primary m-4">Bestellen</a>
    <?php include './components/footer.php'; ?>
    <script>
        // Function to handle the delete button click
        function deleteCartItem(productId) {
            // Make an AJAX request to delete the item from the cart
            var xhr = new XMLHttpRequest();
            xhr.open('POST', './functions/delete-cart-item.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Item deleted successfully, reload the cart page
                        location.reload();
                    } else {
                        // Error occurred, display an alert or handle it accordingly
                        alert('Error deleting item from cart. Please try again.');
                    }
                }
            };
            xhr.send('productId=' + encodeURIComponent(productId));
        }

        // Attach event listeners to the delete buttons
        var deleteButtons = document.getElementsByClassName('delete-button');
        Array.prototype.forEach.call(deleteButtons, function(button) {
            button.addEventListener('click', function() {
                var productId = this.getAttribute('data-product-id');
                deleteCartItem(productId);
            });
        });
    </script>
</body>

</html>