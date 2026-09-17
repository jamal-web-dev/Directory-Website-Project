<?php
    require "php_scripts/auth.php";
    require "php_scripts/dashboard_script.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ListingHub - Dashboard</title>
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
        <div class="statistics-container">
            <div class="box">
                <div class="img">
                    <img src="images/Index-Images/business-icon.svg" alt="">
                </div>
                <div class="text">
                    <h2><?=$activeListings;?></h2>
                    <p>Active Listings</p>
                </div>
            </div>
            <div class="box box1">
                <div class="img">
                    <img src="images/Index-Images/web-icon.svg" alt="">
                </div>
                <div class="text">
                    <h2><?=$pendingListings;?></h2>
                    <p>Pending Listings</p>
                </div>
            </div>
            <div class="box box2">
                <div class="img">
                    <img src="images/Index-Images/weddin.svg" alt="">
                </div>
                <div class="text">
                    <h2><?=$totoalListings;?></h2>
                    <p>Total Listings</p>
                </div>
            </div>
            <!-- <div class="box box3">
                <div class="img">
                    <img src="images/Index-Images/weddin.svg" alt="">
                </div>
                <div class="text">
                    <h2>0</h2>
                    <p>Saved Listings</p>
                </div>
            </div> -->
        </div>

        <div class="recent-listings">
            <h4 class="heading">Active Listings</h4>
            <div class="container">
                <?php
                 if(mysqli_num_rows($getActiveListingInfo) > 0) {
                    while($listing = mysqli_fetch_assoc($getActiveListingInfo)) {
                ?>
                <div class="card">
                    <div class="listing-details">
                        <img src="uploads/<?=$listing['listing_image']?>" alt="">
                        <div class="text">
                            <h4><?=ucwords($listing["listing_name"])?></h4>
                            <p><b>Address: </b><?=ucfirst($listing["listing_address"])?></p>
                            <p><b>Category: </b><?=ucfirst($listing["category_name"])?></p>
                        </div>
                    </div>
                    <div class="action">
                        <a href="" class="edit">✍🏻 Edit</a>
                        <a href="" class="delete">🗑️ Delete</a>
                    </div>
                </div>
                <?php }} else{?>
                    <p class="not-l-msg">You have no active listings yet. Add Now!</p>
                <?php };?>
            </div>
        </div>
        <div class="recent-listings">
            <h4 class="heading">Pending Listings</h4>
            <div class="container">
                <?php
                 if(mysqli_num_rows($getPendingListingInfo) > 0) {
                    while($listing = mysqli_fetch_assoc($getPendingListingInfo)) {
                ?>
                <div class="card">
                    <div class="listing-details">
                        <img src="uploads/<?=$listing['listing_image']?>" alt="">
                        <div class="text">
                            <h4><?=ucwords($listing["listing_name"])?></h4>
                            <p><b>Address: </b><?=ucfirst($listing["listing_address"])?></p>
                            <p><b>Category: </b><?=ucfirst($listing["category_name"])?></p>
                        </div>
                    </div>
                    <div class="action">
                        <a href="" class="edit">✍🏻 Edit</a>
                        <a href="" class="delete">🗑️ Delete</a>
                    </div>
                </div>
                <?php }} else{?>
                    <p class="not-l-msg">You have no pending listings yet. Add Now!</p>
                <?php };?>
            </div>
        </div>
    </main>
    <script src="src/dashboard.js"></script>
</body>
</html>
