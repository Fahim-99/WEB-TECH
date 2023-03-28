<?php
    require_once 'db.php';
    // Add passenger ID method
    function passengerRegistration($name, $email, $contact, $adress, $userid, $password)
    {
        // Connecting to database
        $con = getconnection();
        // Inserting data into login table
        $usertype="passenger";
        $status="active";
        $sql= "INSERT INTO users (userid, password,  usertype, status, name, email, contact, adress) 
            VALUES ('{$userid}', '{$password}', '{$usertype}', '{$status}', '{$name}', '{$email}', '{$contact}', '{$adress}')";
        $result=mysqli_query($con, $sql);
        
        // Closing database connection
        $con->close();
		if($result)
        {
            $history_details="userid: {$userid}, password: {$password}, usertype: {$usertype}, status: {$status}, name: {$name}, email: {$email}, contact: {$contact}, adress: {$adress}\n";
            addHistory($userid, "registration", $history_details);
            //storing to file
            $myfile = fopen("../history_details.txt", "a") or die("Unable to open file!");
            fwrite($myfile, $history_details);
            fclose($myfile);
			return true;
		}
        else
        {
			return false;
		}
    }
    function passengerResetPassword($userid, $old_password, $new_password)
    {
        // Connecting to database
        $con = getconnection();
        // Inserting data into login table
        $sql= "UPDATE users SET password = '{$new_password}' WHERE userid='{$userid}' and password='{$old_password}'";
        echo $sql. "<br>";
        $result=mysqli_query($con, $sql);
        
        // Closing database connection
        $con->close();
		if($result)
        {
			return true;
		}
        else
        {
			return false;
		}
    }
    function forgot_and_reset_password($userid, $email, $contact, $password)
    {
        // Connecting to database
        $con = getconnection();
        // Inserting data into login table
        $sql= "UPDATE users SET password = '{$password}' WHERE 
                userid='{$userid}' and email = '{$email}' and contact = '{$contact}'";
        echo $sql. "<br>";
        $result=mysqli_query($con, $sql);
        
        // Closing database connection
        $con->close();
		if($result)
        {
			return true;
		}
        else
        {
			return false;
		}
    }
    function login($userid, $password)
    {
        $conn = getconnection();
        $sql = "select * from users where userid='{$userid}' and password='{$password}'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        // Closing database connection
        $conn->close();
        if($count == 1)
        {
            return true;
        }else
        {
            return false;
        }
    }
    
    function userid_exists($userid)
    {
        $conn = getconnection();
        $sql = "select * from users where userid='{$userid}'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        // Closing database connection
        $conn->close();
    
        if($count > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    function getAvailableTrip()
    {
        $conn = getconnection();
        $sql = "select * from trips";
        $result = mysqli_query($conn, $sql);
        //$count = mysqli_num_rows($result);
        // Closing database connection
        $conn->close();
        return $result;
    }
    function getProfileDetails($userid)
    {
        $conn = getconnection();
        $sql = "select * from users where userid='{$userid}'";
        $result = mysqli_query($conn, $sql);
        //$count = mysqli_num_rows($result);
        // Closing database connection
        $conn->close();
        return $result;
    }
    function is_valid_email($userid, $email)
    {
        $conn = getconnection();
        $sql = "select * from users where userid='{$userid}' and email='{$email}'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        $conn->close();
        if($count==1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    function is_valid_contact($userid, $contact)
    {
        $conn = getconnection();
        $sql = "select * from users where userid='{$userid}' and contact='{$contact}'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        $conn->close();
        if($count==1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

?>