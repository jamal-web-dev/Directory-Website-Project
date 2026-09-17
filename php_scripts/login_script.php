<?php 
  require "php_scripts/dbconnect.php";
  session_start();
  $errMsg = "";

  function testInput($input){
    $data = strtolower($input);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data; 
  }

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $password = $_POST["password"];

    if(empty($email)){
      $errMsg = "Invalid Email or Password";
    }else{
      $email = testInput($email);
    }
    if(empty($password)){
      $errMsg = "Invalid Email or Password";
    }else{
      $password = testInput($password);
    }
    

    // Checking if no error ocuur
    if(empty($errMsg)){

      // Checking if user email exist. 
      $csql = "SELECT * FROM users WHERE email = ?";
      $cstmt = mysqli_prepare($connect, $csql);
      mysqli_stmt_bind_param(
        $cstmt,
        's',
        $email
      );
      mysqli_stmt_execute($cstmt);
      $result = mysqli_stmt_get_result($cstmt);
      if(mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);
        $storedPassword = $user["password"];
        if(password_verify($password, $storedPassword)){
          $_SESSION["id"] = $user["id"];
          $_SESSION["name"] = $user["firstname"];
          header("location: dashboard.php");
        }else{
          $errMsg = "Invalid Email or Password";
        }
      }else{
        $errMsg = "User does not exist";
      }

      // if(mysqli_num_rows($result) > 0){
      //   $sql = "SELECT * FROM users WHERE email = ?";
      //   $stmt = mysqli_prepare($connect, $sql);
      //   mysqli_stmt_bind_param(
      //     $stmt, 
      //   );
      // }
    }
  }