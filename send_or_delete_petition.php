

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
<hr>
       <br><br>
                <div class="row mb-4">
                    <form method="post" name="my_petition_form" action="" >
                        <button type="submit" name="delete"
                            class="btn btn-outline-primary">Delete petition</button>
                        <button type="submit"  name="send" class="btn btn-outline-secondary">Send an email to all signatories</button>
                        </div>
        <br>
    </form>

    
</body>
</html>

<?php
// send the data to db
if(isset($_POST['delete'])){
    $name =  $_REQUEST['sign_name'];
    $email=$_SESSION['user_name'];
    $sql= "DELETE FROM `signatures` where id_petition='" . $id . "'";
    if(mysqli_query($conn, $sql)){
        $sql= "DELETE FROM `all_petitions` where id_petition='" . $id . "'";
        if(mysqli_query($conn, $sql)){
        echo '<script> alert ("Your petition has deleted successfully.") </script>'; 
        echo "(<script> window.location='my_petition.php';</script>)";
        }
        else{
            echo " Sorry please try again later $sql. " 
                . mysqli_error($conn);
        }
    } else{
        echo " Sorry please try again later $sql. " 
            . mysqli_error($conn);
    }
}
    
}       
?>