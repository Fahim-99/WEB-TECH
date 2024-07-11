<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $userid="";
        session_start();
        if(isset($_POST['userid']))
        {
            $userid=$_POST['userid'];
            include_once '../../model/employee_model.php';
            if($result=unblockPassenger($userid))
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
?>