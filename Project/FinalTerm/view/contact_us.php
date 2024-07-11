<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    require_once 'header.php';
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
        <p>
        <center>
        <table>
            <tr>
                <td>
                    <img src="image/email-logo.jpg" alt=""><br><br>
                </td>
                <td>
                    <h1>
                        Email: <a href="">contact@vrms.com</a><br>
                    </h1>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="image/hotline-logo.png" alt="">
                </td>
                <td>
                    <h1>
                        Hotline: <a href="">554433</a>
                    </h1>
                </td>
            </tr>
        </table>
        <h1 style="color: red;">Don't Feel Hesitate to Contact US</h1>
        </center>

    </p>
    <?php
        require_once 'footer.php';
    ?>
</body>
</html>
