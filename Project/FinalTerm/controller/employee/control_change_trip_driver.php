<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $driverid="";
        $tripid="";
        session_start();
        if(isset($_POST['driverid'])
            && isset($_POST['tripid'])
        )
        {
            $driverid=$_POST['driverid'];
            $tripid=$_POST['tripid'];
            include_once '../../model/employee_model.php';
            if(driverExists($driverid))
            {
                change_trip_driver($driverid, $tripid);
                echo 'success';
            }
            else
            {
                echo "The drive id does not exists.";
            }
        }
        else
        {
            echo 'bad-request';
        }
    }
?>