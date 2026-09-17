<?php require_once "php_scripts/dbconnect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ListingHub - Listing Page</title>
    <link rel="shortcut icon" href="images/general-images/listinghub-favicon.png" type="image/x-icon">
     <!-- CSS LINK -->
    <link rel="stylesheet" href="styles/general.css">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/responsiveness/home-resp.css">
    <link rel="stylesheet" href="styles/listing-page.css">
    <link rel="stylesheet" href="styles/animations.css">
    <!-- GOOGLE FONTS LINK -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php include "includes/header.php"; ?>
    <section class="popular-listing-section listing-section">
        <h2>Checkout Our Popular <span>Listings</span></h2>
        <p class="heading-description">Explore Hot & Popular Business Listings</p>
            <?php $resultMsg = "";
            ?>
            <div class="container listing_holder">
            <?php 
                if(!isset($_GET["search"]) || empty($_GET["search"])) {
                 $stmt = " SELECT listings.* , categories.category_name, users.phone FROM listings INNER JOIN categories ON listings.listing_category = categories.id  INNER JOIN users ON users.id = listings.owner_id WHERE listings.status = 'active' ";
                $getListingInfo = mysqli_query($connect, $stmt);
                while($listing = mysqli_fetch_assoc($getListingInfo)) { ?>
            <a href="single-listing.php?listingId=<?=$listing['id']?>"> 
                <article class="listing-card">
                <div class="top-child" style="background-image: linear-gradient(rgba(0,0,0,0.37), rgba(0,0,0,0.67)), url(uploads/<?=$listing['listing_image']?>);">
                    <div class="status-box">
                        <div class="status">
                            <span class="open"><?=ucfirst($listing['status'])?></span>
                            <span class="price">$$$</span>
                            <!-- <span class="featured">Featured</span> -->
                        </div>
                        <div class="fav-icon">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" class="lh-0" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.6 7.6 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z"></path></svg>
                        </div>
                    </div>
                    <div class="info-box">
                        <div class="img">
                            <img src="images/Index-Images/team-1-Dk2b_Pxk.jpg" alt="owner">
                        </div>
                        <div class="text">
                            <h5><?=ucwords($listing['listing_name'])?></h5>
                            <div class="info-detail location">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" class="fs-6 me-1" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"></path><path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"></path></svg>
                                <span><?=ucwords($listing['listing_address'])?></span>
                            </div>
                            <div class="info-detail phone">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" class="mb-0 me-2" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"></path></svg>
                                <span><?=$listing['phone']?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom-child">
                <div class="bus-category">
                        <div class="icon">
                        <svg stroke="currentColor" fill="" stroke-width="0" viewBox="0 0 640 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M96 64c0-17.7 14.3-32 32-32l32 0c17.7 0 32 14.3 32 32l0 160 0 64 0 160c0 17.7-14.3 32-32 32l-32 0c-17.7 0-32-14.3-32-32l0-64-32 0c-17.7 0-32-14.3-32-32l0-64c-17.7 0-32-14.3-32-32s14.3-32 32-32l0-64c0-17.7 14.3-32 32-32l32 0 0-64zm448 0l0 64 32 0c17.7 0 32 14.3 32 32l0 64c17.7 0 32 14.3 32 32s-14.3 32-32 32l0 64c0 17.7-14.3 32-32 32l-32 0 0 64c0 17.7-14.3 32-32 32l-32 0c-17.7 0-32-14.3-32-32l0-160 0-64 0-160c0-17.7 14.3-32 32-32l32 0c17.7 0 32 14.3 32 32zM416 224l0 64-192 0 0-64 192 0z"></path></svg>
                        </div>
                        <h5><?=ucfirst($listing['category_name'])?></h5>
                </div>

                <div class="icon-box">
                        <img src="../images/Index-Images/eye.svg" alt="">
                        <img src="../images/Index-Images/love.svg" alt="">
                        <img src="../images/Index-Images/share.svg" alt="">
                </div>
                </div>
                </article>
            </a>
            <?php }}else {
                $search = $_GET["search"];
                $location = $_GET["location"];
                $stmt = "SELECT listings.* , categories.category_name, users.phone FROM listings INNER JOIN categories ON listings.listing_category = categories.id  INNER JOIN users ON users.id = listings.owner_id WHERE listings.status = 'active' AND (listings.listing_name LIKE '%$search%' OR listings.listing_about LIKE '%$search%' AND  listings.listing_address LIKE '%$location%')";

                $getListingInfo = mysqli_query($connect, $stmt);
                $row = mysqli_num_rows($getListingInfo);
                if($row > 0){
                    $resultMsg = "Results for:  $search in $location";
                }else{
                    $resultMsg = "No results for: $search in $location";
                };
                echo '<p class="result-mesg">'.$resultMsg.'</p>';

                while($listing = mysqli_fetch_assoc($getListingInfo)) { 
            ?>
                <a href="single-listing.php?listingId=<?=$listing['id']?>"> 
                <article class="listing-card">
                    <div class="top-child" style="background-image: linear-gradient(rgba(0,0,0,0.37), rgba(0,0,0,0.67)), url(uploads/<?=$listing['listing_image']?>);">
                        <div class="status-box">
                            <div class="status">
                                <span class="open"><?=ucfirst($listing['status'])?></span>
                                <span class="price">$$$</span>
                                <!-- <span class="featured">Featured</span> -->
                            </div>
                            <div class="fav-icon">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" class="lh-0" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.6 7.6 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z"></path></svg>
                            </div>
                        </div>
                        <div class="info-box">
                            <div class="img">
                                <img src="images/Index-Images/team-1-Dk2b_Pxk.jpg" alt="owner">
                            </div>
                            <div class="text">
                                <h5><?=ucwords($listing['listing_name'])?></h5>
                                <div class="info-detail location">
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" class="fs-6 me-1" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"></path><path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"></path></svg>
                                    <span><?=ucwords($listing['listing_address'])?></span>
                                </div>
                                <div class="info-detail phone">
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" class="mb-0 me-2" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"></path></svg>
                                    <span><?=$listing['phone']?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bottom-child">
                    <div class="bus-category">
                            <div class="icon">
                            <svg stroke="currentColor" fill="" stroke-width="0" viewBox="0 0 640 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M96 64c0-17.7 14.3-32 32-32l32 0c17.7 0 32 14.3 32 32l0 160 0 64 0 160c0 17.7-14.3 32-32 32l-32 0c-17.7 0-32-14.3-32-32l0-64-32 0c-17.7 0-32-14.3-32-32l0-64c-17.7 0-32-14.3-32-32s14.3-32 32-32l0-64c0-17.7 14.3-32 32-32l32 0 0-64zm448 0l0 64 32 0c17.7 0 32 14.3 32 32l0 64c17.7 0 32 14.3 32 32s-14.3 32-32 32l0 64c0 17.7-14.3 32-32 32l-32 0 0 64c0 17.7-14.3 32-32 32l-32 0c-17.7 0-32-14.3-32-32l0-160 0-64 0-160c0-17.7 14.3-32 32-32l32 0c17.7 0 32 14.3 32 32zM416 224l0 64-192 0 0-64 192 0z"></path></svg>
                            </div>
                            <h5><?=ucfirst($listing['category_name'])?></h5>
                    </div>

                    <div class="icon-box">
                            <img src="../images/Index-Images/eye.svg" alt="">
                            <img src="../images/Index-Images/love.svg" alt="">
                            <img src="../images/Index-Images/share.svg" alt="">
                    </div>
                    </div>
                </article>
            </a>
            <?php };};?>
        </div>
        <!-- <button class="more-button">More</button> -->
    </section>

    <section class="subscription-section">
            <div class="container">
                <div class="box-one">
                    <h3>Subscribe Our Newsletter!</h3>
                    <p>Subscribe our marketing platforms for latest updates</p>
                </div>
                <div class="box-two">
                    <div class="input-box">
                        <input type="text" placeholder="Your text here">
                        <button>Subscribe</button>
                    </div>
                </div>
            </div>
    </section>

     <?php include  "includes/footer.php"; ?>
    <script src="src/general.js"></script>
    <script src="src/listing-page.js"></script>
</body>
</html>
