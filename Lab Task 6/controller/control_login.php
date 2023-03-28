<?php
    function gotoLoginPage()
    {
        global $userid, $password, $useridErr, $passwordErr;
        session_start();
        $_SESSION['userid']=$userid;
        $_SESSION['password']=$password;
        $_SESSION['useridErr']=$useridErr;
        $_SESSION['passwordErr']=$passwordErr;
        header("location: ../view/login.php?err=invalid");
    }
    function goto_hompage()
    {
        global $userid;
        session_start();
        $_SESSION['status']=$userid;
        $_SESSION['userid']=$userid;
        if (isset($_POST['remember']))
        {
            setcookie("status", "active", time()+3600, '/');
            setcookie("userid", $userid, time()+3600, '/');
        }
        header("location: ../view/homepage.php");
    }
    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //declaring variables for all input data
    $userid=$password="";
    //declaring variables for all input error
    $useridErr=$passwordErr="";
    //checking if request method is post
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // User ID validatoin
        if(isset($_POST['userid']))
        {
            $userid=test_input($_POST['userid']);
            if($userid=="")
            {
                $useridErr="Please enter User ID";
            }
        }
        // Password validatoin
        if(isset($_POST['password']))
        {
            $password=test_input($_POST['password']);
            if($password=="")
            {
                $passwordErr="Please enter Password";
            }
        }
        if($useridErr=="" && $passwordErr=="")
        {
            include "../model/user_model.php";
            if(login($userid, $password))
            {
                goto_hompage();
            }
            else
            {
                $useridErr=$passwordErr="Invalid User ID or Password";
                gotoLoginPage();
            }
            
        }
        else
        {
            gotoLoginPage();
        }
    }
    else
    {
        header("location: ../view/homepage.php?err=bad_request");
    }

?>