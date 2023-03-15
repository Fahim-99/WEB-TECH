<?php
session_start();
// Check if user is logged in
if (!isset($_SESSION['name'])) {
    header("Location: login.php");
    exit();
  }
?>

<!DOCTYPE HTML>  
<html>
<fieldset>
  <head> <title>  Edit Profile </title>
    <style>
     .error {color: #FF0000;}
    </style>

    </head>
    <body>  
    <br> 
		
        <div> 
        
          <p> <h1 style="color: green">  X  <sub style="color:black"> Company </sub> <h1> </p>
      
        
            <h2 align= "right">
      
      
             Logged in as<a style ="color:SlateBlu;"  href= "profile.php"> <?php  echo $_SESSION["name"]?>| </a>
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
           // define variables and set to empty values
        $nameErr = $emailErr = $genderErr = $date_of_birthErr = "";
        $name = $email = $gender = $date_of_birth = ""; 
		$update=false;

      if ($_SERVER["REQUEST_METHOD"] == "POST") 
       {
             if (empty($_POST["name"])) 
		     {
               $nameErr = "Name is required!";
             } 
		  
		    else 
		    {
               $name = test_input($_POST["name"]);
		
		       // contains minimum word
		    
               // check if name only contains letters and whitespace , period
                if(!preg_match("/^[a-zA-Z-'. ]*$/",$name)) 
		        {
                 $nameErr = "Only letters and white space allowed!";
                }
             

            }
  
            if(empty($_POST["email"])) 
		    {
                $emailErr = "Email is required!";
            } 
		   else 
		   {
               $email = test_input($_POST["email"]);
	  
             // check if e-mail address is well-formed
              if(!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		       {
                  $emailErr = "Invalid email format and must be in anything@example.Com! ";
               }
            }
    
	         if(empty($_POST["gender"])) 
		    {
               $genderErr = "Gender is required!";
            } 
		    else 
		    {
             $gender = test_input($_POST["gender"]);
            }
	      
	
	        if(empty($_POST["date_of_birth"])) 
		    {
                $date_of_birthErr = "Date of birth is required!";
            } 
		    else 
		    {
               $date_of_birth = test_input($_POST["date_of_birth"]); 
            }
           
         if($nameErr!="" && $genderErr!="" && $emailErr!="" && $date_of_birthErr!="")
         {
          
           $update=false;
         }
         else
         {
            
            $data = file_get_contents("Data.json");  // get the contents of the JSON file
            $data = json_decode($data, true);  // decode the JSON data into an array
            
            foreach($data as $key => $row) {   
              if($row["name"] == $_SESSION["name"]) {
                $data[$key]["name"] = $name;
                $data[$key]["email"] = $email;
                $data[$key]["gender"] = $gender;
                $data[$key]["dob"] = $date_of_birth;
                break;
              } 
            }
            
            $newdata = json_encode($data);  // encode the updated array back into JSON
            file_put_contents('Data.json', $newdata);  // replace the previous data with the updated data in the JSON file
            

                $_SESSION["name"]=$name;
                $_SESSION["email"]=$email;
                $_SESSION["gender"]=$gender;
                $_SESSION["dob"]= $date_of_birth;  
           
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

        
	  
	  
          <fieldset>
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
		  <fieldset>
		  
		       <legend align="center"><h1> EDIT PROFILE </h1></legend>
		       <p align="center">
		  
		       <b> <p align="center" <label for="name"> Name : </label> </b> 
			   <input type="text" name="name" value="<?php echo $name;?>"> 
			   <span class="error"> * <?php echo $nameErr; ?> </span> 
               <hr>
			  
			    <b> <p align="center" <label for="email"> Email : </label> </b>
                <input type="text" name="email" value="<?php echo $email;?>">
                <span class="error"> * <?php echo $emailErr;?></span> 
                <hr>

		        <b> <p align="center" <label for="gender"> Gender : </label></b>
                <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female"> Female
                <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male"> Male
                <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other"> Other  
                <span class="error"> * <?php echo $genderErr;?></span> 
                <hr>
		  
	            <b><p align="center" <label for="date_of_birth"> Date Of Birth : </label> </b>
                <input type="date" name="date_of_birth" value="<?php echo $date_of_birth;?>">
		        <span class="error"> * <?php echo $date_of_birthErr;?></span>
                <hr> 
    
 
                 <h3 align="center"><input type="submit" name="submit" value="Submit"> </h3>
				  <hr>

                 </p>
				 
				<div align="center">
		  
		             <h4 > <style="color: rgb(140, 140, 140);"> Copyright ©  <?php echo date(2017);?>  </h4>
		   
		        </div>
				</fieldset>
                </form> <br>

                <?php

                if($update)
               echo "<b > Profile Update Sucsessfully</b> <br>";
                ?>

    </body>
</fieldset>
</html>