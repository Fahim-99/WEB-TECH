<?php
    //checking cookie
    //session_start();
    require_once "header.php";
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
    $message="";
    if(isset($_SESSION['message']))
    {
        $message=$_SESSION['message'];
        $_SESSION['message']="";
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
        <span style="color: red;"><?php echo $message;?></span><br>
        <h1>
            
            <?php
                require_once 'user_header.php';
                require_once '../model/user_model.php';
                $result = getProfileDetails($userid);
                if ($result) 
                {
                    // Fetch one and one row
                    while ($row = $result->fetch_assoc()) 
                    {
                    ?>
                    <img src="<?php echo $user_profile_image;?>" alt="<?php echo $user_profile_image;?>" width="200px"><br>
                    <table>
                        <tr>
                            <th align="right">User ID:</th>
                            <td align="left"><?php echo $row['userid'];?></td>
                        </tr>
                        <tr>
                            <th align="right">User type:</th>
                            <td align="left"><?php echo $row['usertype'];?></td>
                        </tr>
                        <tr>
                            <th align="right">Name:</th>
                            <td align="left"><?php echo $row['name'];?></td>
                        </tr>
                        <tr>
                            <th align="right">Email:</th>
                            <td align="left"><?php echo $row['email'];?></td>
                        </tr>
                        <tr>
                            <th align="right">Contact:</th>
                            <td align="left"><?php echo $row['contact'];?></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                Address: <?php echo $row['adress'];?>
                            </td>
                        </tr>
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
        </h1>
    </center>
    <?php require_once 'footer.php'; ?>
</body>
</html>