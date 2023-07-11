<?php
if (!$isLoggedIn) {
    header('Location: login.php');
    exit();
}

$userId = $_SESSION['user_id'];

$query = "SELECT a.artikel_naam, a.artikel_prijs
          FROM artikelen AS a
          INNER JOIN winkelwagen AS c ON a.artikel_id = c.artikel_id
          WHERE c.klant_id = '$userId'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $cartItems = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $cartItems = [];
}

mysqli_free_result($result);

mysqli_close($conn);
