<?php 
    require_once "../model/user_model.php";
    session_start();
    //declaring variables for all input data
    $f_userid = $f_email = $f_contact = $f_password = $f_cpassword="";
    //declaring variables for all input error
    $f_useridErr = $f_emailErr = $f_contactErr = $f_passwordErr = $f_cpasswordErr="";
    //checking if request method is post
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //userid
        if(isset($_POST['f_userid']))
        {
            $f_userid=test_input($_POST['f_userid']);
            if($f_userid=="")
            {
                $f_useridErr="Please enter user ID";
            }
            else if(userid_exists($f_userid) == false)
            {
                $f_useridErr="User id does not exitst";
            }
        }
        //email
        if(isset($_POST['f_email']))
        {
            $f_email=test_input($_POST['f_email']);
            if($f_email=="")
            {
                $f_emailErr="Please enter Email";
            }
            else if($f_useridErr =="")
            {
                if(is_valid_email($f_userid, $f_email) == false)
                {
                    $f_emailErr="Email doesn't match with user ID.";
                }
            }
        }
        //contact
        if(isset($_POST['f_contact']))
        {
            $f_contact=test_input($_POST['f_contact']);
            if($f_contact=="")
            {
                $f_contactErr="Please enter Contact Number";
            }
            else if($f_useridErr =="")
            {
                if(is_valid_contact($f_userid, $f_contact) == false)
                {
                    $f_contactErr="Contact number doesn't match with user ID.";
                }
            }
        }
        //Password validatoin
        if(isset($_POST['f_password']))
        {
            $f_password=test_input($_POST['f_password']);
            if($f_password=="")
            {
                $f_passwordErr="Please enter User password";
            }
            else if (strlen ($f_password) < 8) 
            {  
                $f_passwordErr = "Password must contain at least 8 digits.";  
            } 
        }
        //Confirm password validation
        if(isset($_POST['f_cpassword']))
        {
            $f_cpassword=test_input($_POST['f_cpassword']);
            if($f_cpassword=="")
            {
                $f_cpasswordErr="Please enter User confirm password";
            }
        }
        if($f_passwordErr=="" && $f_cpasswordErr=="")
        {
            if($f_password != $f_cpassword)
            {
                $f_passwordErr=$f_cpasswordErr="Password does not match.";
            }
        }
        //Inserting database if everything is right
        if($f_useridErr=="" && $f_emailErr=="" && $f_contactErr=="" && $f_passwordErr=="" && $f_cpasswordErr=="")
        {
            forgot_and_reset_password($f_userid, $f_email, $f_contact, $f_password);
            goto_login_page();
        }
        else
        {
            return_to_reset_password_Page();
        }
    }
    else
    {
        header("location: ../view/homepage.php?err=bad_request");
    }
    function goto_login_page()
    {
        session_unset();
        //echo "Password Reseted successfully";
        header("location: ../view/login.php");
    }
    function return_to_reset_password_Page()
    {
        //declaring variables for all input data
        global $f_userid, $f_email, $f_contact, $f_password, $f_cpassword;
        //declaring variables for all input error
        global $f_useridErr, $f_emailErr, $f_contactErr, $f_passwordErr, $f_cpasswordErr;
        //for values
        $_SESSION['f_userid']=$f_userid;
        $_SESSION['f_email']=$f_email;
        $_SESSION['f_contact']=$f_contact;
        $_SESSION['f_password']=$f_password;
        $_SESSION['f_cpassword']=$f_cpassword;
        //for errors
        $_SESSION['f_useridErr']=$f_useridErr;
        $_SESSION['f_emailErr']=$f_emailErr;
        $_SESSION['f_contactErr']=$f_contactErr;
        $_SESSION['f_passwordErr']=$f_passwordErr;
        $_SESSION['f_cpasswordErr']=$f_cpasswordErr;
        header("location: ../view/reset_password.php?err=invalid");
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