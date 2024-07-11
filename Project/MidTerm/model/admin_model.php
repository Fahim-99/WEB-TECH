<?php
    // The Admin has all access that an employee has
    include 'employee.php';
    // Deleting a  passenger ID method
    function deletePassenger($userid)
    {
        // Connecting to database
        $con = getconnection();
        // Deleteing data from login table
        $usertype="passenger";
        $sql= "DELETE FROM users WHERE userid='{$userid}' and usertype='{$usertype}'";
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
    // Deleting a  passenger ID method
    function deleteDriver($userid)
    {
        // Connecting to database
        $con = getconnection();
        // Deleteing data from login table
        $usertype="driver";
        $sql= "DELETE FROM users WHERE userid='{$userid}' and usertype='{$usertype}'";
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
    
    // Add Employee ID method
    function addEmployee($name, $email, $contact, $adress, $userid, $salary)
    {
        // Connecting to database
        $con = getconnection();

        // Inserting data into user table
        $usertype="employee";
        $status="inactive";
        $password = $userid . '123';
        $sql= "INSERT INTO employees (userid, password,  usertype, status, name, email, contact, adress) 
            VALUES ('{$userid}', '{$password}', '{$usertype}', '{$status}', '{$name}', '{$email}', '{$contact}', '{$adress}')";
        $result1=mysqli_query($con, $sql);
        
        // Inserting data into Employees table
        $sql= "INSERT INTO employees (userid) VALUES ('{$userid}')";
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
    
    // Block a  Employee ID method
    function blockEmployee($userid)
    {
        // Connecting to database
        $con = getconnection();
        // Inserting data into login table
        $usertype="employee";
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
    // Unblock a Employee  ID method
    function unblockEmployee($userid)
    {
        // Connecting to database
        $con = getconnection();
        // Inserting data into login table
        $usertype="employee";
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
?>