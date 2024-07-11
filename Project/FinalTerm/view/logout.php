<?php
    session_start();
    session_unset();
    session_destroy();
    setcookie('userid', '', time()-3600, '/');
    setcookie('usertype', '', time()-3600, '/');
    setcookie('userimage', '', time()-3600, '/');
    header("location: login.php")
?>