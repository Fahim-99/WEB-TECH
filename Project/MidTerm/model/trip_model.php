<?php
    require_once 'db.php';
    function tripDetails($trip_id)
    {
        $conn = getconnection();
        $sql = "select * from trips where trip_id='{$trip_id}'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        // Closing database connection
        $conn->close();
    
        if($count == 1)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }
    function pay_and_add_trip($trip_id, $userid, $date, $price)
    {
        $conn = getconnection();
        $sql = "insert into trips_histories(trip_id, passenger_id, trip_date, price) values('{$trip_id}', '{$userid}', '{$date}', '{$price}') ";
        $result = mysqli_query($conn, $sql);
        // Closing database connection
        $conn->close();
        return $result;
    }
    function getPassengerTripHistory($userid)
    {
        $conn = getconnection();
        $sql = "select th.th_id, th.trip_id, tp.departure, tp.destination, th.trip_date, th.price from trips_histories th, trips tp 
            where th.passenger_id='{$userid}' AND tp.trip_id = th.trip_id";

        $result = mysqli_query($conn, $sql);
        // Closing database connection
        $conn->close();
        return $result;
    }
?>