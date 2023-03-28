<?php

use LDAP\Result;

    require_once 'header.php';
    //checking cookie
    $trip_id="";
    $error="";
    if(isset($_COOKIE['status']))
    {
        //header("location: homepage.php?err=already_loggedin");
        if(isset($_GET['tripid']))
        {
            $trip_id=$_GET['tripid'];
        }
        else
        {
            header("location: ../homepage.php?err=bad_request");
        }
    }
    //checking sessoin
    else if(isset($_SESSION['status']))
    {
        if(isset($_GET['tripid']))
        {
            $trip_id=$_GET['tripid'];
        }
        else
        {
            header("location: ../homepage.php?err=bad_request");
        }
    }
    else
    {
        header("location: login.php?request=login");
    }
    if(isset($_GET['err']))
    {
        $error=$_GET['err'];
        if($error=="wrong_date")
        {
            $error="Please select a valid date.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
        
        <?php 
            //echo "Trip id: ".$trip_id."<br>"; 
            echo '<br><br>';
            require_once '../model/trip_model.php';
            $result=tripDetails($trip_id);
            if ($result) 
            {
                // Fetch one and one row
                while ($row = $result->fetch_assoc()) 
                {
                  ?>
                  <table>
                    <tr>
                        <th align="right">Trip ID:</th>
                        <td align="left"><?php echo $row['trip_id'];?></td>
                    </tr>
                    <tr>
                        <th align="right">Departure:</th>
                        <td align="left"><?php echo $row['departure'];?></td>
                    </tr>
                    <tr>
                        <th align="right">Destination:</th>
                        <td align="left"><?php echo $row['destination'];?></td>
                    </tr>
                    <tr>
                        <th align="right">Price:</th>
                        <td align="left"><?php echo $row['price'];?> taka</td>
                    </tr>
                    <tr>
                        <th align="right">Distance:</th>
                        <td align="left"><?php echo $row['distance'];?>Km</td>
                    </tr>
                  </table>
                  <form action="../controller/control_payment.php" method="post">
                    <?php $_SESSION['trip_id']=$trip_id;?>
                    Select Date: <input type="date" name="trip_date"><br>
                    <span style="color: red;"><?php echo $error;?></span><br>
                    <input type="submit" value="Proceed to Payment">
                  </form>
                  <?php
                }
                mysqli_free_result($result);
              }
              else
              {
                ?>
                <h1>Cant Find Trip ID: <?php echo $trip_id;?></h1>
                <?php
              }
        ?>

    </center>
</body>
</html>