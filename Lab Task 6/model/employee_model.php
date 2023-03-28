<?php
    include 'db.php';
    // Block a  passenger ID method
    function blockPassenger($userid)
    {
        // Connecting to database
        $con = getconnection();
        // Inserting data into login table
        $usertype="passenger";
        $sql= "UPDATE users SET status='blocked' WHERE userid='{$userid}' and usertype='{$usertype}'";
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
    // Unblock a  passenger ID method
    function unblockPassenger($userid)
    {
        // Connecting to database
        $con = getconnection();
        // Inserting data into login table
        $usertype="passenger";
        $sql= "UPDATE users SET status='active' WHERE userid='{$userid}' and usertype='{$usertype}'";
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
    // Add Driver ID method
    function addDriver($name, $email, $contact, $adress, $userid, $license_no, $commission)
    {
        // Connecting to database
        $con = getconnection();
        // Inserting data into user table
        $usertype="driver";
        $status="inactive";
        $password = $userid . '123';
        $sql= "INSERT INTO users (userid, password,  usertype, status, name, email, contact, adress) 
            VALUES ('{$userid}', '{$password}', '{$usertype}', '{$status}', '{$name}', '{$email}', '{$contact}', '{$adress}')";
        $result1=mysqli_query($con, $sql);
        
        // Inserting data into Drivers table
        $password = $userid . '123';
        $sql= "INSERT INTO drivers (userid, license_no, commission) 
            VALUES ('{$userid}', '{$license_no}', {$commission})";
        $result2=mysqli_query($con, $sql);
        
        // Closing database connection
        $con->close();
		if($result1 && $result2)
        {
			return true;
		}
        else
        {
			return false;
		}
    }
    
    // Block a  Driver ID method
    function blockDriver($userid)
    {
        // Connecting to database
        $con = getconnection();
        // Inserting data into login table
        $usertype="driver";
        $sql= "UPDATE users SET status='blocked' WHERE userid='{$userid}' and usertype='{$usertype}'";
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
    // Unblock a Driver  ID method
    function unblockDriver($userid)
    {
        // Connecting to database
        $con = getconnection();
        // Inserting data into login table
        $usertype="driver";
        $sql= "UPDATE users SET status='active' WHERE userid='{$userid}' and usertype='{$usertype}'";
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
    // Adding a car method
    function addCar($type, $brand, $model)
    {
        // Connecting to database
        $con = getconnection();
        // Inserting data into login table
        $sql= "INSERT INTO vehicles(type, brand, model) VALUES('{$type}', '{$brand}', '{$model}')";
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
    function requestTrip($userid, $departure, $destination)
    {
        // Connecting to database
        $con = getconnection();
        // Inserting data into login table
        $sql= "INSERT INTO trips (passenger_id, departure, destination) VALUES('{$userid}', '{$departure}', '{$destination}')";
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

?>