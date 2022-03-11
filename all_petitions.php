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
                    <a class="nav-link" href=#>Petition<span class="sr-only"></span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href=#>Shop<span class="sr-only"></span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href=kneset.html>Contact Knesset Member<span class="sr-only"></span></a>
                </li>
            </ul>
        </div>
    </nav>

    <section>
        <!-- PHP CODE TO FETCH DATA FROM ROWS-->
        <div class="container">
    <h1>All petitions,
        <small class="text-muted">Choose your petition</small>
    </h1>
        <?php    
         
       include_once("db_conn.php");
        
       // SQL query to select data from database
       $sql = "SELECT * FROM all_petitions";
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
                    </div>
                    <a href="signed_petition.php?data=<?php echo $record['id_petition'] ?>" class="btn btn-primary">Sign now</a>
                </div>
                <br>
            </div>
            <br>
      
        

        <?php } ?>
    </div>



   


        
</body>

</html>