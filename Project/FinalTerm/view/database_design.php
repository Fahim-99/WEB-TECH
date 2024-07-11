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
    <p>
        <center>
            <img src="database_design_img/passenger_table.png" alt="Passenger Table" border="5" width="60%"><br>
            <u><h2 style="color: red;">Passenger Table</h2><br><br></u>
            
            <img src="database_design_img/employee_table.png" alt="Employee Table" border="5" width="60%"><br>
            <u><h2 style="color: red;">Employee Table</h2><br><br></u>

            <img src="database_design_img/driver_table.png" alt="Driver Table" border="5" width="60%"><br>
            <u><h2 style="color: red;">Driver Table</h2><br><br></u>

            <img src="database_design_img/vehicle_table.png" alt="Vehicle Table" border="5" width="60%"><br>
            <u><h2 style="color: red;">Vehicle Table</h2><br><br></u>

            <img src="database_design_img/trip_table.png" alt="Trip Table" border="5" width="60%"><br>
            <u><h2 style="color: red;">Trip Table</h2><br><br></u>

        </center>

    </p>
    <?php
        require_once 'footer.php';
    ?>
</body>
</html>
