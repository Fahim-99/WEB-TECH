<?php
    $name="";
    $errorMessage="";
    
    if(isset($_GET['err']))
    {
        if($_GET['err']=='already_loggedin')
        {
            $errorMessage= "Already Logged In!";
        }
        else if($_GET['err']=='bad_request')
        {
            $errorMessage= "Bad Request!";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VRMS Home Page</title>
</head>
<body>
    <center>
        <span style="color: red;">
            <?php echo $errorMessage ?><br>
        </span>
        <?php require_once 'header.php'; ?>
        
        <?php 
            require_once '../model/user_model.php'; 
            $result = getAvailableTrip();
        ?>
        <table border="3px">
            <tr>
                <th style="width: 100px;">Trip ID</th>
                <th style="width: 100px;">From</th>
                <th style="width: 100px;">To</th>
                <th style="width: 100px;">Distance</th>
                <th style="width: 100px;">Price</th>
            </tr>
            <?php
                if ($result->num_rows > 0) 
                {
                    // output data of each row
                    while($row = $result->fetch_assoc()) 
                    {
                        ?>
                        <tr>
                            <td><?php echo $row["trip_id"]; ?></td>
                            <td><?php echo $row["departure"]; ?></td>
                            <td><?php echo $row["destination"]; ?></td>
                            <td><?php echo $row["distance"]; ?></td>
                            <td><?php echo $row["price"]; ?></td>
                            <td style="width: 100px;">
                                <form action="book.php">
                                    <button name="tripid" value="<?php echo $row["trip_id"];?>">Book</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                } 
                else 
                {
                    echo "0 results";
                }
            ?>
        </table>
        
    </center>
    <?php require_once 'footer.php'; ?>
    
</body>
</html>