<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $dname="";
        session_start();
        if(isset($_POST['dname'])
            && isset($_POST['demail'])
            && isset($_POST['dcontact'])
            && isset($_POST['daddress'])
            && isset($_POST['dlicense'])
            && isset($_POST['dcommission'])
            && isset($_POST['did'])
            )
        {
            $dname=$_POST['dname'];
            $demail=$_POST['demail'];
            $dcontact=$_POST['dcontact'];
            $daddress=$_POST['daddress'];
            $dlicense=$_POST['dlicense'];
            $dcommission=$_POST['dcommission'];
            $did=$_POST['did'];
            include_once '../../model/employee_model.php';
            if($result=addDriver($dname, $demail, $dcontact, $daddress, $did, $dlicense, $dcommission))
            {
                echo 'success';
            }
            else
            {
                echo 'fail';
            }
        }
        else
        {
            echo 'bad-request';
        }
    }
    else
    {
        echo "show something";
    }
?>