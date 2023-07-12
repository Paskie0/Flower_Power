<?php
include_once './functions/initialize.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collectie</title>
    <link rel="stylesheet" href="./css/output.css">
    <script src="https://kit.fontawesome.com/d437031e9c.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include './components/header.php'; ?>
    <h1 class="pt-4 text-4xl font-bold text-center">Bedankt voor je bestelling!</h1>
    <div class="divider"></div>
    <button id="createPdfButton" class="btn btn-primary">Create PDF</button>
    <?php include './components/footer.php'; ?>

    <script>
        document.getElementById('createPdfButton').addEventListener('click', function() {
            // Make a request to the server to generate the PDF
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/Flower-Power/functions/generate-pdf.php', true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    // PDF generation completed, do something with the generated PDF
                    var pdfUrl = xhr.responseText;
                    // For example, open the PDF in a new tab
                    window.open(pdfUrl, '_blank');
                }
            };
            xhr.send();
        });
    </script>
</body>

</html>