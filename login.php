<?php require "php_scripts/login_script.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - ListingHub</title>
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
    <h2>Welcome Back</h2>
    <p>Login to manage your account</p>
    <p class="error"><?=$errMsg;?></p>
    <form action="" method="post">
      <label for="">Your email</label>
      <input type="email" placeholder="Your email" name="email" required >
      <label for="">Password</label>
      <input type="password" placeholder="8+ charaters required" name="password" required>
      <input type="submit" value="Log in" class="login-btn">
    </form>
    <p class="signup-link">Don't have an account? <a href="register.php">Signup</a></p>
    <p><a href="index.php">Go Back to Home</a> </p>
  </div>
</body>
</html>
