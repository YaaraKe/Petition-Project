<?php
  include ("database_knesset_connection.php");

    ?>

<?php

error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");

// echo "<pre>";
// print_r($_POST);
// echo '</pre>';
$message_sent=false; 
if (isset($_POST["submit"])){


if (isset($_POST["emailf"]) && $_POST["emailf"]!=null){//set and not empty submit the form
$userName=$_POST["namef"];
$userEmail=$_POST["emailf"];
$messageSubject=$_POST["subjectf"];
$message=$_POST["inf"];


$to="nofarefa@gmail.com";
$body="";
//new line rn
$body.="from:".$userName. "\r\n";
$body.="my email for response:".$userEmail. "\r\n";
$body.="message:".$message. "\r\n";

$result= mail($to, $messageSubject, $body);
if ($result){
    echo "<script>alert('message was sent successfully')</script>";
}
else{
    echo "<script>alert('submmition failed try again later')</script>";
}
    
   
}
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>send email to member of Kneset</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</head>

<body>
    <!-- IMPORT BOOTSTRAP SCRIPTS-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

    <!-- nav bar for the website -->
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="NavBarPic//ucanclaim.png" width="125" height="60" class="d-inline-block align-top" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href=home.php>Home<span class="sr-only"></span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href=#>Petition<span class="sr-only"></span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href=#>Shop<span class="sr-only"></span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href=kneset.php>Contact Knesset Member<span class="sr-only"></span></a>
                </li>
            </ul>
        </div>
    </nav>
    <link rel="stylesheet" type="text/css" href="knesset_style.css">
 
<!-- connect to server to knesset data base -->

<div style="margin-left: 2%;">
    <form method="POST" action="" style="margin:0 -16px 8px -16px"> 
    <lable for="namef">Name: </lable>
    <input type="text" placeholder="Full name" required name="namef"><br>
    <lable for="emailf">Your email: </lable>
    <input  type="email" placeholder="Email" required name="emailf"><br>
    <lable for="subjectf">Title: </lable>
    <input type="text" placeholder="Subject" required name="subjectf"><br>
    <lable for="inf">Your Messeage:  </lable>
    <input type="text" placeholder="Write your email here..." required name="inf"><br>
    <button name="submit" type="submit"> Send</button>

    </form>
</div>

    </body>

</html>



