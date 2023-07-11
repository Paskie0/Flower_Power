<?php
session_start();
session_destroy();
$succesMessage = "Ingelogd!";
echo '<script type="text/javascript">';
echo 'alert("' . $succesMessage . '");';
echo 'history.back()';
echo '</script>';
exit();
