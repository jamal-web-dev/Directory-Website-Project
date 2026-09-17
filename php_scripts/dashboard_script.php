<?php 
  require_once "dbconnect.php";
  $listing_owner = (int)$_SESSION["id"];

  // GETTING ACTIVE LISTINGS SATS. 

    $activestmt = "SELECT COUNT(*) AS active_listings FROM `listings` WHERE status = 'active' AND owner_id = $listing_owner";
    $getActiveListings = mysqli_query($connect, $activestmt);
    $row = mysqli_fetch_assoc($getActiveListings);
    $activeListings = $row["active_listings"];

// GETTING PENDING LISTINGS STATS

  $pendingstmt = "SELECT COUNT(*) AS pending_listings FROM `listings` WHERE status = 'pending' AND owner_id = $listing_owner";
    $getPendingListings = mysqli_query($connect, $pendingstmt);
    $row = mysqli_fetch_assoc($getPendingListings);
    $pendingListings = $row["pending_listings"];

// GETTING TOTAL LISTINGS STATS
  $totalstmt = "SELECT COUNT(*) AS total_listings FROM `listings` WHERE owner_id = $listing_owner";
    $getTotalListings = mysqli_query($connect, $totalstmt);
    $row = mysqli_fetch_assoc($getTotalListings);
    $totoalListings = $row["total_listings"];

// GET ACTIVE LISTING INFORMATION
 $atlstmt = " SELECT listings.* , categories.category_name FROM listings INNER JOIN categories ON listings.listing_category = categories.id WHERE owner_id = $listing_owner AND status = 'active'";
  $getActiveListingInfo = mysqli_query($connect, $atlstmt);

// GET PENDING LISTING INFORMATION
 $ptlstmt = " SELECT listings.* , categories.category_name FROM listings INNER JOIN categories ON listings.listing_category = categories.id WHERE owner_id = $listing_owner AND status = 'pending'";
  $getPendingListingInfo = mysqli_query($connect, $ptlstmt);