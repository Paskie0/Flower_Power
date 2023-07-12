<?php
include_once './functions/initialize.php';

if (!isset($_SESSION['loggedinMedewerker']) || $_SESSION['loggedinMedewerker'] !== true) {
    // Redirect the user to a login page or show an access denied message
    $succesMessage = "U bent niet ingelogd als medewerker";
    echo '<script type="text/javascript">';
    echo 'alert("' . $succesMessage . '");';
    echo 'history.back()';
    echo '</script>';
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
    <div class="flex items-center justify-center">
        <h1 class="pt-4 text-4xl font-bold">Product overzicht</h1>
        <div class="dropdown dropdown-end drop-shadow-lg ml-4">
            <label tabindex="0" class="btn btn-ghost flex flex-col">
                <i class="fa-solid fa-plus fa-xl"></i>
                <span class="hidden md:inline normal-case">Product toevoegen</span>
            </label>
            <div class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box">
                <form action="./functions/add-product.php" method="post" tabindex="0" id="login" autocomplete="off">

                    <label for="product_naam" class="font-semibold py-1">Product Name:</label>
                    <input type="text" id="product_naam" name="product_naam" required class="input input-bordered w-full"><br>

                    <label for="product_prijs" class="font-semibold py-1">Product Price:</label>
                    <input type="number" id="product_prijs" name="product_prijs" required class="input input-bordered w-full"><br>

                    <label for="product_beschrijving" class="font-semibold py-1">Product Description:</label>
                    <textarea id="product_beschrijving" name="product_beschrijving" required></textarea><br>
                    <button type="submit" class="btn btn-primary btn-wide btn-sm mt-4 no-animation">Toevoegen</button>
                </form>
            </div>
        </div>
    </div>
    <div class="divider"></div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
        <?php

        $query = "SELECT * FROM artikelen";

        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

            foreach ($products as $product) {
                $productId = $product['artikel_id'];
                $productNaam = $product['artikel_naam'];
                $productPrijs = $product['artikel_prijs'];
                $productBeschrijving = $product['artikel_beschrijving'];
        ?>
                <div class="product-item cursor-pointer">
                    <div class="block bg-gray-800 rounded-lg shadow-md p-4 hover:scale-95 transition-all">
                        <h2 class="text-xl font-semibold"><?php echo $productNaam; ?></h2>
                        <p class="text-gray-600">Price: $<?php echo $productPrijs; ?></p>
                        <p class="text-gray-600"><?php echo $productBeschrijving; ?></p>
                    </div>
                    <div class="buttons">
                        <button class="edit-button" data-product-id="<?php echo $productId; ?>">Edit</button>
                        <button class="save-button hidden" data-product-id="<?php echo $productId; ?>">Save</button>
                        <button class="delete-button" data-product-id="<?php echo $productId; ?>">Delete</button>
                    </div>
                </div>
        <?php
            }
        } else {
            echo '<p>No products found.</p>';
        }

        mysqli_free_result($result);

        mysqli_close($conn);
        ?>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.edit-button').on('click', function() {
                    var productId = $(this).data('product-id');
                    var productContainer = $(this).closest('.product-item');

                    $(this).addClass('hidden');
                    productContainer.find('.save-button').removeClass('hidden');

                    productContainer.find('h2, p').attr('contenteditable', 'true');
                });

                $('.save-button').on('click', function() {
                    var productId = $(this).data('product-id');
                    var productContainer = $(this).closest('.product-item');

                    productContainer.find('h2, p').attr('contenteditable', 'false');

                    var productName = productContainer.find('h2').text();
                    var productPrice = productContainer.find('p:eq(0)').text().replace('Price: $', '');
                    var productDescription = productContainer.find('p:eq(1)').text();

                    $.ajax({
                        method: 'POST',
                        url: './functions/update-product.php',
                        data: {
                            productId: productId,
                            productName: productName,
                            productPrice: productPrice,
                            productDescription: productDescription
                        },
                        success: function(response) {
                            console.log('Product details updated successfully.');
                        },
                        error: function(xhr, status, error) {
                            console.log('Error updating product details:', error);
                        }
                    });

                    $(this).addClass('hidden');
                    productContainer.find('.edit-button').removeClass('hidden');
                });
            });
        </script>
    </div>
    <?php include './components/footer.php'; ?>
</body>

</html>