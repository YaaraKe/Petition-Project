

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signed a Petiton</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="petitions_errors.css" rel="stylesheet">
</head>
<body>
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
                    <a class="nav-link" href=HOME.php>Home<span class="sr-only"></span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href=petition_options.html>Petition<span class="sr-only"></span></a>
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
<link rel="stylesheet" href="signed_petition.css">
    <br><br>

    <?php
    session_start();
include 'db_conn.php';
$id = $_GET['data'];
$id = mysqli_real_escape_string($conn,$id);
 
 $sql = "SELECT * FROM all_petitions WHERE `id_petition`='" . $id . "'";
 $resultset = mysqli_query($conn,$sql); 

  // LOOP TILL END OF DATA
          while($row=mysqli_fetch_assoc($resultset)){
             ?>
<!-- the petition: -->
             <div>
                <h1  style=" font-family: 'Times New Roman';" > <u><?php echo $row['title']; ?></u> </h1>
                <small><?php echo $row['date']; ?> </small>
                <br><br>
                <?php echo $row['content']; ?>

             </div>

<!-- how many signatures -->
<?php
$sql1 = "SELECT COUNT(*) FROM signatures WHERE `id_petition`='" . $id . "'";
$result= mysqli_query($conn,$sql1); 
$count_signatures = mysqli_fetch_array($result);

 ?>
    <!-- <h3  style=" font-family: 'Times New Roman';" > how many signatures do we have? <?php echo $count_signatures[0]; ?> </h3> -->
            
<!-- retrieve signatures goal -->
<?php
$sql2 = "SELECT target_singatures FROM all_petitions WHERE `id_petition`='" . $id . "'";
$result1= mysqli_query($conn,$sql2); 
$target_signatures = mysqli_fetch_row($result1);

?>
<!--  progress bar -->
<h1>Signtures Progress</h1>
<div class="w3-grey w3-round-large">
    <div class="w3-container w3-blue w3-round-large" 
    style="width:<?php echo ($count_signatures[0]/$target_signatures[0]) ?>%">
    <?php echo $count_signatures[0]?>/<?php echo $target_signatures[0]?></div>
  </div>

<hr>
       <br><br>
        <!-- Sign on a petition -->
                <div class="header">
                    <h3> Sign on a petition</h3
                </div>
                <div class="row mb-4">
                    <form method="post" name="signedForm" action="" >

                        <!-- Name Input********************** -->
                        <div class="form-control ">
                            <label> Full Name:</label>
                            <input id="Namef" type="text" name="signName" placeholder="Name" required>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
  <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
</svg>
                            <small> Error message </small>
                            
                        </div>

                        <hr>

                        <button type="submit" name="submit" id="sign" onclick="return sign_name()"
                            class="btn btn-outline-primary">Sign</button>
                        <button type="reset" value="Reset" name="reset" class="btn btn-outline-secondary">Reset</button>
                        </div>
        
        <br>
    </form>

    <script src="validations.js"></script>
</body>
</html>

<?php
 $email=$_SESSION['user_name'];
$sql_two=" SELECT email_signed, id_petition FROM signatures where id_petition='" . $id . "' AND email_signed='" . $email . "' ";
$result = mysqli_query($conn,$sql_two); 
 if ($result === FALSE) {
    die(mysqli_error($conn));
  }
  if(mysqli_num_rows($result)!=0){
    echo "<script> document.getElementById('Namef').setAttribute('disabled', ' '); </script>";
    echo "<script> document.getElementById('Namef').setValue('disabled', ' '); </script>";
     echo "You can't signed twice";
  }

// send the data to db
if(isset($_POST['submit'])){
    $name =  $_REQUEST['sign_name'];
    $sql= "INSERT INTO `signatures` VALUES ( '$email', '$id', '$name')";
    if(mysqli_query($conn, $sql)){
        echo '<script> alert ("You signed successfully.") </script>'; 
        //need check if we get the target of singatures or alerts so we will send an emails
        echo "(<script> window.location='all_petitions.php';</script>)";
    } else{
        echo " Sorry please try again later $sql. " 
            . mysqli_error($conn);
    }
}
}       
?>