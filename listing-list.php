<?php
    require "php_scripts/auth.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ListingHub - My Listings</title>
    <link rel="shortcut icon" href="images/general-images/listinghub-favicon.png" type="image/x-icon">
    <!-- CSS LINK -->
    <link rel="stylesheet" href="styles/general.css">
    <link rel="stylesheet" href="styles/animations.css">
    <link rel="stylesheet" href="styles/dashboard.css">
    <link rel="stylesheet" href="styles/responsiveness/dashboard.css">
    <!-- GOOGLE FONTS LINK -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php include "includes/sidebar.php" ?>
    <div class="sidebar-overlay" aria-hidden="true"></div>
    <main>
        <div class="recent-listings">
            <h4 class="heading">Listings</h4>
            <div class="container">
                <div class="card">
                    <div class="listing-details">
                        <img src="../images/Index-Images/list-1-D-r_BTD7.jpg" alt="">
                        <div class="text">
                            <h4>The Big Bumbble Gym</h4>
                            <p><b>Address:</b> 410 Apex Avenue, California USA</p>
                            <p><b>Category:</b> Fitness</p>
                        </div>
                    </div>
                    <div class="action">
                        <a href="" class="edit">✍🏻 Edit</a>
                        <a href="" class="delete">🗑️ Delete</a>
                    </div>
                </div>
                <div class="card">
                    <div class="listing-details">
                        <img src="../images/Index-Images/list-1-D-r_BTD7.jpg" alt="">
                        <div class="text">
                            <h4>The Big Bumbble Gym</h4>
                            <p><b>Address:</b> 410 Apex Avenue, California USA</p>
                            <p><b>Category:</b> Fitness</p>
                        </div>
                    </div>
                    <div class="action">
                        <a href="" class="edit">✍🏻 Edit</a>
                        <a href="" class="delete">🗑️ Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="src/dashboard.js"></script>
</body>
</html>
