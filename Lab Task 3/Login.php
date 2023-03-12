<!DOCTYPE HTML>  
<html>
  <head> <title> LOGIN Page </title>
    <style>
     .error {color: Red;}
    </style>
    </head>
    <body>  
	
	   

    <?php
	
        $unameErr = $passErr = "" ;
        $uname = $pass = ""  ; 
		

      if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            if (empty($_POST["uname"])) 
		    {
               $unameErr = "UserName is required!";
            } 
		  
		    else 
		    {
               $uname = test_input($_POST["uname"]);
		
                if(!preg_match("/^[a-zA-Z-_ ]*$/",$uname)) 
		        {
                 $unameErr = " User Name can contain alpha numeric characters, period, dash or underscore only";
                }
                
                if(strlen($_REQUEST["uname"]) < 2)   				   
		         {
                   $unameErr = "UserName contains at least two characters";
                 }
            }
			


            if(empty($_POST["pass"])) 
		    {
                $passErr = "Password is required!";
            } 
			else 
			    {    
		           $pass = test_input($_POST["pass"]);
				   
					
                    if(strlen($pass)<= '8')
		            {
                       $passErr = "Password must not be less than 8 char ";
                    }

					
					if(!preg_match('/[\'^£$%&*()}{@#~?><,|=_+¬-]/', $_POST["pass"])) 
					{
                       $passErr .= "Password must contain at least one special char!"."<br>";
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
            <h2> LOGIN </h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
		  
		  
		       <b> <label for="uname"> UserName : </label> </b>
			   <input type="text" name="uname" value="<?php echo $uname;?>">
			   <span class="error"> * <?php echo $unameErr; ?> </span>
               <br><br>
               
               <b> <label for="pass"> Password  : </label> </b>
               <input type="pass" name="pass" value="<?php echo $pass;?>">
               <span class="error"> * <?php echo $passErr;?></span>
               <br><br>

               <div>
               <input type="checkbox" name="Remember me"> Remember Me <br><br>
               <input type="submit" name="submit" value="Submit" echo $Login Successful;> 
               <a href="http://">Forgot Password?</a><br>
               </div>
           
            </form>
        </body>      
</html>