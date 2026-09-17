<?php
    require "php_scripts/auth.php";
    require "php_scripts/p_listing_script.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ListingHub - Post Listing</title>
    <link rel="shortcut icon" href="images/general-images/listinghub-favicon.png" type="image/x-icon">
    <!-- CSS LINK -->
    <link rel="stylesheet" href="styles/general.css">
    <link rel="stylesheet" href="styles/animations.css">
    <link rel="stylesheet" href="styles/dashboard.css">
    <link rel="stylesheet" href="styles/profile.css">
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
        <h2>Post Listing</h2>
        <div class="err_box">
            <p><?=$errName?></p>
            <p><?=$errCat?></p>
            <p><?=$errUrl?></p>
            <p><?=$errAbout?></p>
            <p><?=$errImage?></p>
        </div>
        <p><?=$successMsg;?></p>
        <form method="post" enctype="multipart/form-data">
            <div class="name">
                <input type="text" placeholder="Listing Title" name="listing_name" />
                <input type="url" placeholder="Website URL" name="listing_url" />
            </div>
            <div class="phone-email">
                <select id="" name="listing_category">
                    <option value="">--Category--</option>
                    <?php 
                        while($category = mysqli_fetch_assoc($query)):
                    ?>
                    <option value="<?=$category["id"]?>" >
                        <?=ucfirst($category['category_name'])?>
                    </option>
                    <?php endwhile ?>
                </select>
                <input type="text" placeholder="Address" name="listing_address">
            </div>
            <input type="file" placeholder="Upload Image" name="image" >
            
            <textarea name="listing_about" id="" placeholder="About Listing"></textarea>
            <input type="submit" value="Post" class="btn">
        </form>
    </main>
    <script src="../src/dashboard.js"></script>
</body>
</html>
