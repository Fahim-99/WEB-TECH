<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $target_dir = "../view/profile_image/";
    $target_file = "";
    $imageFileType = "";

    $userid="";
    session_start();
    if(isset($_COOKIE['status']))
    {
        $userid=$_COOKIE['userid'];
    }
    else if(isset($_SESSION['status']))
    {
        $userid=$_SESSION['userid'];
    }
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"]) && isset($_FILES['fileToUpload'])) 
    {
        if($_FILES['fileToUpload']['name'] !='')
        {
            //echo $_FILES['fileToUpload'];
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) 
            {
                //echo "File is an image - " . $check["mime"] . ".";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            } 
            else {
                echo "File is not an image.";
            }
        }
        else
        {
            echo "No file is uploaded!";
        }
        
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
    {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }
    else 
    {
        //deleting previous file
        if(file_exists("profile_image/{$userid}.png"))
        {
            $user_profile_image="profile_image/{$userid}.png";
            unlink($user_profile_image);
        }
        else if(file_exists("profile_image/{$userid}.jpg"))
        {
            $user_profile_image="profile_image/{$userid}.jpg";
            unlink($user_profile_image);
        }
        $info = pathinfo($_FILES['fileToUpload']['name']);
        $ext = $info['extension']; // get the extension of the file
        $newname = $userid.".".$ext; 

        $target = $target_dir.$newname;
        
        if (move_uploaded_file( $_FILES['fileToUpload']['tmp_name'], $target)) 
        {
            header('location: ../view/profile.php');
        } 
        else 
        {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
else
{
    header("location: ../view/homepage.php?err=bad_request");
}

?>