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
    $luserid=$password="";
    //declaring variables for all input error
    $useridErr=$passwordErr="";
    //checking if request method is post
    if(isset($_GET['err']))
    {
        if($_GET['err'] == 'invalid')
        {
            if(isset($_SESSION['luserid']))
            {
                $luserid=$_SESSION['luserid'];
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
    <link rel="stylesheet" href="style.css">
    <script src="userscript.js"></script>
    
    <title>VRMS Login</title>
</head>
<body>
    <?php
        require_once 'header.php';
    ?>
    <script>
        document.getElementById("login").hidden=true;
    </script>
    <center>
        <span style="color: red;"><?php echo $requestMessage;?></span><br>
        <table>
            <tr>
                <td colspan="2">
                    <center>
                        <form class="login" action="../controller/control_login.php" method="POST" onsubmit="return validateLoginForm();">
                        <!--form action="" method="POST" onsubmit="return validateLoginForm()"-->
                            <fieldset>
                                <legend>Login</legend>
                                <table>
                                    <tr>
                                        <td align="left" valign="top">Name: </td>
                                        <td align="left" valign="top">
                                            <input type="text" name="luserid" id="luserid" value="<?php echo $luserid;?>">
                                            <span style="color: red;">*</span><br>
                                            <div id="useridErr" class="err"><?php echo $useridErr;?></div><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">Password: </td>
                                        <td align="left" valign="top">
                                            <input type="password" name="password" id="password" value="<?php echo $password;?>">
                                            <span style="color: red;">*</span><br>
                                            <div id="passwordErr" class="err"><?php echo $passwordErr;?></div><br>
                                        </td>
                                    </tr> 
                                </table>
                                <hr>
                                <input type="checkbox" name="remember">Remember Me <br>
                                <input type="submit" name="submit">
                                <a href="reset_password.php">Forgot Password?</a>
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