<?php
    //checking cookie
    //session_start();
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    require_once "header.php";
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
            document.getElementById("change-profile").style.backgroundColor="orange";
        </script>
        <img src="<?php echo 'profile_image/'.$userimage;?>" alt="" width="200px"><br>
        <h1>Previous Profile Picture</h1> <br><br>
        <form action="../controller/control_change_image.php" method="post" enctype="multipart/form-data">
        <h1>Select an image to Change Profile Picture : </h1><br>
        <input type="file" name="fileToUpload" id="fileToUpload"><br>
        <input type="submit" value="Upload Image" name="submit"><br>
        </form>
    </center>
    <?php require_once 'footer.php'; ?>
</body>
</html>