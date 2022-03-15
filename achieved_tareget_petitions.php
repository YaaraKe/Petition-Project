<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>all_petitions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="nav navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="../home.php">Home<span class="sr-only"></span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="../Petition_options.html">Petition<span class="sr-only"></span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="../index.html">Shop<span class="sr-only"></span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="../kneset.php">Contact Knesset Member<span class="sr-only"></span></a>
        </li>
        <li class="nav-item active">
                    <a class="nav-link" href="../my_petition.php">My petitions<span class="sr-only"></span></a>
                </li>
      </ul>
    </div>
  </nav>
  <br>

    <section>
        <!-- PHP CODE TO FETCH DATA FROM ROWS-->
        <div class="container">
    <h1>Completed petitions</h1>
        <?php    
         
       include_once("db_conn.php");
        
       // SQL query to select data from database
       $sql = "SELECT * FROM all_petitions AS p WHERE target_singatures = (SELECT COUNT(*) FROM signatures AS s WHERE p.id_petition = s.id_petition)";
       $resultset = mysqli_query($conn,$sql);
      
        // LOOP TILL END OF DATA
                while($record=mysqli_fetch_assoc($resultset))
                {
                    
                   
                    
             ?>


    <div class="row">
        <div class="col-md-7">
            <div class="card">
                
                    <img src="<?php echo $record ['photo']; ?>" class="card-img-top" alt="Petition photo">
               
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <h5 class="card-title">
                           
                        <?php echo $record['title']; ?>
                   
                </div> </strong></h5>
                        </div>
                        <div class="desc text-muted">
                    <?php echo $record['date']; ?>
                </div>
                        <div class="col-md-5 text-right">
                            <p class="card-text"><?php echo $record['content']; ?></p>
                        </div>
                        <!--  progress bar -->
                        <h3>Signtures Progress</h3>
                        <div class="w3-grey w3-round-large">
                            <div class="w3-container w3-blue w3-round-large" 
                            style="width:100%">
                            <?php echo $record['target_singatures']; ?>/<?php echo $record['target_singatures']; ?></div>
                        </div>

                    </div>
                </div>
                <br>
            </div>
            <br>
      
        

        <?php } ?>
    </div>



   


        
</body>

</html>