<?php
session_start();
$isLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
$isMedewerker = isset($_SESSION['loggedinMedewerker']) && $_SESSION['loggedinMedewerker'] === true;
include_once 'connect.php';
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
    <div class="navbar bg-base-100 border-b border-gray-700 sticky top-0 z-10">
        <div class="navbar-start">
            <div class="dropdown">
                <label tabindex="0" class="btn btn-ghost md:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </label>
                <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li>
                        <a>Collecties</a>
                        <ul class="p-2">
                            <li><a href="catalogue/index.php">Bloemen</a></li>
                            <li><a href="catalogue/index.php">Boeketten</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <a href="index.php" class="btn btn-ghost normal-case text-xl no-animation font-logo">Flower Power</a>
            <label class="btn btn-ghost btn-square swap swap-rotate hidden md:inline-grid">
                <input type="checkbox" id="theme-switcher" />
                <i class="swap-off fa-solid fa-sun fa-xl"></i>
                <i class="swap-on fa-solid fa-moon fa-xl"></i>
            </label>
        </div>
        <div class="navbar-center hidden md:flex">
            <ul class="menu menu-horizontal px-1">
                <li tabindex="0">
                    <details>
                        <summary>Collecties</summary>
                        <ul class="p-2">
                            <li><a href="catalogue/index.php">Bloemen</a></li>
                            <li><a href="catalogue/index.php">Boeketten</a></li>
                        </ul>
                    </details>
                </li>
            </ul>
        </div>
        <div class="navbar-end">
            <a href="contact.php" role="button" class="btn btn-ghost flex flex-col">
                <i class="fa-solid fa-address-card fa-xl"></i>
                <span class="hidden md:inline normal-case">Contact</span>
            </a>
            <div class="dropdown dropdown-end drop-shadow-lg">
                <label tabindex="0" class="btn btn-ghost flex flex-col">
                    <i class="fa-solid fa-user fa-xl"></i>
                    <span class="hidden md:inline normal-case">Account</span>
                </label>
                <div class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box">
                    <?php if ($isLoggedIn || $isMedewerker) : ?>
                        <a href="account.php" role="button" class="btn btn-wide btn-sm mt-2 no-animation">Account</a>
                        <a href="medewerker-account.php" role="button" class="btn btn-wide btn-sm mt-2 no-animation">Medewerker</a>
                        <form action="logout.php" method="post">
                            <button type="submit" class="btn btn-wide btn-sm mt-2 no-animation">Uitloggen</button>
                        </form>
                    <?php else : ?>
                        <form action="login.php" method="post" tabindex="0" id="login" autocomplete="off">
                            <label for="email" class="font-semibold py-1">Email:</label>
                            <input type="email" id="email-login" name="email-login" autocomplete="email" required class="input input-bordered w-full">

                            <label for="password" class="font-semibold py-1">Password:</label>
                            <input type="password" id="password-login" name="password-login" autocomplete="current-password" required class="input input-bordered w-full">

                            <button type="submit" class="btn btn-primary btn-wide btn-sm mt-4 no-animation">Login</button>
                        </form>
                        <form action="register.php" method="post" tabindex="0" id="register" class="hidden">
                            <label for="email-register" class="font-semibold py-4">Email:</label>
                            <input type="email" id="email-register" name="email-register" autocomplete="email" required class="input input-bordered w-full">

                            <label for="password-register" class="font-semibold py-4">Password:</label>
                            <input type="password" id="password-register" name="password-register" autocomplete="new-password" required class="input input-bordered w-full">

                            <label for="first-name" class="font-semibold py-4">First Name:</label>
                            <input type="text" id="first-name" name="first-name" autocomplete="given-name" required class="input input-bordered w-full">

                            <label for="infix" class="font-semibold py-4">Infix:</label>
                            <input type="text" id="infix" name="infix" autocomplete="additional-name" class="input input-bordered w-full">

                            <label for="last-name" class="font-semibold py-4">Last Name:</label>
                            <input type="text" id="last-name" name="last-name" autocomplete="family-name" required class="input input-bordered w-full">

                            <label for="date-of-birth" class="font-semibold py-4">Date of Birth:</label>
                            <input type="date" id="date-of-birth" name="date-of-birth" autocomplete="bday" required class="input input-bordered w-full">

                            <button type="submit" class="btn btn-primary btn-wide btn-sm mt-4 no-animation">Registreren</button>
                        </form>
                        <form action="medewerker-login.php" method="post" tabindex="0" id="medewerker-login" autocomplete="off" class="hidden">
                            <label for="email" class="font-semibold py-1">Email:</label>
                            <input type="email" id="medewerker-email" name="medewerker-email" autocomplete="email" required class="input input-bordered w-full">

                            <label for="password" class="font-semibold py-1">Password:</label>
                            <input type="password" id="medewerker-password" name="medewerker-password" autocomplete="current-password" required class="input input-bordered w-full">

                            <button type="submit" class="btn btn-primary btn-wide btn-sm mt-4 no-animation">Login</button>
                        </form>
                        <button onclick="toggleForms()" id="toggleFormsButton" type="button" class="btn btn-wide btn-sm mt-2 no-animation">Registreren</button>
                        <button onclick="medewerkerForm()" id="medewerkerFormButton" type="button" class="btn btn-wide btn-sm mt-2 no-animation">Medewerker</button>
                    <?php endif; ?>
                </div>
            </div>
            <button class="btn btn-ghost flex flex-col">
                <i class="fa-solid fa-cart-shopping fa-xl"></i>
                <span class="hidden md:inline normal-case">Cart</span>
            </button>
        </div>
    </div>
    <h1 class="pt-4 text-4xl font-bold text-center">Product overzicht</h1>
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
                    <a href="<?php echo "product-overview/" . $productId ?>" class="block bg-gray-800 rounded-lg shadow-md p-4 hover:scale-95 transition-all">
                        <h2 class="text-xl font-semibold"><?php echo $productNaam; ?></h2>
                        <p class="text-gray-600">Price: $<?php echo $productPrijs; ?></p>
                        <p class="text-gray-600"><?php echo $productBeschrijving; ?></p>
                    </a>
                    <div class="buttons">
                        <button class="edit-button" data-product-id="<?php echo $productId; ?>">Edit</button>
                        <button class="save-button hidden" data-product-id="<?php echo $productId; ?>">Save</button>
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

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                // Edit button click event
                $('.edit-button').on('click', function() {
                    var productId = $(this).data('product-id');
                    var productContainer = $(this).closest('.product-item');

                    // Toggle edit and save buttons visibility
                    $(this).addClass('hidden');
                    productContainer.find('.save-button').removeClass('hidden');

                    // Enable editing of product details
                    productContainer.find('h2, p').attr('contenteditable', 'true');
                });

                // Save button click event
                $('.save-button').on('click', function() {
                    var productId = $(this).data('product-id');
                    var productContainer = $(this).closest('.product-item');

                    // Disable editing of product details
                    productContainer.find('h2, p').attr('contenteditable', 'false');

                    // Retrieve updated product details
                    var productName = productContainer.find('h2').text();
                    var productPrice = productContainer.find('p:eq(0)').text().replace('Price: $', '');
                    var productDescription = productContainer.find('p:eq(1)').text();

                    // Send AJAX request to update product details on the server
                    $.ajax({
                        method: 'POST',
                        url: 'update-product.php',
                        data: {
                            productId: productId,
                            productName: productName,
                            productPrice: productPrice,
                            productDescription: productDescription
                        },
                        success: function(response) {
                            // Handle success response, if needed
                            console.log('Product details updated successfully.');
                        },
                        error: function(xhr, status, error) {
                            // Handle error response, if needed
                            console.log('Error updating product details:', error);
                        }
                    });

                    // Toggle save and edit buttons visibility
                    $(this).addClass('hidden');
                    productContainer.find('.edit-button').removeClass('hidden');
                });
            });
        </script>
    </div>
    <footer class="footer items-center p-4 bg-neutral text-neutral-content">
        <div class="items-center grid-flow-col">
            <p>@ 2023 Flower Power - All right reserved</p>
        </div>
        <div class="grid-flow-col gap-4 md:place-self-center md:justify-self-end">
            <a><i class="fa-brands fa-tiktok fa-xl"></i></a>
            <a><i class="fa-brands fa-youtube fa-xl"></i></a>
            <a><i class="fa-brands fa-instagram fa-xl"></i></a>
        </div>
    </footer>
    <script src="./js/scripts.js"></script>
</body>

</html>