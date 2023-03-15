<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    
<br>
		   <div> 
		   
		     <p> <h1 style="color: green">  X  <sub style="color:black">Company </sub> </h1> </p>
		 
		 
		   
		       <h3 align= "right">
		 
		 
               <a style="color:SlateBlu;" href="Home.php">  Home |  </a> 
		       <a style="color:SlateBlu;" href="Login.php">  Login |  </a>  
		       <a style="color:SlateBlu;" href="Registration.php">  Registration </a> 
		 
		  
		   </h3>
		   
		  <hr>
		  
		</div> 

        <?php
	
         // define variables and set to empty values
        $usernameErr = $passwordErr = "" ;
        $username = $password = ""  ; 
		$isuserok=false;
        $ispassok=false;

      if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            if (empty($_POST["username"])) 
		    {
               $usernameErr = "UserName is required!";
            } 
		  
		    else 
		    {
               $username = test_input($_POST["username"]);
		
      
                 if(empty($usernameErr))
                 {
                    $data = file_get_contents("Data.json");  
                    $data = json_decode($data, true);  
                    foreach($data as $row)  
                    {   
                      if($row["username"]==$username)
                      {
                          $isuserok=true;
                          break;
                      } 
                          
                    }  
                 }
            }
			


            if(empty($_POST["password"])) 
		    {
                $passwordErr = "Password is required!";
            } 
			else 
			    {    
		           $password = test_input($_POST["password"]);
				   

                    if(empty($passwordErr))
                    {
                       $data = file_get_contents("Data.json");  
                       $data = json_decode($data, true);  
                       foreach($data as $row)  
                       {   
                         if($row["Pass"]==$password)
                         {
                             $ispassok=true;
                             break;
                         } 
                             
                       }  
                    }
			    }
          
          if(!empty($_POST["Remember me"]))
          {
            if(empty($passwordErr) && empty($usernameErr))
            {

             
          $cookie_user = $username;
           $cookie_pass = $password;
           setcookie($cookie_user, $cookie_pass, time() + (86400 * 30), "/"); 

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
	       <br>
	       
	       <fieldset>

          <legend > <h2> LOGIN </h2> </legend>
		  
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
		  
		  
		     <b> <label for="username"> UserName : </label> </b>
			   <input type="text" name="username" value="<?php echo $username;?>">
			   <span class="error"> * <?php echo $usernameErr; ?> </span>
               <br><br>
			  
			    <b> <label for="password"> Password : </label> </b>
                <input type="password" name="password" value="<?php echo $password;?>">
                <span class="error"> * <?php echo $passwordErr;?></span>
                <br><br>
				
		     <div>
                <hr>
                <input type="checkbox" name="Remember me"> Remember Me <br><br>

                <input type="submit" name="submit" value="Submit"   > 
                
                <a href="Forgetpass.php">Forgot Password?</a><br>

             
                    
             </div>
 		
         </form> <br>
           <?php
            if($ispassok==true && $isuserok==true)
            {
                echo "Login Succsessful <br>";
                 
                $data = file_get_contents("Data.json");  
                    $data = json_decode($data, true);  
                    foreach($data as $row)  
                    {   
                      if($row["username"]==$username)
                      {
                       
                        $_SESSION["Pass"]=$row["Pass"];
                        $_SESSION["name"]=$row["name"];
                        $_SESSION["email"]=$row["e-mail"];
                        $_SESSION["gender"]=$row["gender"];
                        $_SESSION["dob"]=$row["dob"];
                          break;
                      } 
                          
                    }

               header('location:Dashboard.php');
            }
            else
            {
                $usernameErr= "Incorrect username" ;
                $passwordErr=" Incoorrect Password" ;
            }

           ?>
          <hr>
	      </div>
		   
		   <div align="center">
		   
		   <h4 > <span style="color: rgb(140, 140, 140);"> Copyright ©  <?php echo date(2017);?> </span> </h4>
		   </legend>
		   </div>

         </fieldset>
	 
    </body>
  
</html>