<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $userid="";
        session_start();
        if(isset($_POST['edit-did'])
            && isset($_POST['edit-dname'])
            && isset($_POST['edit-dcontact'])
            && isset($_POST['edit-demail'])
            && isset($_POST['edit-daddress'])
            && isset($_POST['edit-dlicense'])
            && isset($_POST['edit-dcommission'])
            && isset($_POST['edit-daccount'])
        )
        {
            $userid=$_POST['edit-did'];
            $name=$_POST['edit-dname'];
            $contact=$_POST['edit-dcontact'];
            $email=$_POST['edit-demail'];
            $address=$_POST['edit-daddress'];
            $license=$_POST['edit-dlicense'];
            $commission=$_POST['edit-dcommission'];
            $account=$_POST['edit-daccount'];
            include_once '../../model/employee_model.php';
            if($result=editDriver($userid, $name, $email, $contact, $address, $license, $commission, $account))
            {
                echo "<br>". $userid;
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
?>