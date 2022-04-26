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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
            <img src="../NavBar/UcanClaim.png" width="95" height="40" class="d-inline-block align-top" alt="">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container">
            <div class="collapse navbar-collapse justify-content-between " id="navbarNav">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../home.php">Home<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Petition<span
                                class="sr-only"></span></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="all_petitions.php">Sign a Petition</a>
                            <a class="dropdown-item" href="new_petition.html">Create a Petition</a>
                            <a class="dropdown-item" href="achieved_tareget_petitions.php">Completed petitions</a>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="../index_react/index.html">Shop<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="../kneset.php">Contact a Knesset Member<span
                                class="sr-only"></span></a>
                    </li>

                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account<span
                                class="sr-only"></span></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Profile</a>
                            <a class="dropdown-item" href="../my_petition.php">My Petitions</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php">Log Out</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

    </nav>


        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="home.css">
        <!-- display the user name -->
        <script>
            var user_name_full = "<?php echo $_SESSION['user_name']; ?>";
            user_name = user_name_full.split("@")[0];
        </script>

        <br>
        <div class="top1 container">
            <div class="row">
                <div id="img_protest" class="col" style="width:50%;float: right;">
                    <img src="https://media.lrng.org/26/a8/9cb2cac562cf80bbbc65e9f446bc617fc470-480x270.gif" alt="welcome_img" style="width:100%">
                </div>
                <div id="personal_text" class="col">
                    <br>
                    <p>Hello,
                        <script>
                            document.write(user_name)
                        </script>
                    </p>
                    <br>
                    <b>MAKE A CHANGE!</b>
                    <p style="font-size: 14px; margin-right:1rem;">
                        This site is designed to help create social change. Here you can purchase equipment that will help you, contact a Knesset member, sign petitions and create new petitions.</p>
                </div>
            </div>

        </div>
        
        <br>
        <!-- display recent petitions -->
        <div class="bg-image col-12">
        <div class="container">
            <hr>
            <br>
            <h3> Recently added petitions </h3>
            <br>
        <div class="row">
            <?php
            $count = 0;

            include_once("db_conn.php");
            // display 8 recent petitions
            $sql = "SELECT * FROM all_petitions AS p WHERE target_singatures > (SELECT COUNT(*) FROM signatures AS s WHERE p.id_petition = s.id_petition)  ORDER BY id_petition DESC LIMIT 4";
            $resultset = mysqli_query($conn, $sql);
            while ($record = mysqli_fetch_assoc($resultset)) {
                $count = $count + 1;
                if ($count % 2 == 0) {
            ?>
            
            <div class="card">
                    <?php
                } else { ?>
                
                    <div class="card">
                        <?php } ?>
                            <?php echo '<img class="card-img-top" alt="petition_img" src="data:image/jpeg;base64,' . base64_encode($record['photo']) . '"/>'; ?>


                        <div class="card-body">
                            
                            <p class="card-title" style="font-weight: bold;"> <?php echo $record['title']; ?></p>
                            <br>
                            <p id="date"> <?php echo $record['date']; ?></p>
                            <p class="card-text" style="font-family: Times New Roman, Times, serif;" href="signed_petition.php?data=<?php echo $record['id_petition'] ?>"> <?php echo substr_replace($record['content'], "...",100); ?></p>
                            <br>
                            <a href="signed_petition.php?data=<?php echo $record['id_petition'] ?>" class="card-link rem">Read more</a>
                        </div>

                    </div>

                    <?php } ?>
                    </div>
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

} else {

    header("Location: index.php");

    exit();
}

?>