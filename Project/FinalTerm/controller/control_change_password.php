<?php 
    require_once "../model/user_model.php";
    session_start();
    $userid=$_SESSION['userid'];
    $userimage=$_SESSION['userimage'];
    $old_password=$new_password=$new_cpassword="";
    $old_passwordErr=$new_passwordErr=$new_cpasswordErr="";
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //Old password validatoin
        if(isset($_POST['old_password']))
        {
            $old_password=test_input($_POST['old_password']);
            if($old_password=="")
            {
                $old_passwordErr="Please enter old password";
            }
        }
        //Password validatoin
        if(isset($_POST['new_password']))
        {
            $new_password=test_input($_POST['new_password']);
            if($new_password=="")
            {
                $new_passwordErr="Please enter User password";
            }
            else if (strlen ($new_password) < 8) 
            {  
                $new_passwordErr = "Password must contain at least 8 digits.";  
            } 
        }
        //Confirm password validation
        if(isset($_POST['new_cpassword']))
        {
            $new_cpassword=test_input($_POST['new_cpassword']);
            if($new_cpassword=="")
            {
                $new_cpasswordErr="Please enter User cpassword";
            }
        }
        if($new_passwordErr=="" && $new_cpasswordErr=="")
        {
            if($new_password != $new_cpassword)
            {
                $new_passwordErr=$new_cpasswordErr="Password does not match.";
            }
        }
        //Inserting database if everything is right
        if($old_passwordErr=="" && $new_passwordErr=="" && $new_cpasswordErr=="")
        {
            if(login($userid, $old_password))
            {
                if(passengerResetPassword($userid, $old_password, $new_cpassword))
                {
                    goto_profile_page();
                }
            }
            else 
            {
                $old_passwordErr="Entered wrong Password";
                //echo $old_passwordErr;
                return_to_change_password_Page();
            }
        }
        else
        {
            return_to_change_password_Page();
            //echo "invalid";
        }
    }
    else
    {
        header("location: ../view/homepage.php?err=bad_request");
    }
    function goto_profile_page()
    {
        $userid = $_SESSION['userid'];
        $userimage = $_SESSION['userimage'];
        session_unset();
        $_SESSION['status']='active';
        $_SESSION['userid']=$userid;
        $_SESSION['userimage']=$userimage;
        $_SESSION['message']="password changed successfully";?>
        <script>
            if(!alert("Password changed successfully"))
            {
                location.replace("../view/profile.php");
            }
        </script>
        <?php
        //header("location: ../view/profile.php");
    }
    function return_to_change_password_Page()
    {
        global $old_password, $new_cpassword, $new_password;
        global $old_passwordErr, $new_cpasswordErr, $new_passwordErr;
        //for values
        $_SESSION['old_password']=$old_password;
        $_SESSION['new_password']=$new_password;
        $_SESSION['new_cpassword']=$new_cpassword;
        //for errors
        $_SESSION['old_passwordErr']=$old_passwordErr;
        $_SESSION['new_passwordErr']=$new_passwordErr;
        $_SESSION['new_cpasswordErr']=$new_cpasswordErr;
        header("location: ../view/change_password.php");
        //echo "see you tomorrow<br>";
        //echo $old_password."<br>";
        //echo $new_password."<br>";
        //echo $new_cpassword."<br>";
        //echo $old_passwordErr."<br>";
        //echo $new_passwordErr."<br>";
        //echo $new_cpasswordErr."<br>";
    }
    //test input function
    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>