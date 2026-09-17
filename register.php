<?php require "php_scripts/registration_script.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - ListingHub</title>
  <link rel="shortcut icon" href="images/general-images/listinghub-favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="styles/general.css">
  <link rel="stylesheet" href="styles/login.css">
  <link rel="stylesheet" href="styles/responsiveness/login.css">
      <!-- GOOGLE FONTS LINK -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
  <div class="container">
    <h2>Register Now!</h2>
    <p>Register now to manage your listing</p>
    <!-- <div class="error-container"> -->
      <p class="error"><?=$errName;?></p>
      <p class="error"><?=$errEmail?></p>
      <p class="error"><?=$errPhone;?></p>
      <p class="error"><?=$errPassword?></p>
    <!-- </div> -->
    <p class="registered"><?=$succMsg?></p>

    <form action="" method="post">
      <label for="">First Name</label>
      <input type="text" placeholder="Firstname" name="firstname" required>
      <label for="">Last Name</label>
      <input type="text" placeholder="Lastname" name="lastname"  required>
      <label for="">Your email</label>
      <input type="email" placeholder="Your email" name="email"  required>
      <label for="">Your Phone</label>
      <input type="text" placeholder="09056784567" name="phone"  required>
      <label for="">Password</label>
      <input type="password" placeholder="8+ charaters required" name="password" required>
      <input type="submit" value="Register" class="login-btn">
    </form>
    <p class="signup-link">Already have an account? <a href="login.php">Login</a></p>
    <p><a href="index.php">Go Back to Home</a> </p>
  </div>
</body>
</html>
