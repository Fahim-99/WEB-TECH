<?php
    require_once "../model/user_model.php";
    function gotoRegistraionPage()
    {
        global $name,$email,$contact,$adress,$userid,$password,$cpassword;
        global $nameErr,$emailErr,$contactErr,$adressErr,$useridErr,$passwordErr,$cpasswordErr;
        session_start();
        // For values
        $_SESSION['name']=$name;
        $_SESSION['email']=$email;
        $_SESSION['contact']=$contact;
        $_SESSION['adress']=$adress;
        $_SESSION['userid']=$userid;
        $_SESSION['password']=$password;
        $_SESSION['cpassword']=$cpassword;
        // For Error
        $_SESSION['nameErr']=$nameErr;
        $_SESSION['emailErr']=$emailErr;
        $_SESSION['contactErr']=$contactErr;
        $_SESSION['adressErr']=$adressErr;
        $_SESSION['useridErr']=$useridErr;
        $_SESSION['passwordErr']=$passwordErr;
        $_SESSION['cpasswordErr']=$cpasswordErr;
        header("location: ../view/registration.php?err=invalid");
    }
    function goto_loginpage()
    {
        session_start();
        session_unset();
        header("location: ../view/login.php");
    }
    //test input function
    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //declaring variables for all input data
    $name=$email=$contact=$adress=$userid=$password=$cpassword="";
    //declaring variables for all input error
    $nameErr=$emailErr=$contactErr=$adressErr=$useridErr=$passwordErr=$cpasswordErr="";
    //checking if request method is post
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //Name validation
        if(isset($_POST['name']))
        {
            $name=test_input($_POST['name']);
            if($name=="")
            {
                $nameErr="Please enter User Name";
            }
            else if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
            {  
                $nameErr = "Only alphabets and white space are allowed";  
            }  
        }
        //Email validation
        if(isset($_POST['email']))
        {
            $email=test_input($_POST['email']);
            if($email=="")
            {
                $emailErr="Please enter User email";
            }
            else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                $emailErr = "Invalid email format";  
            } 
        }
        //Contact validatoin
        if(isset($_POST['contact']))
        {
            $contact=test_input($_POST['contact']);
            if($contact=="")
            {
                $contactErr="Please enter User contact";
            }
            else if (!preg_match ("/^[0-9]*$/", $contact) ) 
            {  
                $contactErr = "Only numeric value is allowed.";  
            }  
            //check mobile no length should not be less and greator than 11  
            else if (strlen ($contact) != 11) 
            {  
                $contactErr = "Mobile no must contain 11 digits.";  
            } 
        }
        //Adress validation
        if(isset($_POST['adress']))
        {
            $adress=test_input($_POST['adress']);
            if($adress=="")
            {
                $adressErr="Please enter User adress";
            }
            else if (strlen ($adress) < 5) 
            {  
                $adressErr = "Adress must contain at least 5 digits.";  
            } 
        }
        //User ID validation
        if(isset($_POST['userid']))
        {
            $userid=test_input($_POST['userid']);
            if($userid=="")
            {
                $useridErr="Please enter User userid";
            }
            else if (!preg_match("/^[a-z]+[a-z1-9]*$/",$userid)) 
            {
                if(preg_match("/^[1-9]+[a-z1-9]*$/",$userid)) 
                {
                    $useridErr = "User id must start with a alphabat"; 
                }
                else if(preg_match("/^[a-z]+[a-zA-X1-9]*$/",$userid))
                {
                    $useridErr = "Capital alphabets are not allowed"; 
                }
                else
                {
                    $useridErr = "Only small alphabets and number are allowed"; 
                }
            }
            else
            {
                if(userid_exists($userid))
                {
                    $useridErr="This user ID is already exists";
                }

            }  
        }
        //Password validatoin
        if(isset($_POST['password']))
        {
            $password=test_input($_POST['password']);
            if($password=="")
            {
                $passwordErr="Please enter User password";
            }
            else if (strlen ($password) < 8) 
            {  
                $passwordErr = "Password must contain at least 8 digits.";  
            } 
        }
        //Confirm password validation
        if(isset($_POST['cpassword']))
        {
            $cpassword=test_input($_POST['cpassword']);
            if($cpassword=="")
            {
                $cpasswordErr="Please enter User cpassword";
            }
        }
        if($passwordErr=="" && $cpasswordErr=="")
        {
            if($password != $cpassword)
            {
                $cpasswordErr="Password does not match.";
            }
        }
        //Inserting database if everything is right
        if($nameErr=="" && $emailErr=="" && $contactErr=="" && $adressErr=="" && $useridErr=="" && $passwordErr=="" && $cpasswordErr=="")
        {
            if(passengerRegistration($name, $email, $contact, $adress, $userid, $password))
            {
                goto_loginpage();
            }
        }
        else
        {
            gotoRegistraionPage();
            //echo "invalid";
        }
    }
    else
    {
        header("location: ../view/homepage.php?err=bad_request");
    }
?>