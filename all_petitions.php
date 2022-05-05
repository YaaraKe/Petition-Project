<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>all_petitions</title>
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
    <div class="container">
        <div class="row justify-content-center">
            <iframe src="//www.youtube.com/embed/NzZwqT1gPk0?autoplay=1&mute=1"></iframe>
        </div>
        <hr>
    </div>

    <br>

    <!-- search box -->
    <section>
        <form style="text-align:center;" action="" method="POST" class="search-box">
            <input id="search" name="char" autocomplete="off" type="text" placeholder="Search petition">
            <button style="margin: auto;" id="submit" name="submit2" type="submit"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg> | Search
            </button>
            <div class="result"> </div>


            <br>
            <br>
        </form>
        <!-- PHP CODE TO FETCH DATA FROM ROWS-->
        <h3>All petitions,
            <small class="text-muted">Choose your petition</small>
        </h3>
        <?php
        include_once("db_conn.php");


        session_start();
        $email = $_SESSION['user_name'];

        if (isset($_POST["submit2"])) {
            $char = $_REQUEST['char'];
            $sql = "SELECT * FROM all_petitions AS p WHERE (target_singatures > (SELECT COUNT(*) FROM signatures AS s WHERE p.id_petition = s.id_petition)) AND (`content` LIKE '%%$char%%' OR `title` LIKE '%%$char%%') AND (p.id_petition NOT IN (SELECT id_petition FROM signatures WHERE `email_signed`='" . mysqli_escape_string($conn, $email) . "'))";


            $resultset = mysqli_query($conn, $sql);
            // if user searched
            if (mysqli_num_rows($resultset) != 0) {
        ?>
                <div class="bg-image col-12">
                    <div class="container">
                        <div class="row">
                            <?php
                            while ($record = mysqli_fetch_assoc($resultset)) {
                            ?>

                                <div class="card">

                                    <?php echo '<img style="height:10rem" src="data:image/jpeg;base64,' . base64_encode($record['photo']) . '" class="card-img-top yes"/> 
                                <img src="../photos/hover.jpg" class="card-img-top no">'; ?>

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
                                    <a href="signed_petition.php?data=<?php echo $record['id_petition'] ?>" class="btn btn-primary rem"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                        </svg> | Sign now</a>
                                    <hr>
                                    <br>
                                </div>
                                <br>



                            <?php } ?>
                        </div>
                    </div>
                </div>
                <br>
            <?php
            }
            // if the petition was not found
            else {
            ?>
                <h5 style="text-align:center;"> The petition was not found</h5>
            <?php
            }
            //  if user didnt serch  
        } else {
            // SQL query to select data from database
            $sql = "SELECT * FROM all_petitions AS p WHERE (target_singatures > (SELECT COUNT(*) FROM signatures AS s WHERE p.id_petition = s.id_petition)) AND (p.id_petition NOT IN (SELECT id_petition FROM signatures WHERE `email_signed`='" . mysqli_escape_string($conn, $email) . "'))";
            $resultset = mysqli_query($conn, $sql);
            ?>
            <div class="bg-image col-12">
                <div class="container">
                    <div class="row">
                        <?php
                        // LOOP TILL END OF DATA
                        while ($record = mysqli_fetch_assoc($resultset)) {
                        ?>

                            <div class="card">

                                <?php echo '<img style="height:10rem" src="data:image/jpeg;base64,' . base64_encode($record['photo']) . '" class="card-img-top yes"/> 
                                <img src="../photos/hover.jpg" class="card-img-top no">'; ?>

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
                                <a href="signed_petition.php?data=<?php echo $record['id_petition'] ?>" class="btn btn-primary rem"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                    </svg> | Sign now</a>
                                <hr>
                                <br>
                            </div>
                            <br>



                        <?php } ?>
                    </div>
                </div>
            </div>
            <br>
        <?php
        }
        ?>
        <!-- footer -->
        <div id="footer"></div>




</body>

</html>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('.search-box input[type="text"]').on("keyup input", function() {
            /* Get input value on change */
            var inputVal = $(this).val();
            var resultDropdown = $(this).siblings(".result");
            if (inputVal.length) {
                $.get("backend_petition_search.php", {
                    term: inputVal
                }).done(function(data) {
                    // Display the returned data in browser
                    resultDropdown.html(data);
                });
            } else {
                resultDropdown.empty();
            }
        });

        // Set search input value on click of result item
        $(document).on("click", ".result div", function() {
            $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
            $(this).parent(".result").empty();
        });
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        $("document").ready(function() {
            //  navbar
            $("#navbar").load("../common/NavBar.html");
            //  footer
            $("#footer").load("../common/footer.html");
        });
    </script>