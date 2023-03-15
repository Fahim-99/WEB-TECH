<?php
session_start();
// Check if user is logged in
if (!isset($_SESSION['name'])) {
    header("Location: login.php");
    exit();
  }
session_destroy();
header("Location: Home.php");
exit();
?>