<?php
session_start();

// connect to the database
include "db_conn.php";

// initializing variables
$email = "";
$errors = array(); 


// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($email)){  array_push($errors, "E-mail is required"); }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { array_push($errors, "Invalid email"); }
    else if (empty($password_1)){  array_push($errors, "Password is required"); }
    else  if (strlen($password_1)<5){ array_push($errors, "Password must be over 5 characters");}
    else if ($password_1 != $password_2) {
      array_push($errors, "The two passwords do not match");
      }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE user_name='$email' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  
  while($user = mysqli_fetch_assoc($result)){
   // if user exists
    if ($user['user_name'] == $email) {
      array_push($errors, "Email already exists");
  }
}

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (user_name, upassword) 
  			  VALUES('$email', '$password')";
  	mysqli_query($conn, $query);
  	$_SESSION['user_name'] = $email;
  	$_SESSION['success'] = "You are now logged in";
    echo "<script>alert ('Welcome to UCanClaim!');
    window.location='home.php' </script>";
  }
}