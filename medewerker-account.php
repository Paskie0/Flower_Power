<?php
include_once './functions/initialize.php';
include_once './functions/medewerker-info.php';
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
                    url: './functions/update-medewerkers.php', // Replace with your PHP file to handle the update
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
    <?php include './components/header.php'; ?>
    <h1 class="pt-4 text-4xl font-bold text-center">Medewerker informatie</h1>
    <div class="divider"></div>
    <main class="p-6">
        <ul class="space-y-4">
            <?php echo '<li class="bg-transparent rounded-lg shadow-md p-4">
                <div class="flex items-center justify-between">
                    <div class="flex-grow">
                        <h2 class="hidden">medewerker_email</h2>
                        <h3 class="text-lg font-semibold">Email</h3>
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
                        <h2 class="hidden">medewerker_voornaam</h2>
                        <h3 class="text-lg font-semibold">Voornaam</h3>
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
                    <h2 class="hidden">medewerker_tussenvoegsel</h2>
                    <h3 class="text-lg font-semibold">Tussenvoegsel</h3>
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
                    <h2 class="hidden">medewerker_achternaam</h2>
                    <h3 class="text-lg font-semibold">Achternaam</h3>
                        <p class="text-gray-500">' . $lastName . '</p>
                    </div>
                    <button class="px-4 py-2 bg-blue-500 text-white rounded-lg edit-btn">Edit</button>
                    <button class="px-4 py-2 bg-green-500 text-white rounded-lg hidden save-btn">Save</button>                
                    </div>
            </li>';
            ?>
        </ul>
    </main>
    <?php include './components/footer.php'; ?>
</body>

</html>