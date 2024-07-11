<?php

use LDAP\Result;
//start session
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$usertype="";
//checking usertype
if(isset($_COOKIE['usertype']))
{
    $usertype=$_COOKIE['usertype'];
}
else if(isset($_SESSION['usertype']))
{
    $usertype=$_SESSION['usertype'];
}
if($usertype != "admin")
{
    header("location: ../homepage.php?err=bad_request");
}
$root="../";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="adminstyle.css">
    <title>Document</title>
</head>
<body>
    <?php
    include_once '../header.php';
    ?>
    <div class="all-header-container">
        <div class="admin-header-content">
            <a href="manage_passenger.php" style="border: 2px solid black;">
                <img src="image/passenger-icon.png" alt="">Manage Passenger
            </a>
        </div>
    </div>
    <div class="all-header-container">
        <div class="admin-header-content">
            <a href="manage_driver.php" style="border: 2px solid black;">
                <img src="image/driver-icon.png" alt="">
                Manage Driver 
            </a>
        </div>
    </div>
    <!-- <div class="all-header-container">
        <div class="admin-header-content">
            <a href="" style="border: 2px solid black;">
                <img src="image/employee-icon.jpg" alt=""> Manage Employee
            </a>
        </div>
    </div>
    <div class="all-header-container">
        <div class="admin-header-content">
            <a href="" style="border: 2px solid black;">
                <img src="image/car-logo.png" alt="">Manage Cars
            </a>
        </div>
    </div> -->
    <div class="all-header-container">
        <div class="admin-header-content">
            <a href="" style="border: 2px solid black;">
                <img src="image/trip-icon.png" alt="">Manage Trips 
            </a>
        </div>
    </div>
    <? 
    require_once '../footer.php';
    ?>
</body>
</html>
<script src="admin_script.js"></script>