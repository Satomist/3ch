<?php
session_start();

unset($_SESSION['USERID']);

header("Location: /3ch/index.php");

?>

