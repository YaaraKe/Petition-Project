<?php
  
$user = 'nofarrei_user';
$password = '12345'; 
$database = 'nofarrei_Petition'; 
$servername='localhost';
$mysqli = new mysqli($servername, $user, 
                $password, $database);
  
// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' . 
    $mysqli->connect_errno . ') '. 
    $mysqli->connect_error);
}
  
// SQL query to select data from database
$sql = "SELECT * FROM Knesset_Member ORDER BY full_name DESC ";
$result = $mysqli->query($sql);
$mysqli->close(); 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
    <script type="text/javascript">
        (function () {
            emailjs.init("qZZh-2WKTlDaP8qY3");
        })();
    </script>
    <script>
        function email_choesen(clicked_id){
            alert(clicked_id);
            document.getElementById("toemail").value=clicked_id;
        }
    </script>
    <link rel="stylesheet" href="kneset.css">
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
            </ul>
        </div>
    </nav>
    <br>
    <h1>Send Email to a Knesset Member</h1>
    <br>
    <div class="col-7">
        <p>To: <input type="text" id="toname" placeholder="Recipient name"> </p>
        <p>Your name: <input type="text" id="fromname" placeholder="Your name"> </p>


        <lable>Message:</lable> <br><textarea id="msg" placeholder="Your message" rows="10" cols="50"></textarea>


        <p>Recipient Email address: <input type="text" id="toemail" placeholder="example@gmail.com"></p>


        <button onclick='sendMail()'>Send Email</button>
    </div>

    <section>
        <h1>Contacts Member</h1>
        <!-- TABLE CONSTRUCTION-->
        <table>
            <tr>
                <th>Full Name</th>
                <th>Email Address</th>
                <th>Party</th>
                
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS-->
            <?php   // LOOP TILL END OF DATA 
                while($rows=$result->fetch_assoc())
                {
                    $res=$rows['Email'];
             ?>
            <tr>
                <!--FETCHING DATA FROM EACH 
                    ROW OF EVERY COLUMN-->
                <td><?php echo $rows['full_name'];?></td>
                <!-- the specific mail -->
                <td> <button onclick="email_choesen('<?php echo $res; ?>')"><?php echo $rows['Email'];?> </button></td>
                <td><?php echo $rows['Party'];?></td>
               
            </tr>
            <?php
                }
             ?>
        </table>
    </section>
    <br>


</body>

</html>



