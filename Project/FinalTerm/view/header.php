<?php
    $status="";
    $usertype="";
    $userid="";
    $userimage="";
    $user_profile_image="";
    $addBeforeLOC="";
    if(isset($root))
    {
        $addBeforeLOC=$root;
    }
    //start session
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    // Checking status
    if(isset($_COOKIE['userid']))
    {
        $userid=$_COOKIE['userid'];
    }
    else if(isset($_SESSION['userid']))
    {
        $userid=$_SESSION['userid'];
    }
    //checking usertype
    if(isset($_COOKIE['usertype']))
    {
        $usertype=$_COOKIE['usertype'];
    }
    else if(isset($_SESSION['usertype']))
    {
        $usertype=$_SESSION['usertype'];
    }
    //checking userimage
    if(isset($_COOKIE['userimage']))
    {
        $userimage=$_COOKIE['userimage'];
    }
    else if(isset($_SESSION['userimage']))
    {
        $userimage=$_SESSION['userimage'];
    }
    //Loading Profile
    // if(file_exists("{$addBeforeLOC}profile_image/{$userid}.png"))
    // {
    //     $user_profile_image="profile_image/{$userid}.png";
    // }
    // else if(file_exists("{$addBeforeLOC}profile_image/{$userid}.jpg"))
    // {
    //     $user_profile_image="profile_image/{$userid}.jpg";
    // }
    // else
    // {
    //     $user_profile_image="image/user-logo.png";
    //     //$user_profile_image="profile_image/{$userid}.jpg";
    // }
?>
<div class="all-header-container">
    <div class="left-header-container">
        <div class="header-item">
            <img src="<?php echo $addBeforeLOC; ?>image/VRMS.png" alt="" width="20px">
        </div>
        <div class="header-item">
            Welcome to VRMS
        </div>
    </div>
    <div class="right-header-container">
        <div class="header-item" id="homepage">
            <a href="<?php echo $addBeforeLOC; ?>homepage.php">Home</a>
        </div>
        <div class="header-item" id="login">
            <?php
                if($userid=="")
                {
                    ?>
                    <a href="<?php echo $addBeforeLOC; ?>login.php">
                        Login
                    </a>
                    <?php
                }
                else
                {
                    ?>
                    <a href="<?php echo $addBeforeLOC; ?>profile.php">
                        <img src="<?php echo $addBeforeLOC; ?><?php echo "profile_image/".$userimage ?>" width="20px" alt="" style="border-radius: 50%;">
                        <?php echo $userid; ?>
                    </a>
                    <?php
                }
            ?>
        </div>
        <div class="header-item" id="registration">
            <?php
                if($userid=="")
                {
                    ?>
                    <a href="<?php echo $addBeforeLOC; ?>registration.php">Registration</a>
                    <?php
                }
                else
                {
                    ?>
                    <a href="<?php echo $addBeforeLOC; ?>logout.php">
                        <img src="<?php echo $addBeforeLOC; ?>image/logout-logo.png" alt="">
                        logout
                    </a>
                    <?php
                }
            ?>
        </div>
    </div>
</div>
<hr>