<!DOCTYPE html>
<html>
    <title>Upload Form</title>
    <body>
        <?php
            $target_dir = "Uploads/";
            $target_file = $target_dir . basename($_FILES["Profile Picture"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if(isset($_POST["submit"])) {
                // Allow certain file formats
                if($imageFileType != "jpeg" && $imageFileType != "jpg" && $imageFileType != "png") {
                    echo "Only JPG, JPEG, PNG files are allowed.";
                    $uploadOk = 0;
                }
    
                // Check file size
                if ($_FILES["Profile Picture"]["size"] > 4000000000) {
                    echo "File is too large.";
                    $uploadOk = 0;
                }
                
                if ($uploadOk == 0) {  
                    echo "File was not uploaded.";
                } else { 
                    if (move_uploaded_file($_FILES["Profile Picture"]["tmp_name"], $target_file)) {
                        echo "The file ". htmlspecialchars( basename( $_FILES["Profile Picture"]["name"])). " has been uploaded.";
                    } else {
                        echo  "There was an error uploading your file.";
                    }
                }
            }
        ?>




        <form action="Profile Picture.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="Profile Picture" id="Profile Picture"><br><br>
            <input type="submit" value="Upload Image" name="submit">
        </form>
    </body>
</html>
    

    
    
    