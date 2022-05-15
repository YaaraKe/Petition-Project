<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My signed petitions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="all_petitions.css">
</head>

<body>

    <!-- IMPORT BOOTSTRAP SCRIPTS-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- NavBar -->
    <nav id="navbar"> </nav>

    <section>
        <h3> Petitions Signed By Me</h3>
        <!-- PHP CODE TO FETCH DATA FROM ROWS-->
        <?php
        session_start();
        include_once("db_conn.php");
        $email = $_SESSION['user_name'];

        $sql = "SELECT * FROM all_petitions AS p WHERE p.id_petition IN (SELECT id_petition FROM signatures WHERE `email_signed`='" . mysqli_escape_string($conn, $email) . "')";
        // check the query
        $result = mysqli_query($conn, $sql);
        if ($result === FALSE) {
            die(mysqli_error($conn));
        }
        if (mysqli_num_rows($result) != 0) {
        ?>
            <div class="bg-image col-12">
                <div class="container">
                    <div class="row">
                        <?php

                        // LOOP TILL END OF DATA
                        while ($record = mysqli_fetch_assoc($result)) {

                        ?>
                            <div class="card">

                                <?php echo '<img style="height:10rem" src="data:image/jpeg;base64,' . base64_encode($record['photo']) . '" class="card-img-top yes"/> 
                                     <img style="height:10rem" src="../photos/hover_done.jpg" class="card-img-top no">'; ?>

                                <div class="card-body">
                                    <p id="date"> <?php echo $record['date']; ?></p>
                                    <p class="card-title" style="font-weight: bold;"> <?php echo $record['title']; ?></p>
                                    <br>
                                    <p class="card-text" style="font-family: Times New Roman, Times, serif;" href="signed_petition.php?data=<?php echo $record['id_petition'] ?>"> <?php echo substr_replace($record['content'], "...", 95); ?></p>
                                </div>
                                <a href="signed_petition.php?data=<?php echo $record['id_petition']; ?>" class="btn btn-primary rem"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-text" viewBox="0 0 16 16">
                                        <path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z" />
                                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z" />
                                    </svg> | To the petition</a>
                                <hr>
                            </div>


                        <?php } ?>
                    </div>
                    <br>

                </div>
            </div>
            <br>
        <?php
        } else {
            echo "you still have not signed on petitions, You can sign on ";
        ?>
            <a href="new_petition.html">here.</a>
        <?php
        }
        ?>
    </section>
    <!-- footer -->
    <div id="footer"></div>
</body>
<script>
    $("document").ready(function() {
        //  navbar
        $("#navbar").load("../common/NavBar.html");
        //  footer
        $("#footer").load("../common/footer.html");
    });
</script>

</html>