<?php
    //checking cookie
    //session_start();
    require_once "header.php";
    $userid=$_SESSION['userid'];
    if(isset($_COOKIE['userid']))
    {
        //header("location: homepage.php?err=already_loggedin");
        //echo "hi";
    }
    //checking sessoin
    else if(isset($_SESSION['userid']))
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
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <center>
            <?php
                require_once 'user_header.php';
                ?>
                <script>
                    document.getElementById("trip-history").style.backgroundColor="white";
                </script>
                <?php
                require_once '../model/trip_model.php';
                $result=getPassengerTripHistory($userid);
                if ($result) 
                {
                    if($result->num_rows==0)
                    {
                        ?>
                        <h1>
                            No result Found
                        </h1>
                        <?php
                    }
                    else
                    {
                        ?>
                        <table border="5px">
                            <tr>
                                <th style="width: 200px;">Trip History ID</th>
                                <th style="width: 200px;">Trip ID</th>
                                <th style="width: 200px;">Departure</th>
                                <th style="width: 200px;">Destination</th>
                                <th style="width: 150px;">Trip Date</th>
                                <th style="width: 150px;">Price</th>
                                <th style="width: 200px;">Driver ID</th>
                                <!-- <th style="width: 100px;">Status</th> -->
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
                                <td><?php echo $row['driver_id']?></th>
                                <!-- <td><?php echo $row['status']?></th> -->
                            </tr>
                            <?php
                            }
                            ?>

                        </table>
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
    <?php require_once 'footer.php'; ?>
    

</body>
</html>