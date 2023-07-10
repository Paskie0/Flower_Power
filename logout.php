<?php
session_start(); // Start the session
unset($_SESSION['loggedin']);
unset($_SESSION['user_id']);
unset($_SESSION['username']);
header("Location: index.php");
exit();
