<!DOCTYPE html>
<html>
<head> <title> CHANGE PASSWORD </title>
  
  <style>

      .error {color: Red;}
     
     
     </style>
   
  </head>
    <body>
      <?php
        $currentPass=$newpass=$rtnewpass="";
        $currentpassErr=$newpassErr=$rtnewpassErr="";

        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            if (empty($_POST["currentPass"]))
            {
                $currentpassErr = "Current password is required!";
            }
            else
            {
                $currentPass = test_input($_POST["currentPass"]);
                if (strcmp($currentPass,"abc@1234"))
                {
                    $currentpassErr= "Incorrent password!";
                }
            }

            if (empty($_POST["newpass"])) 
            {
                $newpassErr = "New password is required!";
            }
            else
            {
                $newpass = test_input($_POST["newpass"]);
                if (!strcmp($newpass,"abc@1234"))
                {
                    $newpassErr = "New Password should not be same as the Current Password!";
                }  
            }
            
            if (empty($_POST["rtnewpass"]))
            {
                $rtnewpassErr = "Retype New Password is required!";
            }
            
            else
            {
                $rtnewpass = test_input($_POST["rtnewpass"]);
                if (strcmp($newpass,$rtnewpass)) 
                {
                    $rtnewpassErr = "Retyped Password must match with the New Password!";
                }
                else
                {
                    $updated = "Pasword upadated successfully";
                }
            }
        }
        
        function test_input($data) 
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data; 
        }
      ?>
        <div>
            <h2> CHANGE PASSWORD </h2>
            <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            

            <label>Current Password:</label> 
            <input type="password" name="currentPass" value="<?php echo $currentPass;?>">
            <span class="error">* <?php echo $currentpassErr;?></span>
            <br/><br/>
            
            
            <label style="color:green">New Password:</label>
            <input type="password" name="newpass" value="<?php echo $newpass;?>">
            <span class="error">* <?php echo $newpassErr;?></span>
            <br/><br/>
            
            
            <label style="color:Red">Retype New Password :</label>
            <input type="password" name="rtnewpass" value="<?php echo $rtnewpass;?>">
            <span class="error">* <?php echo $rtnewpassErr;?></span>
            <br/><br/>
        </div> 
        
        <input type="submit" name=" submit" value="Submit">
        <?php
            if(isset($updated))
            {
                echo $updated;
            }
        ?>
        </form>
    </body>
</html>