<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="picStylesheet.css" rel="stylesheet">
    <title>Product</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="pageshop.js"></script>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>
    <script type='text/javascript' src=''></script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>
</head>

<body>

    <!-- IMPORT BOOTSTRAP SCRIPTS-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- NavBar -->
    <nav id="navbar"> </nav>
    <br>
    <?php
    $sname = "localhost";
    $unmae = "nofarrei_user";
    $password = "12345";
    $db_name = "nofarrei_Petition";
    $connection = mysqli_connect($sname, $unmae, $password, $db_name);
    // SQL query to select data from database
    $id = $_GET['data'];
    $sql = "SELECT DISTINCT * FROM shop WHERE id= $id ";
    $resultset = mysqli_query($connection, $sql);
    ?>

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
                    <?php
                    // LOOP TILL END OF DATA
                    while ($row = mysqli_fetch_assoc($resultset)) {
                    ?>
                        <!-- Carousle of pictures of the product -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <?php echo '<img class="d-block w-100 size"  alt="First slide" src="data:image/jpeg;base64,' . base64_encode($row['pic1']) . '"/>'; ?>
                            </div>
                            <div class="carousel-item">
                                <?php echo '<img class="d-block w-100 size"  alt="Second slide" src="data:image/jpeg;base64,' . base64_encode($row['pic2']) . '"/>'; ?>
                            </div>
                            <div class="carousel-item">
                                <?php echo '<img class="d-block w-100 size"  alt="Third slide" src="data:image/jpeg;base64,' . base64_encode($row['pic3']) . '"/>'; ?>
                            </div>
                        </div>
                    <?php } ?>
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

            <!-- Information of the product -->
            <div class="col-md-4">
                <div>
                    <br>
                    <?php
                    // SQL query to select data from database
                    $id = $_GET['data'];
                    $sql_1 = "SELECT DISTINCT * FROM shop WHERE id= $id ";
                    $resultset_1 = mysqli_query($connection, $sql_1);
                    // LOOP TILL END OF DATA
                    while ($row = mysqli_fetch_assoc($resultset_1)) {
                    ?>
                        <p>UcanClaim</p>
                        <!-- 22" x 28" - Assorted Colors - 50/ Carton -->
                        <h2><?php echo $row['name']; ?></h2><br>
                        <p><?php echo $row['description']; ?></p>


                        <div>
                            <b style="font-size:18px;" id="price1"><?php echo $row['cost']; ?>₪</b>
                            <p id="dropdown"></p>
                        </div>
                    <?php } ?>
                    <br>
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
                <div id="container"></div>
                <div id="update" style="display:none"></div>
                <script async src="https://pay.google.com/gp/p/js/pay.js" onload="onGooglePayLoaded(document.getElementById('price1').innerHTML)"></script>
            </div>

            <section class="pt-4 pb-4">
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <h5 class="mb-3">You may also like </h5>
                        </div>
                        <div class="col-8 mr-auto">
                            <a class="btn mb-2 mr-1 colo marg" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                                <i class="fa fa-arrow-left"></i>
                            </a>
                            <a class="btn mb-2 colo" href="#carouselExampleIndicators2" role="button" data-slide="next">
                                <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                        <div class="col-12">
                            <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="row">
                                            <?php
                                            $sql1 = "SELECT DISTINCT * FROM shop WHERE NOT id= $id LIMIT 3";
                                            $resultset1 = mysqli_query($connection, $sql1);
                                            ?>
                                            <?php
                                            // LOOP TILL END OF DATA
                                            while ($row = mysqli_fetch_assoc($resultset1)) {
                                            ?>
                                                <div class="col-md-4 mb-3">
                                                    <div class="card" style="border: none;">
                                                        <?php echo '<img class="img-fluid im" alt="product" src="data:image/jpeg;base64,' . base64_encode($row['photo']) . '"/>'; ?>
                                                        <div class="card-body">
                                                            <a href="../pageShop/product.php?data=<?php echo $row['id'] ?>"><b class="b_1" class="card-title"><?php echo $row['name']; ?></b></a>
                                                            <p class="p_1" id="price1"><?php echo $row['cost']; ?>₪</p>

                                                        </div>

                                                    </div>
                                                </div>

                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="row">
                                            <?php
                                            $sql2 = "SELECT DISTINCT * FROM shop WHERE NOT id= $id LIMIT 3, 3;";
                                            $resultset2 = mysqli_query($connection, $sql2);
                                            ?>
                                            <?php
                                            while ($row = mysqli_fetch_assoc($resultset2)) {
                                            ?>
                                                <div class="col-md-4 mb-3">
                                                    <div class="card" style="border: none;">
                                                        <?php echo '<img class="img-fluid im" alt="product" src="data:image/jpeg;base64,' . base64_encode($row['photo']) . '"/>'; ?>
                                                        <div class="card-body">
                                                            <a href="../pageShop/product.php?data=<?php echo $row['id'] ?>"><b class="b_1" class="card-title"><?php echo $row['name']; ?></b></a>
                                                            <p class="p_1" id="price1"><?php echo $row['cost']; ?>₪</p>
                                                        </div>

                                                    </div>
                                                </div>

                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <script type="text/javascript">
                var element = document.getElementById('update');
                element.addEventListener('DOMSubtreeModified', updateModified);


                function updateModified(e) {
                    console.log(element.innerHTML);

                    if (element.innerHTML == "success") {
                        <?php
                        $sql1 = "UPDATE shop SET status=status-1 WHERE id=1 LIMIT 1";

                        if ($connection->query($sql1) === TRUE) {
                            echo "success";
                        } else {
                            echo "Error updating record: " . $connection->error;
                        }
                        ?>
                    }
                }
            </script>

    </main>
    <!-- footer -->
    <div id="footer"></div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    $("document").ready(function() {
        //  navbar
        $("#navbar").load("../common/NavBar.html");
        //  footer
        $("#footer").load("../common/footer.html");
    });
</script>

</html>