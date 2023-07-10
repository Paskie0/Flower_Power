<?php
session_start();
$isLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
?>
<?php
include_once 'account-info.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flower Power</title>
    <link rel="stylesheet" href="css/output.css">
    <script src="https://kit.fontawesome.com/d437031e9c.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.edit-btn').click(function() {
                // Get the parent <li> element
                var listItem = $(this).closest('li');

                // Hide the edit button and show the save button
                listItem.find('.edit-btn').hide();
                listItem.find('.save-btn').show();

                // Enable editing of the text content
                listItem.find('p').prop('contenteditable', true).addClass('border border-gray-300');

                // Set focus on the editable element
                listItem.find('p').focus();
            });

            $('.save-btn').click(function() {
                // Get the parent <li> element
                var listItem = $(this).closest('li');

                // Hide the save button and show the edit button
                listItem.find('.save-btn').hide();
                listItem.find('.edit-btn').show();

                // Disable editing of the text content
                listItem.find('p').prop('contenteditable', false).removeClass('border border-gray-300');

                // Get the updated text content
                var updatedContent = listItem.find('p').text().trim();

                // Perform an AJAX request to save the updated content to the database
                // Modify this code to fit your specific database and server-side logic
                $.ajax({
                    url: 'update-klanten.php', // Replace with your PHP file to handle the update
                    method: 'POST',
                    data: {
                        field: listItem.find('h2').text().trim(), // Specify the field being updated
                        value: updatedContent, // Pass the updated content
                    },
                    success: function(response) {
                        // Handle the success response if needed
                        console.log('Data updated successfully!');
                    },
                    error: function(xhr, status, error) {
                        // Handle the error response if needed
                        console.error('Error updating data:', error);
                    }
                });
            });
        });
    </script>
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
            <a href="cart.php" role="button" class="btn btn-ghost flex flex-col">
                <i class="fa-solid fa-cart-shopping fa-xl"></i>
                <span class="hidden md:inline normal-case">Cart</span>
            </a>
        </div>
    </div>
    <h1 class="pt-4 text-4xl font-bold text-center">Account informatie</h1>
    <div class="divider"></div>
    <main class="p-6">
        <ul class="space-y-4">
            <?php echo '<li class="bg-transparent rounded-lg shadow-md p-4">
                <div class="flex items-center justify-between">
                    <div class="flex-grow">
                        <h2 class="text-lg font-semibold">Email</h2>
                        <p class="text-gray-500">' . $email . '</p>
                    </div>
                    <button class="px-4 py-2 bg-blue-500 text-white rounded-lg edit-btn">Edit</button>
                    <button class="px-4 py-2 bg-green-500 text-white rounded-lg hidden save-btn">Save</button>                
                    </div>
            </li>';
            ?>
            <?php echo '<li class="bg-transparent rounded-lg shadow-md p-4">
                <div class="flex items-center justify-between">
                    <div class="flex-grow">
                        <h2 class="text-lg font-semibold">Voornaam</h2>
                        <p class="text-gray-500">' . $firstName . '</p>
                    </div>
                    <button class="px-4 py-2 bg-blue-500 text-white rounded-lg edit-btn">Edit</button>
                    <button class="px-4 py-2 bg-green-500 text-white rounded-lg hidden save-btn">Save</button>                
                    </div>
            </li>';
            ?>
            <?php echo '<li class="bg-transparent rounded-lg shadow-md p-4">
                <div class="flex items-center justify-between">
                    <div class="flex-grow">
                        <h2 class="text-lg font-semibold">Tussenvoegsel</h2>
                        <p class="text-gray-500">' . $infix . '</p>
                    </div>
                    <button class="px-4 py-2 bg-blue-500 text-white rounded-lg edit-btn">Edit</button>
                    <button class="px-4 py-2 bg-green-500 text-white rounded-lg hidden save-btn">Save</button>                
                    </div>
            </li>';
            ?>
            <?php echo '<li class="bg-transparent rounded-lg shadow-md p-4">
                <div class="flex items-center justify-between">
                    <div class="flex-grow">
                        <h2 class="text-lg font-semibold">Achternaam</h2>
                        <p class="text-gray-500">' . $lastName . '</p>
                    </div>
                    <button class="px-4 py-2 bg-blue-500 text-white rounded-lg edit-btn">Edit</button>
                    <button class="px-4 py-2 bg-green-500 text-white rounded-lg hidden save-btn">Save</button>                
                    </div>
            </li>';
            ?>
            <?php echo '<li class="bg-transparent rounded-lg shadow-md p-4">
                <div class="flex items-center justify-between">
                    <div class="flex-grow">
                        <h2 class="text-lg font-semibold">Wachtwoord</h2>
                        <p class="text-gray-500">' . $password . '</p>
                    </div>
                    <button class="px-4 py-2 bg-blue-500 text-white rounded-lg edit-btn">Edit</button>
                    <button class="px-4 py-2 bg-green-500 text-white rounded-lg hidden save-btn">Save</button>                
                    </div>
            </li>';
            ?>
            <?php echo '<li class="bg-transparent rounded-lg shadow-md p-4">
                <div class="flex items-center justify-between">
                    <div class="flex-grow">
                        <h2 class="text-lg font-semibold">Email</h2>
                        <p class="text-gray-500">' . $dateOfBirth . '</p>
                    </div>
                    <button class="px-4 py-2 bg-blue-500 text-white rounded-lg edit-btn">Edit</button>
                    <button class="px-4 py-2 bg-green-500 text-white rounded-lg hidden save-btn">Save</button>                
                    </div>
            </li>';
            ?>
            <?php echo '<li class="bg-transparent rounded-lg shadow-md p-4">
                <div class="flex items-center justify-between">
                    <div class="flex-grow">
                        <h2 class="text-lg font-semibold">Straatnaam</h2>
                        <p class="text-gray-500">' . $street . '</p>
                    </div>
                    <button class="px-4 py-2 bg-blue-500 text-white rounded-lg edit-btn">Edit</button>
                    <button class="px-4 py-2 bg-green-500 text-white rounded-lg hidden save-btn">Save</button>                
                    </div>
            </li>';
            ?>
            <?php echo '<li class="bg-transparent rounded-lg shadow-md p-4">
                <div class="flex items-center justify-between">
                    <div class="flex-grow">
                        <h2 class="text-lg font-semibold">Huisnummer</h2>
                        <p class="text-gray-500">' . $houseNumber . '</p>
                    </div>
                    <button class="px-4 py-2 bg-blue-500 text-white rounded-lg edit-btn">Edit</button>
                    <button class="px-4 py-2 bg-green-500 text-white rounded-lg hidden save-btn">Save</button>                
                    </div>
            </li>';
            ?>
            <?php echo '<li class="bg-transparent rounded-lg shadow-md p-4">
                <div class="flex items-center justify-between">
                    <div class="flex-grow">
                        <h2 class="text-lg font-semibold">Postcode</h2>
                        <p class="text-gray-500">' . $postcode . '</p>
                    </div>
                    <button class="px-4 py-2 bg-blue-500 text-white rounded-lg edit-btn">Edit</button>
                    <button class="px-4 py-2 bg-green-500 text-white rounded-lg hidden save-btn">Save</button>                
                    </div>
            </li>';
            ?>
            <?php echo '<li class="bg-transparent rounded-lg shadow-md p-4">
                <div class="flex items-center justify-between">
                    <div class="flex-grow">
                        <h2 class="text-lg font-semibold">Plaats</h2>
                        <p class="text-gray-500">' . $city . '</p>
                    </div>
                    <button class="px-4 py-2 bg-blue-500 text-white rounded-lg edit-btn">Edit</button>
                    <button class="px-4 py-2 bg-green-500 text-white rounded-lg hidden save-btn">Save</button>                
                    </div>
            </li>';
            ?>
            <?php echo '<li class="bg-transparent rounded-lg shadow-md p-4">
                <div class="flex items-center justify-between">
                    <div class="flex-grow">
                        <h2 class="text-lg font-semibold">Telefoon</h2>
                        <p class="text-gray-500">' . $phone . '</p>
                    </div>
                    <button class="px-4 py-2 bg-blue-500 text-white rounded-lg edit-btn">Edit</button>
                    <button class="px-4 py-2 bg-green-500 text-white rounded-lg hidden save-btn">Save</button>                
                    </div>
            </li>';
            ?>
        </ul>
    </main>
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
    <script src="./js/script.js"></script>
</body>

</html>