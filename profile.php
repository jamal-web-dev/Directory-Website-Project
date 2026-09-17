<?php
    require "php_scripts/auth.php"
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ListingHub - My Profile</title>
    <link rel="shortcut icon" href="images/general-images/listinghub-favicon.png" type="image/x-icon" />
    <!-- CSS LINK -->
    <link rel="stylesheet" href="styles/general.css" />
    <link rel="stylesheet" href="styles/animations.css" />
    <link rel="stylesheet" href="styles/dashboard.css" />
    <link rel="stylesheet" href="styles/profile.css" />
    <link rel="stylesheet" href="styles/responsiveness/dashboard.css" />
    <!-- GOOGLE FONTS LINK -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet" />
  </head>
  <body>
    <?php include "includes/sidebar.php" ?>
    <div class="sidebar-overlay" aria-hidden="true"></div>
    <main>
      <h2>My Profile</h2>
      <form action="">
        <div class="name">
          <input type="text" placeholder="First Name" />
          <input type="text" placeholder="Last Name">
        </div>
        <div class="phone-email">
          <input type="email" placeholder="email" />
          <input type="tel" placeholder="Phone">
        </div>
        <div class="phone-email">
          <input type="password" placeholder="Password">
        </div>
        <input type="submit" value="Save" class="btn">
      </form>
    </main>
    <script src="src/dashboard.js"></script>
  </body>
</html>
