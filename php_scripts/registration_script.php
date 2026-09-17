<?php
  require "php_scripts/dbconnect.php";
  $errName = $errEmail = $errPassword = $errPhone = "";
  $succMsg = "";

  function testInput($input){
    $data = strtolower($input);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data; 
  }

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];

    // VALIDATING THE USER INPUTED DATA. 

    // NAME VALIDATION 
    if(empty($firstname) || empty($lastname)){
      $errName = "Input Valid Name firstname or lastname";
    }else if($firstname < 3 || $lastname < 3 ){
      $errName = "Name too short";
    }else if(!preg_match('/^[a-zA-Z]+$/', $firstname) || !preg_match('/^[a-zA-Z]+$/', $firstname)){
      $errName = "Name should only contain alphabets";
    }else {
      $firstname = testInput($firstname);
      $lastname = testInput($lastname);
      $errName = "";
    }

    // EMAIL VALIDATE
    if(empty($email)){
      $errEmail = "Email is required";
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $errEmail = "Invalid Email";
    }else{
      $errEmail = "";
      $email = testInput($email);
      $errEmail;

    }

    // PHONE VALIDATION 
    if(empty($phone)){
      $errPhone = "Phone number required";
    }else if(!preg_match('/^(080|081|070|071|090|091)[0-9]{8}$/', $phone)){
      $errPhone = "Invalid Phone";
    }else {
      $phone = testInput($phone);
      $errPhone = "";
    }

    // PASSWORD VALIDATE. 
    if(empty($password)){
      $errPassword = "Password required";
    }else if($password < 8){
      $errPassword = "pasword must be 8 characters";
    }else{
      $password = testInput($password);
      $errPassword = "";
    }

    // CHECKING IF ALL ERRORS IS EMPTY AN GETTING THE CORRECT DATA.
    if(empty($errName) && empty($errEmail) && empty($errPhone) && empty($errPassword)){
      $password = password_hash($password, PASSWORD_DEFAULT);


      if(!$connect){
        die("Database Connection failed: " . mysqli_connect_error());
      }else{
        // CHECKING IF USER ALREADY EXIST
        $csql = "SELECT id FROM users WHERE email = ?";
        $cstmt = mysqli_prepare($connect, $csql);
        mysqli_stmt_bind_param(
          $cstmt,
          's',
          $email
        );
        mysqli_stmt_execute($cstmt);
        $result = mysqli_stmt_get_result($cstmt);

        if(mysqli_num_rows($result) > 0){
          $errEmail = "Email Already exist";
        }else{
          $sql = "INSERT INTO users(firstname, lastname, email, phone, password) VALUES( ?, ?, ?, ?, ?)";
          $stmt = mysqli_prepare($connect, $sql);
          mysqli_stmt_bind_param(
            $stmt,
            "sssss",
            $firstname,
            $lastname,
            $email,
            $phone,
            $password
          );
          if(mysqli_stmt_execute($stmt)){
            $succMsg = "Registration Successfull";
            header("location: login.php");
          }else{
            echo "Registration Failed" . mysqli_stmt-error();
          }
          mysqli_stmt_close($stmt);
          mysqli_close($connect);
        }
      }
    }
  }