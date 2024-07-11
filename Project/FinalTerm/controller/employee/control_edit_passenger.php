<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $userid="";
        session_start();
        if(isset($_POST['edit-pid'])
            && isset($_POST['edit-pname'])
            && isset($_POST['edit-pcontact'])
            && isset($_POST['edit-pemail'])
            && isset($_POST['edit-paddress'])
        )
        {
            $userid=$_POST['edit-pid'];
            $name=$_POST['edit-pname'];
            $contact=$_POST['edit-pcontact'];
            $email=$_POST['edit-pemail'];
            $address=$_POST['edit-paddress'];
            include_once '../../model/employee_model.php';
            if($result=editPassenger($userid, $name, $email, $contact, $address))
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