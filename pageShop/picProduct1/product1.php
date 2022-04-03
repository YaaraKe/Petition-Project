<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="..\picStylesheet.css" rel="stylesheet">
    <title>Product</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../pageshop.js"></script>
</head>

<body>

    <!-- IMPORT BOOTSTRAP SCRIPTS-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- nav bar for the website -->
    <br>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="/NavBar/UcanClaim.png" width="125" height="60" class="d-inline-block align-top" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/home.php">Home<span class="sr-only"></span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/Petition_options.html">Petition<span class="sr-only"></span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/index_react/index.html">Shop<span class="sr-only"></span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/kneset.php">Contact Knesset Member<span class="sr-only"></span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/my_petition.php">My petitions<span class="sr-only"></span></a>
                </li>
            </ul>
        </div>
    </nav>
    <br>


    <!-- Show more information about the product -->
    <main class="container">
        <div class="row">
            <div class="col-md-4 ml">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>

                    <!-- Carousle of pictures of the product -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100 size" src="..\picProduct1\pic1.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 size" src="..\picProduct1\pic2.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 size" src="..\picProduct1\pic3.jpg" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only"></span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only"></span>
                    </a>
                </div>
            </div>

            <?php
            $sname = "localhost";
            $unmae = "root";
            $password = "";
            $db_name = "test";
            $connection = mysqli_connect($sname, $unmae, $password, $db_name);
            // SQL query to select data from database
            $sql = "SELECT DISTINCT * FROM shop WHERE id ='1'";
            $resultset = mysqli_query($connection, $sql);
            ?>
            <!-- Information of the product -->
            <div class="col-md-4">
                <div>
                    <br>
                    <?php
                    // LOOP TILL END OF DATA
                    while ($row = mysqli_fetch_assoc($resultset)) {
                    ?>
                        <p>UcanClaim</p>
                        <!-- 22" x 28" - Assorted Colors - 50/ Carton -->
                        <h2><?php echo $row['name']; ?></h2><br>
                        <p> Product Number: 0001 Poster Board Class Pack offers a convenient assortment of four-ply
                            poster board. Colors include black, white, magenta, light blue, dark blue, holiday green, pink,
                            red, orange and lemon yellow. Poster board contains a high percentage of recycled material with
                            post-consumer content.</p>

                        <div>
                            <p id="price1"><?php echo $row['num']; ?>₪</p>
                        </div>
                        <?php } ?>
                        <div id="container"></div>
                        <div id="update"></div>
                        <script type="text/javascript">
                            var element = document.getElementById('update');
                            element.addEventListener('DOMSubtreeModified', updateModified);

                            function updateModified(e) {
                                console.log(element.innerHTML);
                                if (element.innerHTML == "success") {
                                    <?php
                                    $sql1 = "UPDATE shop SET status='0' WHERE id=1 AND status=1 LIMIT 1";
                                    if ($connection->query($sql1) === TRUE) {
                                        echo "success";
                                      } else {
                                        echo "Error updating record: " . $connection->error;
                                      }
                                    ?>
                                }
                            }
                        </script>
                    
                </div>
            </div>
        </div>
    </main>
    <br>
    <script async src="https://pay.google.com/gp/p/js/pay.js" onload="onGooglePayLoaded(document.getElementById('price1').innerHTML.replace('₪', ''))"></script>
</body>

</html>