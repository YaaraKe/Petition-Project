<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signed a Petiton</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="petitions_errors.css" rel="stylesheet">
    <script src="alertmail.js"></script>
    <script src="newSignMail.js"></script>
     <link rel="stylesheet" href="signed_petition.css">
    <!-- integration to Emailjs -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
    <script type="text/javascript">
        (function() {
            emailjs.init("AvaDpF5PyCEE6uPYR");
        })();
    </script>
</head>

<body>

    <!-- IMPORT BOOTSTRAP SCRIPTS-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <!-- NavBar -->
    <nav id="navbar"> </nav>

    <br>

    
    <br><br>

    <?php
     session_start();
    include 'db_conn.php';
    $id = $_GET['data'];
    $id = mysqli_real_escape_string($conn, $id);

    $sql = "SELECT * FROM all_petitions WHERE `id_petition`='" . $id . "'";
    $resultset = mysqli_query($conn, $sql);

    // LOOP TILL END OF DATA
    while ($row = mysqli_fetch_assoc($resultset)) {
    ?>

    <main class="petition">
        <!-- the petition: -->
        <div class="petition_box">
            <h1 class="title"> <u><?php echo $row['title']; ?></u> </h1>
            <small><?php echo $row['date']; ?> </small>
            <br><br>
            <div class="content">
            <?php echo $row['content']; ?>
            <br><br>
</div>
        </div>

        <!-- how many signatures -->
        <?php
        $sql1 = "SELECT COUNT(*) FROM signatures WHERE `id_petition`='" . $id . "'";
        $result = mysqli_query($conn, $sql1);
        $count_signatures = mysqli_fetch_array($result);

        ?>
        <!-- <h3  style=" font-family: 'Times New Roman';" > how many signatures do we have? <?php echo $count_signatures[0]; ?> </h3> -->

        <!-- retrieve signatures goal -->
        <?php
        $sql2 = "SELECT target_singatures FROM all_petitions WHERE `id_petition`='" . $id . "'";
        $result1 = mysqli_query($conn, $sql2);
        $target_signatures = mysqli_fetch_row($result1);

        ?>
        <!--  progress bar -->
        <h1>Signtures Progress</h1>
        <div class="w3-grey w3-round-large">
            <div class="w3-container w3-blue w3-round-large" style="width:<?php echo ($count_signatures[0] / $target_signatures[0]) * 100 ?>%">
                <?php echo $count_signatures[0] ?>/<?php echo $target_signatures[0] ?></div>
        </div>

        <hr>
       
        <!-- Sign on a petition -->

        <div class="row mb-4" id="SignForm">
            <form method="post" name="signedForm" action="">
                <div class="header">
                    <h3> Sign on a petition</h3 </div>
                    <!-- Name Input -->
                    <div class="form-control ">
                        <label> Full Name:</label>
                        <input id="Namef" type="text" name="signName" placeholder="Name" required>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                        </svg>
                             
                        <small> Error message </small>
                      

                    </div>
           
<br>
            
                       <button type="submit" name="submit" id="sign" onclick="return sign_name()" class="btn custom btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                        </svg> | Sign</button>   
                      
                   
                </div>
            </form>
        </div>

        <script src="validations.js"></script>
        </main>
    
</body>

</html>

<?php
        $email = $_SESSION['user_name'];
        $sql_two = " SELECT email_signed, id_petition FROM signatures where id_petition='" . $id . "' AND email_signed='" . $email . "' ";
        $result = mysqli_query($conn, $sql_two);
        if ($result === FALSE) {
            die(mysqli_error($conn));
        }
        //user cant signed twice
        if (mysqli_num_rows($result) != 0) {
            echo " <p class='no_petition' style='color: red;'> You have already signed this petition <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pen-fill' viewBox='0 0 16 16'>
  <path d='m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z'/>
</svg></p>";

            echo "<script> document.getElementById('SignForm').remove(); </script>";
        }


        // send the data to db
        if (isset($_POST['submit'])) {
            $name =  $_REQUEST['signName'];
            $sql = "INSERT INTO `signatures` VALUES ( '$email', '$id', '$name')";
            if (mysqli_query($conn, $sql)) {
                //Check how many signatures do we have and what is the number of signature to notify the owner
                $sql3 = " SELECT * FROM all_petitions WHERE `id_petition`='" . $id . "' AND `alert_singatures` = (SELECT COUNT(*) FROM signatures WHERE `id_petition`='" . $id . "')  ";
                $record_a = mysqli_query($conn, $sql3);
                if ($record_a) {
                    $result_a = mysqli_fetch_assoc($record_a);
                    // insert into alert varaiable the number of signatures to notify the petition owner
                    $alert = $result_a['alert_singatures'];
                    $p_name = $result_a['title'];
                    $owner_mail = $result_a['email'];
?>
            <script type="text/javascript">
                var alertS = "<?php echo $alert; ?>";
                var title = "<?php echo $p_name; ?>";
                var mail = "<?php echo $owner_mail; ?>";
            </script>
            <?php echo "<script>sendalert(alertS,title,mail); </script>"
            ?>
            ?>
        <?php
                }
                // retrieve petition title
                $sql4 = "SELECT * FROM all_petitions WHERE `id_petition`='" . $id . "'";
                $record4 = mysqli_query($conn, $sql4);
                $result4 = mysqli_fetch_assoc($record4);
                $p_title = $result4['title'];
        ?>
        <!-- sending confirmation mail -->
        <script type="text/javascript">
            var p_title = "<?php echo $p_title; ?>";
            var email = "<?php echo $email; ?>";
        </script>
        <?php echo "<script>newsign(p_title,email); </script>"
        ?>
        ?>
        <script>
            alert("You signed successfully.");
            window.location = 'all_petitions.php';
        </script>
<?php
            } else {
                echo " Sorry please try again later $sql. "
                    . mysqli_error($conn);
            }
        }
    }
?>

    <!-- footer -->
<div id="footer"></div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    $("document").ready(function() {
        //  navbar
        $("#navbar").load("../common/NavBar.php");
        //  footer
        $("#footer").load("../common/footer.html");
    });
</script>