<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php
        require_once 'header.php';
    ?>
    <center>
        <img src="VRMS.png" alt="" height="200px"><br>
        <h1>
            A vehicle renting company, <br>
            something, provides car for renting. <br>
            Any types of people can hire car from here. <br>
            If they have driving license, <br>
            they can directly hire car. <br>
            They don’t have, <br>
            then they have to manage <br>
            people who has driving license, <br>
            or they can want driver from this <br>
        </h1>
    </center>
    <?php
        require_once 'footer.php';
    ?>
</body>
</html>
