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
$errors1 = array(); 


//press change password button
if (isset($_POST['reg_user'])) {
  // $_SESSION['password'] = md5($_POST['password_1']);
  // receive all input values from the form
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($email)){  array_push($errors1, "E-mail is required"); }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { array_push($errors1, "Invalid email"); }
    else if (empty($password_1)){  array_push($errors1, "Password is required"); }
    else{
          $password2 = md5($_POST['password_1']);//encrypt the password before saving in the database
         
          
          $user_check_query = "SELECT upassword FROM users WHERE user_name='$current_mail'";
  $result = mysqli_query($conn, $user_check_query);
  
  while($user = mysqli_fetch_assoc($result)){
   // if user exists
    if ($user['upassword'] !=  $password2 ) {
      array_push($errors1, "Wrong password");
  }
  }
          
    //   if($password2!=$current_pass){
    //       array_push($errors1, "Wrong password");
    //   }
    }
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE user_name='$email' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  
  while($user = mysqli_fetch_assoc($result)){
   // if user exists
    if ($user['user_name'] == $email) {
      array_push($errors1, "Email already exists");
  }
  }
  

  // Finally, register user if there are no errors in the form
   if (count($errors1) == 0) {
       echo $email;//מייל חדש
       echo $current_mail;//זה המייל מהסשן

  //  $query13 = "UPDATE `users` SET `user_name`='$email' WHERE `user_name`='$current_mail' ";
    $query_petition = "SET FOREIGN_KEY_CHECKS=0;
                        UPDATE `users` SET `user_name`='$email' WHERE `user_name`='$current_mail';
                        UPDATE `all_petitions` SET `email`='$email' WHERE `email`='$current_mail';
                        UPDATE `signatures` SET `email_signed`='$email' WHERE `email_signed`='$current_mail';
                        SET FOREIGN_KEY_CHECKS=1;";
    mysqli_query($conn, $query_petition);
  	// mysqli_query($conn, $query13);
   	$_SESSION['user_name'] = $email;
  }
 }

//press change password button
 if (isset($_POST['reg_user2'])) {
  // receive all input values from the form
  $pass1 = mysqli_real_escape_string($conn, $_POST['pas1']);
  $pass2 = mysqli_real_escape_string($conn, $_POST['pas2']);
  $oldpass = mysqli_real_escape_string($conn, $_POST['pas3']);
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($oldpass)){  array_push($errors, "Current password is required"); }
    else if (empty($pass1)){  array_push($errors, " New password is required"); }
    else if (empty($pass2)){  array_push($errors, "Please confirm your new password"); }
    else if ($pass1!=$pass2){  array_push($errors, "Passwords not match"); }
    else{
          $oldpass2 = md5($_POST['pas3']);//encrypt the password before saving in the database
      if($oldpass2!=$current_pass){
          array_push($errors, "Wrong password");
      }
    }


  // Finally, change password to the user if there are no errors
   if (count($errors) == 0) {
     $newpass=md5($pass1);
    $query14 = "UPDATE `users` SET `upassword`='$newpass' WHERE `user_name`='$current_mail' ";
  	mysqli_query($conn, $query14);
   	$_SESSION['password'] = $newpass;
//     $_SESSION['password'] = $password;
//   	$_SESSION['success'] = "You are now logged in";
//     echo "<script>alert ('Welcome to UCanClaim!');
//     window.location='home.php' </script>";
  }
 }