<?php
    //checking cookie
    //session_start();
    require_once "header.php";
    $userid=$_SESSION['userid'];
    if(isset($_COOKIE['status']))
    {
        //header("location: homepage.php?err=already_loggedin");
        //echo "hi";
    }
    //checking sessoin
    else if(isset($_SESSION['status']))
    {
        //echo "hi";
    }
    else
    {
        header("location: ../homepage.php?err=bad_request");
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
                require_once 'user_header.php';
                require_once '../model/trip_model.php';
                $result=getPassengerTripHistory($userid);
                if ($result) 
                {
                    // Fetch one and one row
                    
                    ?>
                    <table border="5px">
                        <tr>
                            <th>Trip History ID</th>
                            <th>Trip ID</th>
                            <th>Departure</th>
                            <th>Destination</th>
                            <th>Trip Date</th>
                            <th>Price</th>
                        </tr>
                        <?php
                        while ($row = $result->fetch_assoc()) 
                        {
                        ?>
                        <tr>
                            <td><?php echo $row['th_id']?></th>
                            <td><?php echo $row['trip_id']?></th>
                            <td><?php echo $row['departure']?></th>
                            <td><?php echo $row['destination']?></th>
                            <td><?php echo $row['trip_date']?></th>
                            <td><?php echo $row['price']?></th>
                        </tr>
                        <?php
                        }
                        ?>

                    </table>
                    <?php
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
    <?php require_once 'footer.php'; ?>
    

</body>
</html>