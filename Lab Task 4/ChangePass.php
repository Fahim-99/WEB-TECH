<?php
session_start();
// Check if user is logged in
if (!isset($_SESSION['name'])) {
  header("Location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html >
<fieldset>
  <head> <title>CHANGE PASSWORD </title>
     <style>
     .error {color: #FF0000;}
    </style>
   
  </head>
  <body>
  <br> 
		
        <div> 
        
          <p> <h1 style="color: green">  X  <sub style="color:black"> Company </sub> <h1> </p>
      
        
            <h2 align= "right">
      
      
             Logged in as<a style ="color:SlateBlu;"  href= "Profile.php"> <?php  echo $_SESSION["name"]?>| </a>
            <a style="color:SlateBlu;" href="logout.php">  Logout </a>  
            
      
       
        </h2>
        
       <hr>
       
     </div> 
         <fieldset><fieldset>
         
       <legend><h2> <u> Account </u> </h2> <style="color: rgb(255, 255, 255);"> </legend> 
        
         
        
         <h2>
         <ul>
             <li> <a style="color:SlateBlu;" href="Dashboard.php">  Dashboard   </a></li> 
             <li> <a style ="color:SlateBlu;"  href= "profile.php"> View Profile </a> </li>
             <li> <a style ="color:SlateBlu;" href="Editprofile.php"> Edit Profile </a></li>
             <li> <a style ="color:SlateBlu;" href="Change_Profile_Pic.php"> Change Profile Pic </a></li>
             <li> <a style ="color:SlateBlu;" href="Changepass.php">Change Password</a> </li>
             
              
          </ul>  
          </h2></fieldset>
      </fieldset><br>

    <?php
   $currentPassword=$newpassword=$rnewpassword="";
   $cpasswordError=$npasswordError=$rnpasswordError="";
   $update=false;
   if($_SERVER["REQUEST_METHOD"]=="POST")
   {
     if (empty($_POST["currentPassword"]))
	 {
       $cpasswordError = "Current password is required!";
     }
     else
	 {
       $currentPassword = test_input($_POST["currentPassword"]);
       $data = file_get_contents("Data.json");  
       $data = json_decode($data, true);  
     
       foreach($data as $row)  
       { 
           if($row['name']==$_SESSION['name'])
           {
               if($row['Pass']!=$currentPassword)
               {
                $cpasswordError = "Incorrect password";
               }
               break;
           }
       }   
	 }

        if (empty($_POST["newpassword"])) 
		{
          $npasswordError = "New password is required!";
        }
        else 
		{
         $newpassword = test_input($_POST["newpassword"]);

        
		}

           if (empty($_POST["rnewpassword"]))
			{
             $rnpasswordError = "Retype New Password is required!";
            }
           else 
		   {
            $rnewpassword = test_input($_POST["rnewpassword"]);
             if (strcmp($newpassword,$rnewpassword)) 
			 {
                $rnpasswordError = "Retype password and New Password need to be same!";
             }
			 else
			 {
                $data = file_get_contents("Data.json");  
                $data = json_decode($data, true);  
              
                foreach($data as $key => $row)  
            {   
              if($row["name"]==$_SESSION["name"])
              {
                $data[$key]['Pass']=$newpassword;
                $updated=true;
                $newdata=json_encode($data);
                file_put_contents('Data.json', $newdata);
                  break;
                  } 
               }
			 
			 
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
		  <br> <br>
		  <fieldset align="center">
         
          <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> <br>
          	<fieldset>
		  
		  <legend><h2 align="center"> CHANGE PASSWORD  </h2></legend>
		  
		  <p align="center">
		  
	  
          <label>Current Password:</label> 
		  <input type="password" name="currentPassword" value="<?php echo $currentPassword;?>">
          <span class="error">* <?php echo $cpasswordError;?></span>
          <br/><br/>
		  
		  
          <label style="color:green">New Password:</label>
          <input type="password" name="newpassword" value="<?php echo $newpassword;?>">
          <span class="error">* <?php echo $npasswordError;?></span>
          <br/><br/>
		  
		  
          <label style="color:Red">Retype New Password:</label>
          <input type="password" name="rnewpassword" value="<?php echo $rnewpassword;?>">
          <span class="error">* <?php echo $rnpasswordError;?></span>
          
		  
		  <hr> 
		 
         <h4 align = "center"> <input type="submit" name="submit" value="Submit"> </h4>
		  <?php  					 
                     if(isset($updated))  
                     {  
                          echo $updated;  
                     }  
            ?> 
          <br/>
		    
		  </p>
		  </fieldset>
		  </div>
		  
		  <div align="center">
		  
		             <h4> <span style="color: rgb(140, 140, 140);"> Copyright ©  <?php echo date(2017);?> </span> </h4>
		   
		        </div>
				
                 <br>
               </fieldset>
      </form>


      <?php
      echo "Password Update sucsessfully <br>";
      ?>
  </body>
</fieldset>
</html>