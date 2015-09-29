<?php
session_start();

if (!isset($_SESSION['USERID'])) {
  header("Location: index.php");
  exit;
}

