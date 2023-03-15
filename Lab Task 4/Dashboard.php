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
	     <title> DASHBOARD </title>
	   
	 </head>
	     
	 <body>
	 
	    <br>
		   <div> 
		   
		      <p> <h1 style="color: green"> X  <sub style="color:black">Company</sub> </h1> </p>
		 
		   
		       <h3 align= "right">
		 
		 
		        
		       <a style="color:SlateBlu;" href="Home.php">  Logout   </a>  
		       
		 
		  
		   </h3>
		   
		  <hr>
		  
		</div> 
		
		<div>
			<fieldset>
		
		  <legend> <h2> <u> Account </u> </h2></legend> <style="color: rgb(255, 255, 255);"> <h1 align="center" ><h1/>
		   
		    
		   
            <h2>
            <ul>
                <li> <a style ="color:SlateBlu;" href="Dashboard.php">Dashboard </a></li> 
                <li> <a style ="color:SlateBlu;" href= "Profile.php">View Profile</a> </li>
                <li> <a style ="color:SlateBlu;" href="Editprofile.php"> Edit Profile</a> </li>
				<li> <a style ="color:SlateBlu;" href="Change_Profile_Pic.php"> Change Profile Pic </a></li>
                <li> <a style ="color:SlateBlu;" href="Changepass.php">Change Password</a> </li>
                
                 
		     </ul>  
		     </h2>
		   
		  
		   
		     <hr>
	     
		  
		</fieldset>

		<fieldset>

		<legend align="center"><h1  > Welcome  <?php echo $_SESSION["name"]?> <h1/></legend>
			<span> <p> </p> </span>
		</fieldset>
		
		<div/>
		
	    <div align="center">
		
		    <h5> <span style="color: rgb(140, 140, 140);"> Copyright ©  <?php echo date(2017);?> <span/> <h5/>
		   
		 </div>
		   
	 </body>
	 </fieldset>
</html>	 