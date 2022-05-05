<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>all_petitions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="all_petitions.css">
    <link rel="stylesheet" type="text/css" href="achieved_tareget_petitions.css">
    <style>
        /* body {
                background-color:# ;
            } */

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
    </style>
</head>

<body>

    <!-- IMPORT BOOTSTRAP SCRIPTS-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- nav bar for the website -->
    <br>
    <nav class="navbar navbar-expand-md navbar-light" style="background-color :#F0B27A">

        <a class="navbar-brand" href="#">
            <img src="../NavBar/UcanClaim.png" width="85" height="40" class="d-inline-block align-top" alt="">
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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Petition<span class="sr-only"></span></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color :#F0B27A;
                        border: none;outline: none;scroll-behavior: smooth">
                            <a class="dropdown-item" href="all_petitions.php">Sign a Petition</a>
                            <a class="dropdown-item" href="new_petition.html">Create a Petition</a>
                            <a class="dropdown-item" href="achieved_tareget_petitions.php">Completed petitions</a>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="../index_react/index.html">Shop<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="../kneset.php">Contact a Knesset Member<span class="sr-only"></span></a>
                    </li>

                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account<span class="sr-only"></span></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="p_form.php">Profile</a>
                            <a class="dropdown-item" href="../my_petition.php">Created Petitions</a>
                            <a class="dropdown-item" href="../my_signed_petitions.php">Signed Petitions</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php">Log Out</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

    </nav>

    <div class="container" style="position: relative;text-align: left;">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-3 mx-auto img_jump" style="float: right;">
                <img src="../photos/jumping.gif" alt="welcome_img" style="width:100%">
            </div>
            <div id="personal_img" class="col mx-auto">
                <br>
                <br>
                <br>
                <br>
                <p id="text_con" class="show_2">We are happy to present you all the Petitions that have been <span id="bold_p">successfully completed</span>, thanks to all the people that signed and made a difference</p>
                <br>
            </div>
        </div>
        <hr>
    </div>


    <section>
        <!-- PHP CODE TO FETCH DATA FROM ROWS-->
        <h3>Completed petitions</h3>
        <div class="bg-image col-12">
            <div class="container">
                <div class="row">
                    <?php

                    include_once("db_conn.php");

                    // SQL query to select data from database
                    $sql = "SELECT * FROM all_petitions AS p WHERE target_singatures = (SELECT COUNT(*) FROM signatures AS s WHERE p.id_petition = s.id_petition)";
                    $resultset = mysqli_query($conn, $sql);

                    // LOOP TILL END OF DATA
                    while ($record = mysqli_fetch_assoc($resultset)) {
                    ?>
                        <div class="card">

                            <?php echo '<img style="height:10rem" src="data:image/jpeg;base64,' . base64_encode($record['photo']) . '" class="card-img-top"/> '; ?>

                            <div class="card-body">
                                <p id="date"> <?php echo $record['date']; ?></p>
                                <p class="card-title" style="font-weight: bold;"> <?php echo $record['title']; ?></p>
                                <br>
                                <p id="date"><?php
                                                $name = $record['email'];
                                                $name1 = explode("@", $name);
                                                echo $name1[0];

                                                ?></p>
                                <p class="card-text" style="font-family: Times New Roman, Times, serif;" href="signed_petition.php?data=<?php echo $record['id_petition'] ?>"> <?php echo substr_replace($record['content'], "...", 95); ?></p>
                            </div>
                            <hr>
                            <!--  progress bar -->
                            <h3>Signtures Progress</h3>
                            <div class="w3-grey w3-round-large">
                                <div class="w3-container w3-blue w3-round-large" style="width:100%">
                                    <?php echo $record['target_singatures']; ?>/<?php echo $record['target_singatures']; ?></div>
                            </div>
                        </div>
                        <br>

                </div>
            </div>
        </div>
        <br>



    <?php } ?>


    <footer class="bg-white">
        <div class="bg-light py-2">
            <div class="container text-center">
                <p class="text-muted mb-0 py-2">© 2022 UCanClaim All rights reserved.</p>
            </div>
        </div>
    </footer>




</body>

</html>