<?php
    //checking cookie
    $requestMessage="";
    session_start();
    if(isset($_COOKIE['userid']))
    {
        header("location: homepage.php?err=already_loggedin");
    }
    //checking sessoin
    else if(isset($_SESSION['userid']))
    {
        echo "hi";
        header("location: homepage.php?err=already_loggedin");
    }
    //declaring variables for all input data
    $f_userid = $f_email = $f_contact = $f_password = $f_cpassword="";
    //declaring variables for all input error
    $f_useridErr = $f_emailErr = $f_contactErr = $f_passwordErr = $f_cpasswordErr="";
    //checking if request method is post
    if(isset($_GET['err']))
    {
        if($_GET['err'] == 'invalid')
        {
            //userid
            if(isset($_SESSION['f_userid']))
            {
                $f_userid=$_SESSION['f_userid'];
            }
            if(isset($_SESSION['f_useridErr']))
            {
                $f_useridErr=$_SESSION['f_useridErr'];
            }
            //email
            if(isset($_SESSION['f_email']))
            {
                $f_email=$_SESSION['f_email'];
            }
            //Err
            if(isset($_SESSION['f_emailErr']))
            {
                $f_emailErr=$_SESSION['f_emailErr'];
            }
            //contact
            if(isset($_SESSION['f_contact']))
            {
                $f_contact=$_SESSION['f_contact'];
            }
            //Err
            if(isset($_SESSION['f_contactErr']))
            {
                $f_contactErr=$_SESSION['f_contactErr'];
            }
            //password
            if(isset($_SESSION['f_password']))
            {
                $f_password=$_SESSION['f_password'];
            }
            //Err
            if(isset($_SESSION['f_passwordErr']))
            {
                $f_passwordErr=$_SESSION['f_passwordErr'];
            }
            //cpassword
            if(isset($_SESSION['f_cpassword']))
            {
                $f_cpassword=$_SESSION['f_cpassword'];
            }
            //Err
            if(isset($_SESSION['f_cpasswordErr']))
            {
                $f_cpasswordErr=$_SESSION['f_cpasswordErr'];
            }
        }
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
        <span style="color: red;"><?php echo $requestMessage;?></span><br>
        <h1>Welcome to VRMS</h1>
        <img src="VRMS.png" alt="" width="100px">
        <table>
            <tr>
                <td style="text-align: left;">VRMS</td>
                <td style="text-align: right;">
                    <a href="homepage.php">Home</a>|
                    <a href="login.php">Login</a>|
                    <a href="registration.php">Registration</a>
                </td>
            </tr>
            <hr>
            <tr>
                <td colspan="2">
                    <center>
                        <form action="../controller/control_reset_password.php" method="POST">
                            <fieldset>
                                <legend>Reset Password</legend>
                                <table>
                                    <tr>
                                        <td align="left" valign="top">User ID: </td>
                                        <td align="left" valign="top">
                                            <input type="text" name="f_userid" value="<?php echo $f_userid;?>">
                                            <span style="color: red;">*</span><br>
                                            <span style="color: red;"><?php echo $f_useridErr;?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">Email: </td>
                                        <td align="left" valign="top">
                                            <input type="email" name="f_email" value="<?php echo $f_email;?>">
                                            <span style="color: red;">*</span><br>
                                            <span style="color: red;"><?php echo $f_emailErr;?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">Contact: </td>
                                        <td align="left" valign="top">
                                            <input type="text" name="f_contact" value="<?php echo $f_contact;?>">
                                            <span style="color: red;">*</span><br>
                                            <span style="color: red;"><?php echo $f_contactErr;?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">Password: </td>
                                        <td align="left" valign="top">
                                            <input type="password" name="f_password" value="<?php echo $f_password;?>">
                                            <span style="color: red;">*</span><br>
                                            <span style="color: red;"><?php echo $f_passwordErr;?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">Confirm Password: </td>
                                        <td align="left" valign="top">
                                            <input type="password" name="f_cpassword" value="<?php echo $f_cpassword;?>">
                                            <span style="color: red;">*</span><br>
                                            <span style="color: red;"><?php echo $f_cpasswordErr;?></span>
                                        </td>
                                    </tr>
                                </table>
                                <hr>
                                <input type="submit" name="submit">
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