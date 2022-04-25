
<?php

session_start();
?>
<script>
    var email = "<?php echo $_SESSION['user_name']; ?>";
    var password="<?php echo $_SESSION['password']?>";
    var user_name = email.split("@")[0];
    </script> 
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My profile</title>

 <!-- IMPORT BOOTSTRAP SCRIPTS-->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

 <!-- nav bar for the website -->
 <br>

 <nav class="navbar navbar-expand-md navbar-light" style="background-color :#F0B27A">

     <a class="navbar-brand" href="#">
         <img src="../NavBar/UcanClaim.png" width="95" height="40" class="d-inline-block align-top" alt="">
     </a>

     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
     </button>
     <div class="container">
         <div class="collapse navbar-collapse justify-content-between " id="navbarNav">
             <ul class="nav navbar-nav ml-auto">
                 <li class="nav-item active">
                     <a class="nav-link" href="../home.php">Home<span class="sr-only"></span></a>
                 </li>
                 <li class="nav-item active">
                     <a class="nav-link" href="../Petition_options.html">Petition<span class="sr-only"></span></a>
                 </li>
                 <li class="nav-item active">
                     <a class="nav-link" href="../index_react/index.html">Shop<span class="sr-only"></span></a>
                 </li>
                 <li class="nav-item active">
                     <a class="nav-link" href="../kneset.php">Contact a Knesset Member<span class="sr-only"></span></a>
                 </li>
                 <li class="nav-item active">
                     <a class="nav-link" href="../my_petition.php">My petitions<span class="sr-only"></span></a>
                 </li>
             </ul>
             <ul class="navbar-nav ml-auto">
                 <li class="nav-item">
                     <a class="nav-link" href="logout.php">Logout</a>
                 </li>
             </ul>
         </div>
     </div>

 </nav>

 <link rel="stylesheet" type="text/css" href="profile.css">
 <link rel="stylesheet" type="text/css" href="petitions_errors.css">
 <script src="https://www.google.com/recaptcha/api.js"></script>
 <!-- <script src="profile_validation.js"></script> -->
 <!-- changeeeeeeeeeeeeeeeeeeeeeee to php -->
 <?php include "profile_validation.php"; ?>
 
    
</head>
<body>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="270px" src="https://st4.depositphotos.com/1915171/25578/v/450/depositphotos_255782984-stock-illustration-user-settings-line-icon-profile.jpg"><span class="font-weight-bold"><script>document.write(user_name) </script></span><span class="text-black-50"><script> document.write(email) </script></span><span> </span></div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        
                        <h4 class="text-right"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                            <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
                          </svg> Profile Settings </h4>
                    </div>
                    <form method="POST" action="profile_validation.php">
                        
                    <div class="row mt-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <span>Edit Email address</span></div><br><br>
                        <div  class="col-md-12 form-control"><label class="labels">Email Address</label>
                            <input id="new_email" type="email" class="form-control"  placeholder="Enter your new Email" > <small> Error message </small> </div>
                        <div  class="col-md-12 form-control"><label class="labels">Password verification</label><input id="password_ver" type="password" class="form-control"  placeholder="Enter your password">  <small> Error message </small></div>
                        <div class="g-recaptcha" data-sitekey="6Leqf54fAAAAACdvsE2UdZuo7EpLF7WeJ5WsBifM"></div>
                        <div class="mt-5 text-center"><button onclick="emailValidation()" class="btn btn-primary profile-button" type="button">Save Email</button></div>
                </div>
            </div>
            <hr>
        <div class="col-md-12">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Edit password</span></div><br>
                <div class="col-md-12 form-control"><label class="labels">New password</label><input id="password1" type="password" class="form-control" placeholder="Enter your new password" >  <small> Error message </small></div>
                <div class="col-md-12 form-control"><label class="labels">New password</label><input id="password2" type="password" class="form-control" placeholder="Enter again your new password" >  <small> Error message </small></div>
                <div class="col-md-12 form-control"><label class="labels">Old password </label><input id="old_password" type="password" class="form-control" placeholder="Enter your previous password"> <small> Error message </small></div>
                <div class="mt-5 text-center "><button class="btn btn-primary profile-button" onclick="passwordValidation()"type="button">Save Password</button></div>
            </div>
        </div>
    </form>
        </div>
    </div>
</body>
</html>