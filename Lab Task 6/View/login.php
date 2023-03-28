<?php
    //checking cookie
    $requestMessage="";
    session_start();
    if(isset($_COOKIE['status']))
    {
        header("location: homepage.php?err=already_loggedin");
    }
    //checking sessoin
    else if(isset($_SESSION['status']))
    {
        echo "hi";
        header("location: homepage.php?err=already_loggedin");
    }
    //declaring variables for all input data
    $userid=$password="";
    //declaring variables for all input error
    $useridErr=$passwordErr="";
    //checking if request method is post
    if(isset($_GET['err']))
    {
        if($_GET['err'] == 'invalid')
        {
            if(isset($_SESSION['userid']))
            {
                $userid=$_SESSION['userid'];
            }
            if(isset($_SESSION['password']))
            {
                $password=$_SESSION['password'];
            }
            if(isset($_SESSION['useridErr']))
            {
                $useridErr=$_SESSION['useridErr'];
            }
            if(isset($_SESSION['passwordErr']))
            {
                $passwordErr=$_SESSION['passwordErr'];
            }
        }
    }
    else if(isset($_GET['request']))
    {
        if($_GET['request']=="login")
        {
            $requestMessage="Please log in first";
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
        <span style="color: red;"><?php echo $requestMessage;?></span><br>
        <h1>Welcome to VRMS</h1>
        <img src="VRMS.png" alt="" width="100px">
        <table>
            <tr>
                <td style="text-align: left;">VRMS</td>
                <td style="text-align: right;">
                    <a href="homepage.php">Home</a>|
                    <a href="registration.php">Registration</a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <center>
                        <form action="../controller/control_login.php" method="POST">
                            <fieldset>
                                <legend>Login</legend>
                                <table>
                                    <tr>
                                        <td align="left" valign="top">Name: </td>
                                        <td align="left" valign="top">
                                            <input type="text" name="userid" value="<?php echo $userid;?>">
                                            <span style="color: red;">*</span><br>
                                            <span style="color: red;"><?php echo $useridErr;?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">Password: </td>
                                        <td align="left" valign="top">
                                            <input type="password" name="password" value="<?php echo $password;?>">
                                            <span style="color: red;">*</span><br>
                                            <span style="color: red;"><?php echo $passwordErr;?></span>
                                        </td>
                                    </tr>
                                </table>
                                <hr>
                                <input type="checkbox" name="remember">Remember Me <br>
                                <input type="submit" name="submit">
                                <a href="reset_password.php">Forot Password?</a>
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