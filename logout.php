<?php
session_start();

session_destroy();
$_SESSION["loginYes"] = false;
header("Location: index.php"); // Redirect to the homepage or login page

exit();
?>
