<?php
session_start();
session_destroy();
header("Location: /Flower-Power/index.php");
exit();
