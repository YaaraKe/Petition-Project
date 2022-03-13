<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My petitions</title>
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
    <br>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="/NavBar/UcanClaim.png" width="125" height="60" class="d-inline-block align-top" alt="">
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
            </ul>
        </div>
    </nav>
    <br>

    <section>
    <h1 style="text-align: center;">My petitions: </h1>
        <!-- PHP CODE TO FETCH DATA FROM ROWS-->
        <?php    
       session_start();
       include_once("db_conn.php");
        $email=$_SESSION['user_name'];
 
 $sql = "SELECT * FROM all_petitions WHERE `email`='" . mysqli_escape_string($conn,$email) . "'";
       // check the query
       $result = mysqli_query($conn,$sql); 
       if ($result === FALSE) {
        die(mysqli_error($conn));
      }
      if(mysqli_num_rows($result)!=0){
      
        // LOOP TILL END OF DATA
                while($record=mysqli_fetch_assoc($result))
                {
                    
             ?>

        <div class="card hovercard" id="petition">
            <div class="cardheader">
                <div class="avatar">
                    <img alt="" src="<?php echo $record ['photo']; ?>">

                </div>
            </div>
            <div class="card-body info">
                <div class="title" >
            <h5>  <strong>   <a  href="send_or_delete_petition.php?data=<?php echo $record['id_petition'] ?>">
                        <?php echo $record['title']; ?>
                    </a>
                </div> </strong> </h5>
                <div class="desc text-muted">
                    <?php echo $record['date']; ?>
                </div> 
                <div class="desc">
                        <?php echo $record['content']; ?>
                    </a></div>
                
            </div>
            <div class="card-footer bottom">
                <div class="btn" > 
                </div>
      
              
            </div>
        </div>
        </section>
    <br>

        <?php 
    
    }
    
}

else{
    echo "you still have not petitions, You can create new one";
     ?>
    <a href="new_petition.html">here.</a>
    <?php
}
  ?>

</body>

</html>