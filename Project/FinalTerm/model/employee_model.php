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
        $status="active";
        $password = $userid . '123';
        $sql= "INSERT INTO users (userid, password,  usertype, status, name, email, contact, adress) 
            VALUES ('{$userid}', '{$password}', '{$usertype}', '{$status}', '{$name}', '{$email}', '{$contact}', '{$adress}')";
        //echo $sql."<br>";
        $result1=mysqli_query($con, $sql);

        
        // Inserting data into Drivers table
        $password = $userid . '123';
        $sql= "INSERT INTO drivers (userid, license_no, commission) 
            VALUES ('{$userid}', '{$license_no}', {$commission})";
        //echo $sql."<br>";
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
        //echo $sql;
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
    // Deleting a  passenger ID method
    function showPassengerList()
    {
        // Connecting to database
        $con = getconnection();
        // Deleteing data from login table
        $sql= "select * from users where usertype='passenger'";
        $result=mysqli_query($con, $sql);
        // Closing database connection
        $con->close();
        if($result)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }
    function deletePassenger($userid)
    {
        // Connecting to database
        $con = getconnection();
        // Deleteing data from login table
        $usertype="passenger";
        $sql= "DELETE FROM users WHERE userid='{$userid}' and usertype='{$usertype}'";
        //echo $sql;
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
    function editPassenger($userid, $name, $email, $contact, $address)
    {
        // Connecting to database
        $con = getconnection();
        // Deleteing data from login table
        $usertype="passenger";
        $sql= "UPDATE users SET name='{$name}', email='{$email}', contact='{$contact}', adress='{$address}' WHERE userid='{$userid}' and usertype='{$usertype}'";
        //echo $sql;
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
    function editDriver($userid, $name, $email, $contact, $address, $license_no, $commission, $account)
    {
        // Connecting to database
        $con = getconnection();
        // Deleteing data from login table
        $usertype="driver";
        $sql= "UPDATE users SET name='{$name}', email='{$email}', contact='{$contact}', adress='{$address}' WHERE userid='{$userid}' and usertype='{$usertype}'";
        //echo $sql;
        $result1=mysqli_query($con, $sql);
        $sql = "UPDATE drivers SET license_no='{$license_no}', commission='{$commission}', account='{$account}'  WHERE userid='{$userid}'";
        // Closing database connection
        $result2=mysqli_query($con, $sql);
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
    function searchPassenger($search)
    {
        // Connecting to database
        $con = getconnection();
        // Deleteing data from login table
        $sql= "select * from users where 
            (upper(userid) like upper('%{$search}%') 
            or upper(contact) like upper('%{$search}%')
            or upper(email) like upper('%{$search}%')
            or upper(name) like upper('%{$search}%')
            or upper(adress) like upper('%{$search}%')
            )and  usertype='passenger'";
        $result=mysqli_query($con, $sql);
        // Closing database connection
        $con->close();
        if($result)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }
    function searchTrip($search)
    {
        // Connecting to database
        $con = getconnection();
        // Deleteing data from login table
        $sql= "select th.th_id, th.trip_id, tp.departure, 
                tp.destination, th.trip_date, th.price, 
                th.driver_id, th.passenger_id, th.status 
                from trips_histories th, trips tp 
                where tp.trip_id = th.trip_id and(
                upper(th.th_id) like upper('%{$search}%')
                or upper(th.trip_id) like upper('%{$search}%')
                or upper(tp.departure) like upper('%{$search}%')
                or upper(tp.destination) like upper('%{$search}%')
                or upper(th.trip_date) like upper('%{$search}%')
                or upper(th.passenger_id) like upper('%{$search}%')
                or upper(th.driver_id) like upper('%{$search}%')
                or upper(th.status) like upper('%{$search}%')
                )";
        //echo $sql;
        $result=mysqli_query($con, $sql);
        // Closing database connection
        $con->close();
        if($result)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }
    function searchDriver($search)
    {
        // Connecting to database
        $con = getconnection();
        // Deleteing data from login table
        $sql= "select 
            us.userid, us.contact, us.email, us.name, us.adress,
            us.usertype, us.status, us.profile_image,
            ds.license_no, ds.commission, ds.account
            from users us, drivers ds where 
            (upper(us.userid) like upper('%{$search}%') 
            or upper(us.contact) like upper('%{$search}%')
            or upper(us.email) like upper('%{$search}%')
            or upper(us.name) like upper('%{$search}%')
            or upper(us.adress) like upper('%{$search}%')
            or upper(ds.license_no) like upper('%{$search}%')
            or upper(ds.commission) like upper('%{$search}%')
            or upper(ds.account) like upper('%{$search}%')
            )and  usertype='driver'
            and us.userid=ds.userid";
        //echo $sql;
        $result=mysqli_query($con, $sql);
        // Closing database connection
        $con->close();
        if($result)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }
    function driverExists($driverid)
    {
        // Connecting to database
        $con = getconnection();
        // Deleteing data from login table
        $sql= "select * from users where  usertype='driver' and userid='{$driverid}'";
        //echo $sql;
        $result=mysqli_query($con, $sql);
        // Closing database connection
        $con->close();
        if($result)
        {
            if($result->num_rows==1)
            {
                return true;
            }
            else
            {
                false;
            }
        }
        else
        {
            return false;
        }
    }
    function change_trip_driver($driverid, $trip_id)
    {
        // Connecting to database
        $con = getconnection();
        // Deleteing data from login table
        $sql= "UPDATE trips_histories SET driver_id = '{$driverid}' WHERE th_id='{$trip_id}'";
        //echo $sql;
        //echo $sql;
        $result=mysqli_query($con, $sql);
        // Closing database connection
        $con->close();
        if($result)
        {
            true;
        }
        else
        {
            return false;
        }
    }

?>