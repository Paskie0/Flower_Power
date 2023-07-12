<?php
include_once '../functions/initialize.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collectie</title>
    <link rel="stylesheet" href="../css/output.css">
    <script src="https://kit.fontawesome.com/d437031e9c.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include '../components/header.php'; ?>
    <h1 class="pt-4 text-4xl font-bold text-center">Producten</h1>
    <div class="divider"></div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
        <?php
        // Assuming you have already established a database connection

        // Query to retrieve products from the database
        $query = "SELECT * FROM artikelen";

        // Execute the query
        $result = mysqli_query($conn, $query);

        // Check if the query was successful
        if ($result && mysqli_num_rows($result) > 0) {
            $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

            foreach ($products as $product) {
                $productId = $product['artikel_id'];
                $productNaam = $product['artikel_naam'];
                $productPrijs = $product['artikel_prijs'];
                $productBeschrijving = $product['artikel_beschrijving'];
        ?>
                <div class="product-item">
                    <div class="block bg-gray-800 rounded-lg shadow-md p-4 hover:scale-95 transition-all cursor-pointer">
                        <h2 class="text-xl font-semibold"><?php echo $productNaam; ?></h2>
                        <p class="text-gray-600">Price: $<?php echo $productPrijs; ?></p>
                        <p class="text-gray-600"><?php echo $productBeschrijving; ?></p>
                        <input type="number" class="quantity-input input input-bordered w-20" value="1" min="1">
                        <button class="add-to-cart-button btn btn-primary btn-sm mt-4 no-animation" data-product-id="<?php echo $productId; ?>">Add to Cart</button>
                    </div>
                </div>
        <?php
            }
        } else {
            // No products found in the database
            echo '<p>No products found.</p>';
        }

        // Free the result set
        mysqli_free_result($result);

        // Close the database connection
        mysqli_close($conn);
        ?>
    </div>
    <?php include '../components/footer.php'; ?>
    <script>
        // JavaScript code for quantity selector and Add to Cart button
        document.addEventListener('DOMContentLoaded', function() {
            var addToCartButtons = document.querySelectorAll('.add-to-cart-button');
            addToCartButtons.forEach(function(addToCartButton) {
                addToCartButton.addEventListener('click', function(event) {
                    event.preventDefault();
                    var quantityInput = event.target.parentNode.querySelector('.quantity-input');
                    var quantity = quantityInput.value;
                    var productId = addToCartButton.dataset.productId;

                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'add_to_cart.php', true);
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                console.log('Product added to cart successfully');
                            } else {
                                console.log('Error adding product to cart');
                            }
                        }
                    };
                    xhr.send('productId=' + encodeURIComponent(productId) + '&quantity=' + encodeURIComponent(quantity));
                });
            });
        });
    </script>
</body>

</html>