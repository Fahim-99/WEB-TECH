<?php
    $status="";
    $userid="";
    $user_profile_image="";
    session_start();
    if(isset($_COOKIE['status']))
    {
        $status=$_COOKIE['status'];
        $userid=$_COOKIE['userid'];
    }
    else if(isset($_SESSION['status']))
    {
        $status=$_SESSION['status'];
        $userid=$_SESSION['userid'];
    }
    if(file_exists("profile_image/{$userid}.png"))
    {
        $user_profile_image="profile_image/{$userid}.png";
    }
    else if(file_exists("profile_image/{$userid}.jpg"))
    {
        $user_profile_image="profile_image/{$userid}.jpg";
    }
    else
    {
        $user_profile_image="user-logo.png";
    }
?>
<center>
    
<h1>Welcome to VRMS</h1>
<img src="VRMS.png" alt="" width="100px">
    <table >
        <tr>
            <td>
                <h2>
                    <a href="homepage.php">Home</a>|
                    <?php
                        if($status=="")
                        {
                            ?>
                            <a href="login.php">
                                Login
                            </a>|
                            <?php
                        }
                        else
                        {
                            ?>
                            <a href="profile.php">
                                <img src="<?php echo $user_profile_image ?>" width="40px" alt="" style="border-radius: 50%;">
                                <?php echo $userid." | "; ?>
                            </a>
                            <?php
                        }
                    ?>
                    <?php
                        if($status=="")
                        {
                            ?>
                            <a href="registration.php">Registration</a>
                            <?php
                        }
                        else
                        {
                            ?>
                            <a href="logout.php">logout</a>
                            <?php
                        }
                    ?>
                </h2>
                
            </td>
        </tr>
    </table>
    <hr>
</center>