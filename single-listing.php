<?php require_once "php_scripts/dbconnect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Listing Page: Restaurant</title>
    <link rel="shortcut icon" href="images/general-images/listinghub-favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="styles/general.css">
    <link rel="stylesheet" href="styles/single-listing.css">
    <link rel="stylesheet" href="styles/responsiveness/single-lis-res.css">
    <!-- GOOGLE FONTS LINK -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
     <?php include "includes/header.php" ?>
         <?php 
            if(isset($_GET["listingId"]) && !empty($_GET["listingId"])){
                $listingId = (int)$_GET["listingId"];
                $stmt = " SELECT listings.* , categories.category_name, users.phone, users.firstname, users.lastname, users.email FROM listings INNER JOIN categories ON listings.listing_category = categories.id  INNER JOIN users ON users.id = listings.owner_id WHERE listings.id = $listingId";
                $getListingInfo = mysqli_query($connect, $stmt);
                $listing = mysqli_fetch_assoc($getListingInfo);
            }
            
         ?>
        <section class="heading-section" 
            style="background-image: linear-gradient(rgba(0, 0, 0, 0.145), rgba(0, 0, 0, 0.824)), url(uploads/<?=$listing['listing_image']?>);">
            <div class="container">
                <div class="text-child">
                    <div class="img-box">
                        <img src="uploads/<?=$listing['listing_image']?>" alt="">
                    </div>
                    <div class="content-box">
                        <h2 class="bus-name"><?=ucwords($listing['listing_name'])?></h2>
                        <ul>
                            <li class="address"><?=ucfirst($listing['listing_address'])?></li>
                            <li class="rating-star">⭐⭐⭐⭐⭐</li>
                        </ul>
                    </div>
                </div>
                <div class="cta-child">
                    <button>Send Message</button>
                </div>
            </div>


            <div class="bottom-nav">
                <ul>
                    <li>Overview</li>
                    <li>Pricing</li>
                    <li>Product</li>
                    <li>Features</li>
                    <li>Gallary</li>
                    <li>Map</li>
                    <li>Statistics</li>
                </ul>
            </div>
        </section>

        <section class="about-section">
            <div class="container">
                <div class="about-business">
                    <div class="description">
                        <div class="title">
                            <h5>Description</h5>
                            <span class="icon"></span>
                        </div>
                        <div class="content">
                            <?=ucfirst($listing['listing_about'])?>
                        </div>
                    </div>
                    <div class="about-aurtor display-on-mobile" >
                    <div class="aurtor">
                        <img src="../images/Index-Images/single-listing-auto-bg.jpg" alt="">
                        <div class="aurtor-info-box">
                            <img src="../images/Index-Images/team-1-Dk2b_Pxk.jpg" alt="autor" class="autor-img">
                            <span>Added By</span>
                            <h4><?=ucfirst($listing['firstname']) ." " . ucfirst($listing['lastname'])?></h4>
                        </div>
                        <ul>
                            <li>
                                <span>Email</span>
                                <a href="" class="busEmail"><?=$listing['email']?></a>
                            </li>
                            <li>
                                <span>Phone No.</span>
                                <a href="" class="busPhone"><?=$listing['phone']?></a>
                            </li>
                            <li>
                                <span>Website</span>
                                <a href="" class="busWeb"><?=$listing['listing_website']?></a>
                            </li>
                        </ul>
                    </div>
                    </div>
                    <div class="form-container">
                        <form action="">
                            <div class="name-email-box">
                                <input type="text" placeholder="Name">
                                <input type="email" placeholder="Email">
                            </div>
                            <div class="message-box">
                                <textarea placeholder="Write Message" rows="4"></textarea>
                                <button>Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="about-aurtor display-on-desktop
                    <div class="aurtor">
                        <img src="../images/Index-Images/single-listing-auto-bg.jpg" alt="">
                        <div class="aurtor-info-box">
                            <img src="../images/Index-Images/team-1-Dk2b_Pxk.jpg" alt="autor" class="autor-img">
                            <span>Added By</span>
                            <h4><?=ucfirst($listing['firstname']) ." " . ucfirst($listing['lastname'])?></h4>
                        </div>
                        <ul>
                            <li>
                                <span>Email</span>
                                <a href="" class="busEmail"><?=$listing['email']?></a>
                            </li>
                            <li>
                                <span>Phone No.</span>
                                <a href="" class="busPhone"><?=$listing['phone']?></a>
                            </li>
                            <li>
                                <span>Website</span>
                                <a href="" class="busWeb"><?=$listing['listing_website']?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

    <footer>
            <div class="container">
                <div class="footer-logo">
                    <img src="../images/general-images/logo-white.svg" alt="" class="logo">
                    <p>© 2026 ListingHub. Develop by Jamal. <br>Design Template is gotten Online</p>
                    <div class="social-media-box">
                        <div class="icon">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 320 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path></svg>
                        </div>
                        <div class="icon">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg>
                        </div>
                        <div class="icon">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"></path></svg>
                        </div>
                        <div class="icon">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg>
                        </div>
                    </div>
                </div>
                <div class="get-in-touch-box">
                    <h4>Get In Touch</h4>
                    <div class="contact-box">
                        <div class="location">
                            <div class="icon">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"></path></svg>
                            </div>
                            <div class="address">
                                Angraster 7, Greenhorst Los Angeles QTC564 Reach Us
                            </div>
                        </div>
                        <div class="number">
                            <div class="icon">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5"></path></svg>
                            </div>
                            <div class="address">
                                042 - 526 - 5263 <br> Mon - Sat 10am - 6PM
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </footer>

    <script src="src/general.js"></script>
    <script src="src/single-linsting.js"></script>
</body>
</html>
