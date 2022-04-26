<?php
session_start();

// connect to the database
include "db_conn.php";

 $current_mail=$_SESSION['user_name'];
 $current_pass=$_SESSION['password'];
 echo $current_mail;
 echo $current_pass;

// initializing variables
$email = "";
$errors = array(); 


// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($email)){  array_push($errors, "E-mail is required"); }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { array_push($errors, "Invalid email"); }
    else if (empty($password_1)){  array_push($errors, "Password is required"); }
    else{
          $password2 = md5($_POST['password_1']);//encrypt the password before saving in the database
      if($password2!=$current_pass){
          array_push($errors, "Wrong password");
      }
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
//   	$query = "INSERT INTO users (user_name, upassword) 
// //   			  VALUES('$email')";
$query13 = "UPDATE `users` SET `user_name`='$email' WHERE `user_name`='$current_mail' ";
  	mysqli_query($conn, $query13);
   	$_SESSION['user_name'] = $email;
//     $_SESSION['password'] = $password;
//   	$_SESSION['success'] = "You are now logged in";
//     echo "<script>alert ('Welcome to UCanClaim!');
//     window.location='home.php' </script>";
  }
 }