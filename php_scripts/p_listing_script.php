<?php
  require "php_scripts/dbconnect.php";

  // GETTING THE CATEGORIES IN THE DATABASE AND DISPLAY ON THE LISTING FORM
  $sql = "SELECT * FROM categories";
  $query = mysqli_query($connect, $sql);

  // GETTING INPUTS FROMT THE POST LISTING FORM AND PUT INTO DATABASE. 
  $errName = $errUrl = $errCat = $errAbout = $errImage =  "";
  $target_dir = "uploads/";
  $successMsg = "";

  function testInput($input){
    $data = stripslashes($input);
    $data = strtolower($data); 
    $data = htmlspecialchars($data);
    return $data;
  }

  // VALIDATING THE INPUTS 
  if($_SERVER["REQUEST_METHOD"] == "POST"){

    $listingName = $_POST["listing_name"];
    $listingURL = $_POST["listing_url"];
    $listingCategory = (int)$_POST["listing_category"];
    $listingAddress = $_POST["listing_address"];
    $listingAbout = $_POST["listing_about"];
    $listingImage = $_FILES["image"];
    $listingOwner = (int)$_SESSION["id"];

     // VALIDATING THE LISTING NAME. 
    if(empty($listingName)){
     $errName = "Input Valid Listing Name";
    }else if (strlen($listingName) < 3){
      $errName = "Listing Name Must be at least 3 characters";
    }else{
      $listingName = testInput($listingName);
      $errName = "";
    }

    // VALIDATING LISTING URL
    if(empty($listingURL)){
      $errUrl = "Website URL is requiered";
    }else if(!filter_var($listingURL, FILTER_VALIDATE_URL)){
      $errUrl = "Enter Valid URL";
    }else{
      $errUrl = "";
      $listingURL = testInput($listingURL);
    }

    // VAlIDATING CATEGORY 
    if(empty($listingCategory)){
      $errCat = "Category Required";
    }else{
      $errCat = "";
      $listingCategory = testInput($listingCategory);
    }

    // VALIDATING ADDRESS.

     if(empty($listingAbout) && empty($listingAddress)){
     $errName = "Address or About is required";
    }else if (str_word_count($listingAbout) < 3 && str_word_count($listingAddress) < 3){
      $errAbout = "Listing Name Must be at least 3 words";
    }else{
      $errAbout = "";
      $listingAbout = testInput($listingAbout);
      $listingAddress = testInput($listingAddress);
    }

    // VALIDATING IMAGE. 
    $maxSize = 2 * 1024 * 1024 ;
    $allowedTypes = ["jpg", "jpeg", "png", "webp"];
    $imageName = $listingImage["name"];
    $ext = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
    $listingImageName = "";

    if($listingImage["error"] > 0){
      $errImage = "Listing Image is required";
    } else if($listingImage["size"] > $maxSize){
      $errImage = "File size must not be more than 2mb";
    } else if(!in_array($ext, $allowedTypes)){
      $errImage = "Only jpg, jpeg, png, and webp images are allowed.";
    } else {
      $listingImageName = date("M-d-y-Hms") .".".$ext;
    }

    // MOVING FILES INTO DATABSE 

    if(empty($errName) && empty($errUrl) && empty($errCat) && empty($errAbout) && empty($errImage)){

      $stm = "INSERT INTO listings(listing_name, listing_address, listing_category, listing_website, listing_about, owner_id, listing_image) VALUES ('$listingName', '$listingAddress', $listingCategory, '$listingURL', '$listingAbout', $listingOwner, '$listingImageName' ) ";

      $insertListing = mysqli_query($connect, $stm);
      
        // echo "'$listingName', '$listingAddress', $listingCategory, '$listingURL', '$listingAbout'. $listingOwner, '$listingImageName'";

      if($query){
        move_uploaded_file($listingImage['tmp_name'], $target_dir.$listingImageName);
        header("location: dashboard.php");
      }else{
        echo "Something Went wrong";
      }
    }


  }