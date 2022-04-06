<?php 

session_start();

if (isset($_SESSION['user_name'])) {

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <style>
        body {
        background-image: url('cool-background.png');
        }
    </style>

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
    <br>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="../NavBar/UcanClaim.png" width="125" height="60" class="d-inline-block align-top" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
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
      
    </nav>

    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="home.css">
    <!-- display the user name -->
    <script>
    var user_name_full= "<?php echo $_SESSION['user_name']; ?>";
    user_name=user_name_full.split("@")[0];
</script>
<div class="top">
        <img class="img_top" src="simple.jpg" alt="welcome_img" >
        <div class="centered">Hello, <script> document.write(user_name)</script>
            <br>
            <b>Make a change!</b>
            <br>
            This site is designed to help create social change. Here you can purchase equipment that will help you, contact a Knesset member, sign petitions and create new petitions.
        </div>
      </div>
      <br><br>

   <!-- display petitions -->
  
         
   <!-- display recent petitions -->
   <div class="container">
   <div class="row" style="justify-content: center">
      <h1 > Recently added petitions </h1> 
      <?php    
         
         include_once("db_conn.php");
         // display 8 recent petitions
         $sql = "SELECT * FROM all_petitions AS p WHERE target_singatures > (SELECT COUNT(*) FROM signatures AS s WHERE p.id_petition = s.id_petition)  ORDER BY id_petition DESC LIMIT 8";
         $resultset = mysqli_query($conn,$sql);
         while($record=mysqli_fetch_assoc($resultset))
      
                {
         ?>
                     <div class="column">
                     <div class="card">
                        <?php  echo '<img src="data:image/jpeg;base64,'.base64_encode( $record['photo'] ).'"/>';?>
                        <a href="signed_petition.php?data=<?php echo $record['id_petition'] ?>" > <h5> <?php echo $record['title']; ?></h5></a>
                        </div>
                </div>

      <?php } ?>
                </div>
                </div>
<br>

<footer class="bg-white">
    <div class="bg-light py-2">
        <div class="container text-center">
            <p class="text-muted mb-0 py-2">© 2022 UCanClaim All rights reserved.</p>
        </div>
    </div>
</footer>
</body>

</html>

<?php 

}else{

     header("Location: index.php");

     exit();

}

 ?>