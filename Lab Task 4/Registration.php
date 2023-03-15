<?php

$message = '';  
$error = '';
$isok = false;
$istrue = false;

// Check if the form is submitted
if (isset($_POST["submit"])) {

    // Validate form inputs
    if (empty($_POST["name"])) {
        $error = "<label class='text-danger'>Enter Name</label>";  
    } elseif (empty($_POST["email"])) {
        $error = "<label class='text-danger'>Enter an e-mail</label>";  
    } elseif (empty($_POST["un"])) {
        $error = "<label class='text-danger'>Enter a username</label>";  
    } elseif (!preg_match("/^[a-zA-Z-_ ]*$/", $_POST["un"])) {
        $error = " User Name can contain alpha numeric characters, period, dash or underscore only!";
    } elseif (empty($_POST["pass"])) {
        $error = "<label class='text-danger'>Enter a password</label>";  
    } elseif (!preg_match('/[\'^£$%&*()}{@#~?><,|=_+¬-]/', $_POST["pass"])) {
        $error = "Password must contain at least 1 special char!" . "<br>";
    } elseif (empty($_POST["Cpass"])) {
        $error = "<label class='text-danger'>Confirm password field cannot be empty</label>";  
    } elseif (empty($_POST["gender"])) {
        $error = "<label class='text-danger'>Gender cannot be empty</label>";  
    }

    // If form inputs are valid, proceed with registration
    if (file_exists('Data.json')) {
        $current_data = file_get_contents('data.json');  
        $array_data = json_decode($current_data, true);  

        // Create a new data array from the form inputs
        $new_data = array(
            'name' => $_POST['name'],
            'Pass' => $_POST['pass'],
            'e-mail' => $_POST["email"],  
            'username' => $_POST["un"],  
            'gender' => $_POST["gender"],  
            'dob' => $_POST["dob"]
        );  
        $array_data[] = $new_data;  

        // Convert the data array to JSON format and save it to a file
        $final_data = json_encode($array_data);  

        if (file_put_contents('Data.json', $final_data) && $istrue) {
            $isok = true;  
        } else {
            $isok = false;
            $error = "Error";
        } 

    } else {
        $isok = false;  
    }

    // If registration is successful, show a success message
    if ($istrue && $isok) {
        $message = "Registration Complete"; 
    }
}

?>

<!DOCTYPE html>  
<html>  
<head>  
    <title>Registration</title>  
</head>  
<body>  
    <br />
    <div> 
        <p><h1 style="color: green">X<sub style="color:black">Company</sub></h1></p> 
        <h3 align="right">
            <a style="color:SlateBlu;" href="Home.php">Home |</a> 
            <a style="color:SlateBlu;" href="Login.php">Login |</a>  
            <a style="color:SlateBlu;" href="Registration.php">Registration</a> 
        </h3>
        <hr>
    </div>
    <div class="container" style="width:500px;" align="center">  
    <h3 align="center"> 
        <b>Registration</b></h3><br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data"><br> 

        <fieldset> 
            <label>Name :</label>  
            <input type="text" name="name" class="form-control" /><br>  
        </fieldset><br>
        
        <fieldset> 
            <label>E-mail :</label>
            <input type="text" name = "email" class="form-control" /><br />
        </fieldset> <br>
        
        <fieldset>
            <label>User Name :</label>
            <input type="text" name = "un" class="form-control" /><br />
        </fieldset> <br>
                     
        <fieldset> 
            <label>Password :</label>
            <input type="password" name = "pass" class="form-control" /><br />
        </fieldset> <br>
        
        <fieldset> 
            <label>Confirm Password :</label>
            <input type="password" name = "Cpass" class="form-control" /><br />
        </fieldset> <br>
        
        <fieldset>
            <legend>Gender</legend>
            <input type="radio" id="male" name="gender" value="male">
            <label for="male">Male</label>                     
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">Female</label>
            <input type="radio" id="other" name="gender" value="other">
            <label for="other">Other</label><br>
        </fieldset>
        
        <fieldset> 
            <legend>Date of Birth:</legend>
            <input type="date" name="dob"> <br><br>
        </fieldset>
        
        <div>
            <h4 align= "left">
             <hr>
             <input type="submit" name="submit" value="Submit" class="btn btn-info" />
             <input type="reset" name="reset" value="reset" class="btn btn-info"/><br > 
            </div>
        </form> 
        
        <?php  
        if($istrue && $isok)
        {  
            echo $message;  
        } 
        else
        echo $error; 
        ?>
        </div>  
        <br />  
    </body>
    
</html> 