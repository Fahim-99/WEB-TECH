<?php

use LDAP\Result;

    require_once 'header.php';
    //checking cookie
    $trip_id="";
    $error="";
    $status=true;
    if(isset($_COOKIE['status']))
    {
        $status=true;
    }
    //checking sessoin
    else if(isset($_SESSION['status']))
    {
        $status=true;
    }
    else
    {
        $status=false;
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
    $old_password=$new_password=$new_cpassword="";
    $old_passwordErr=$new_passwordErr=$new_cpasswordErr="";
    //for values
    //session_start();
    if(isset($_SESSION['old_password']))
    {
        $old_password=$_SESSION['old_password'];
    }
    if(isset($_SESSION['new_password']))
    {
        $new_password=$_SESSION['new_password'];
    }
    if(isset($_SESSION['new_cpassword']))
    {
        $new_cpassword=$_SESSION['new_cpassword'];
    }
    //for Errors
    if(isset($_SESSION['old_passwordErr']))
    {
        $old_passwordErr=$_SESSION['old_passwordErr'];
    }
    if(isset($_SESSION['new_passwordErr']))
    {
        $new_passwordErr=$_SESSION['new_passwordErr'];
    }
    if(isset($_SESSION['new_cpasswordErr']))
    {
        $new_cpasswordErr=$_SESSION['new_cpasswordErr'];
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
        <span style="color: red;"><?php echo $error;?></span><br>
        <table>
            <tr>
                <td colspan="2">
                    <center>
                        <form action="../controller/control_change_password.php" method="POST">
                            <fieldset>
                                <legend>Change Password Form</legend>
                                <table>
                                    <!-- For Old Password -->
                                    <tr>
                                        <td align="left" valign="top">Old Password: </td>
                                        <td align="left" valign="top">
                                            <input type="password" name="old_password" value="<?php echo $old_password;?>">
                                            <span style="color: red;">*</span><br>
                                            <span style="color: red;"><?php echo $old_passwordErr;?></span>
                                        </td>
                                    </tr>
                                    <!-- For New Password -->
                                    <tr>
                                        <td align="left" valign="top">New Password: </td>
                                        <td align="left" valign="top">
                                            <input type="password" name="new_password" value="<?php echo $new_password;?>">
                                            <span style="color: red;">*</span><br>
                                            <span style="color: red;"><?php echo $new_passwordErr;?></span>
                                        </td>
                                    </tr>
                                    <!-- For New Confirm Password -->
                                    <tr>
                                        <td align="left" valign="top">New Password again: </td>
                                        <td align="left" valign="top">
                                            <input type="password" name="new_cpassword" value="<?php echo $new_cpassword;?>">
                                            <span style="color: red;">*</span><br>
                                            <span style="color: red;"><?php echo $new_cpasswordErr;?></span>
                                        </td>
                                    </tr>
                                </table>
                                <hr>
                                <button name="submit">Change Password</button>
                            </fieldset>
                        </form>
                    </center>
                </td>
            </tr>
        </table>
        <?php
            require_once 'footer.php';
        ?>
    </center>
</body>
</html>