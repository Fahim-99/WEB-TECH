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
<body onload="searchtrip('')">
    <?php
    include_once '../header.php'; 
    include_once 'admin_header.php'; 
    // echo "<h1>".$usertype."</h1>";
    ?>
    <center>
        <br>
        <div id="message"></div>
        Search: <input type="search" onkeyup="searchtrip(this.value)" id="search-box">
        <div id="triplist">
            <!-- User list will be append here -->
        </div>
    </center>
    
    <!-- Modal for chagne Driver -->
    <div class="modal" id="change-driver-modal">
        <center>
            <div class="modal-content">
                <h1>
                    Enter a valid driver ID for trip <span id="trip-id-for-change-driver"></span><hr>
                    <form action="" onsubmit="return false">
                        Driver ID: <input type="text" name="driver-id" id="driver-id">
                        <input type="submit" value="Submit" onsubmit=""><br>
                        <p id="change-driver-id-error"></p>
                    </form>
                    <br>
                    <button onclick="submitChangeDriver()"> Confirm </button>
                    <button onclick="cancel_changeDriver()"> No</button>
                </h1>
                
            </div>
        </center>
    </div>
    <!-- Ended Modal for Delete -->

    <?php
        require_once '../footer.php';
    ?>
</body>
</html>
<script src="mng_trip_script.js"></script>