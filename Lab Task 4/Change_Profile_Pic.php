<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['name'])) {
  header("Location: login.php");
  exit();
}

// Retrieve user data from JSON file
$userData = json_decode(file_get_contents('Data.json'), true);

foreach ($userData as $user) {
  if ($user['name'] === $_SESSION['name']) {
    $currentProfilePicture = $user['picture'];
    break;
  }
}

// Handle form submission
if (isset($_POST['submit'])) {
  $targetDir = "uploads/";
  $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
  $error = '';

  // Check if image file is a actual image or fake image
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $uploadOk = 0;
    $error = "File is not an image.";
  }

  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
    $uploadOk = 0;
    $error = "File is too large.";
  }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    $uploadOk = 0;
    $error = "Only JPG, JPEG, PNG & GIF files are allowed.";
  }

  // Upload file if all checks pass
  if ($uploadOk) {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
      // Update user profile picture URL in JSON file
      foreach ($userData as &$user) {
        if ($user['name'] === $_SESSION['name']) {
          $user['picture'] = $targetFile;
          break;
        }
      }
      file_put_contents('Data.json', json_encode($userData));
      header("Location: profile.php");
      exit();
    } else {
      $error = "There was an error uploading your file.";
    }
  }
}

?>

<html>
  <head>
   
  </head>
<body>
  <h1>Change Profile Picture</h1>
  <?php if (!empty($error)) { ?>
    <p class="error"><?php echo $error; ?></p>
  <?php } ?>
  <form method="post" enctype="multipart/form-data">
    <p>
      <input type="file" name="fileToUpload" id="fileToUpload">
    </p>
    <p>
      <img src="<?php echo $currentProfilePicture; ?>" height="200px" width="250px">
    </p>
    <p>
      <input type="submit" value="Upload Image" name="submit">
    </p>
  </form>
</body>
</html>