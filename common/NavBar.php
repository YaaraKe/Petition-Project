    <!-- nav bar for the website -->
    <br>
    <nav class="navbar navbar-expand-md navbar-light" style="background-color :#F0B27A">

        <a class="navbar-brand" href="#">
            <img src="../common/UcanClaim.png" width="85" height="40" class="d-inline-block align-top" alt="">
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
                    <li class="nav-item active">
                        <a class="nav-link" href="../cart.php">Cart<span class="sr-only"></span></a>
                    </li>

                </ul>



                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <?php
                        $connection = mysqli_connect('localhost', 'root', '', 'test') or die('connection failed');
                        $select_rows = mysqli_query($connection, "SELECT * FROM `cart`") or die('query failed');
                        $row_count = mysqli_num_rows($select_rows);

                        ?>
                        <a class="nav-link" href="cart.php" class="cart">cart <span class="sr-only"><?php echo $row_count; ?></span> </a>
                    </li>
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

    <br>