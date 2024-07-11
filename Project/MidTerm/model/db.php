<?php
    // Get connection method
    function getconnection()
    {
        $dbservername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "vrms";
        $conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
        if (!$conn) 
        {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $conn;
    }
    function addHistory($userid, $history_type, $details)
    {
        // Connecting to database
        $con = getconnection();
        // Inserting data into login table
        $sql= "INSERT INTO histories(userid, history_type, details) VALUES('{$userid}', '{$history_type}', '{$details}')";
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