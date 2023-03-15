<?php
session_start();
// Check if user is logged in
if (!isset($_SESSION['name'])) {
	header("Location: login.php");
	exit();
  }
?>

<!DOCTYPE html>

<html>
     <fieldset>
	 <head>
	     <title> Profile </title>
	 
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
                <li> <a style ="color:SlateBlu;" href="Home.php">Logout</a> </li>
                 
		     </ul>  
		     </h2></fieldset>
		 </fieldset><br>
			 
		   <div>
		   
		   
			<fieldset><fieldset>
		    <legend align="center"><h1> PROFILE </h1></legend>
			
			<h3 align="center">
		    
			<?php

// Load the JSON data from the file
$current_data = file_get_contents('Data.json');
$array_data = json_decode($current_data, true);

// Find the user's data from the JSON object
$user_data = null;
foreach($array_data as $data) {
  if($data['name'] === $_SESSION['name']) {
    $user_data = $data;
    break;
  }
}

// Display the user's picture if available
if($user_data && isset($user_data['picture'])) {
  $picture_path = $user_data['picture'];
  echo '<img src="' . $picture_path . '" height="200px" width="250px">';
} ?><br>
			<a align="right" href="Change_Profile_Pic.php"> Change </a> <br><br>
			
			
			
		      Name <span style="color: rgb(255, 255, 255);"> </span>:<?php  echo $_SESSION["name"]?><hr>
	          Email <span style="color: rgb(255, 255, 255);"> </span> : <?php  echo $_SESSION["email"]?> <hr>
		      Gender<span style="color: rgb(255, 255, 255);"> </span>: <?php  echo $_SESSION["gender"]?> <hr>
		      Date of Birth <span style="color: rgb(255, 255, 255);"> </span>: <?php  echo $_SESSION["dob"]?> <hr>

		   
		    <a tyle ="color:SlateBlu;"  href="Editprofile.php"> Edit Profile </a>
			
			</h3>
			</fieldset>
		    </fieldset>
			
		</div>
		
		   <div align="center">
		   
		    <hr>
		   
		   <h4> <span style="color: rgb(140, 140, 140);"> Copyright @  <?php echo date(2017);?> </span> </h4>
		   
		   </div>
		   
	 </body>
	 </fieldset>
</html>