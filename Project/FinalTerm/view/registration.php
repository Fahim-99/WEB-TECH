<?php
    //checking cookie
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
    $rname=$remail=$rcontact=$radress=$ruserid=$rpassword=$rcpassword="";
    //declaring variables for all input error
    $nameErr=$emailErr=$contactErr=$adressErr=$useridErr=$passwordErr=$cpasswordErr="";
    //checking if request method is post
    if(isset($_GET['err']))
    {
        if($_GET['err'] == 'invalid')
        {
            //session_start();
            //input values
            if(isset($_SESSION['rname']))
            {
                $rname=$_SESSION['rname'];
            }
            if(isset($_SESSION['remail']))
            {
                $remail=$_SESSION['remail'];
            }
            if(isset($_SESSION['rcontact']))
            {
                $rcontact=$_SESSION['rcontact'];
            }
            if(isset($_SESSION['radress']))
            {
                $radress=$_SESSION['radress'];
            }
            if(isset($_SESSION['ruserid']))
            {
                $ruserid=$_SESSION['ruserid'];
            }
            if(isset($_SESSION['rpassword']))
            {
                $rpassword=$_SESSION['rpassword'];
            }
            if(isset($_SESSION['rcpassword']))
            {
                $rcpassword=$_SESSION['rcpassword'];
            }
            //Error values
            if(isset($_SESSION['nameErr']))
            {
                $nameErr=$_SESSION['nameErr'];
            }
            if(isset($_SESSION['emailErr']))
            {
                $emailErr=$_SESSION['emailErr'];
            }
            if(isset($_SESSION['contactErr']))
            {
                $contactErr=$_SESSION['contactErr'];
            }
            if(isset($_SESSION['adressErr']))
            {
                $adressErr=$_SESSION['adressErr'];
            }
            if(isset($_SESSION['useridErr']))
            {
                $useridErr=$_SESSION['useridErr'];
            }
            if(isset($_SESSION['passwordErr']))
            {
                $passwordErr=$_SESSION['passwordErr'];
            }
            if(isset($_SESSION['cpasswordErr']))
            {
                $cpasswordErr=$_SESSION['cpasswordErr'];
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
    <script src="userscript.js"></script>
    <title>VRMS Registration</title>
</head>
<body>
    <?php
        require_once 'header.php';
    ?><script>
    document.getElementById("registration").hidden=true;
</script>
    <center>
        <h1>Welcome to VRMS</h1>
        <h2>
        <img src="VRMS.png" alt="" width="100px">
        <form action="../controller/control_registration.php" onsubmit="return validateRegistrationForm()" method="POST">
            <fieldset>
                <legend>Registration</legend>
                <table>
                    <tr>
                        <!-- Name -->
                        <td align="left" valign="top">Name: </td>
                        <td align="left">
                            <input type="text" id="name" name="name" value="<?php echo $rname;?>">
                            <span style="color: white;">*</span><br>
                            <span id="nameErr" style="color: white;"><?php echo $nameErr;?></span>
                        </td>
                    </tr>
                    <tr>
                        <!-- Email -->
                        <td align="left" valign="top">Email: </td>
                        <td align="left" valign="top">
                            <input type="text" id="email" name="email" value="<?php echo $remail;?>">
                            <span style="color: white;">*</span><br>
                            <span  id="emailErr" style="color: white;"><?php echo $emailErr;?></span>
                        </td>
                    </tr>
                    <tr>
                        <!-- contact -->
                        <td align="left" valign="top">contact: </td>
                        <td align="left" valign="top">
                            <input id="contact" type="text" name="contact" value="<?php echo $rcontact;?>">
                            <span style="color: white;">*</span><br>
                            <span id="contactErr" style="color: white;"><?php echo $contactErr;?></span>
                        </td>
                    </tr>
                    <tr>
                        <!-- address -->
                        <td align="left" valign="top">
                            Address:
                        </td>
                        <td align="left" valign="top">
                            <textarea id="address" name="adress" rows="5" cols="30" ><?php echo $radress;?></textarea>
                            <span style="color: white;">
                                *<br>
                                
                            </span>
                            <span id="addressErr">
                                <?php echo $adressErr;?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <!-- userid -->
                        <td align="left" valign="top">Choose User ID: </td>
                        <td align="left">
                            <input type="text" id="userid" name="userid" value="<?php echo $ruserid;?>">
                            <span style="color: white;">*</span><br>
                            <span id="useridErr" style="color: white;"><?php echo $useridErr;?></span>
                        </td>
                    </tr>
                    <tr>
                        <!-- password -->
                        <td align="left" valign="top">Password: </td>
                        <td align="left" valign="top">
                            <input id="password" type="password" name="password" value="<?php echo $rpassword;?>">
                            <span style="color: white;">*</span><br>
                            <span id="passwordErr" style="color: white;"><?php echo $passwordErr;?></span>
                        </td>
                    </tr>
                    <tr>
                        <!-- cpassword -->
                        <td align="left" valign="top">Confirm password: </td>
                        <td align="left" valign="top">
                            <input id="cpassword" type="password" name="cpassword" value="<?php echo $rcpassword;?>">
                            <span style="color: white;">*</span><br>
                            <span id="cpasswordErr" style="color: white;"><?php echo $cpasswordErr;?></span>
                        </td>
                    </tr>
                </table>
                <hr>
                <input type="submit" name="submit">
            </fieldset>
        </form>
    </center>
    </h2>
    <?php require_once 'footer.php'; ?>
</body>
</html>