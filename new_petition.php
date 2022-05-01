<?php

 include 'db_conn.php';
session_start(); 
 
 if(isset($_POST['submit'])){

    $check=getimagesize($_FILES["img"]["tmp_name"]);
   // $extensions_arr = array("jpg","jpeg","png","gif");

    // Check extension
	//if( in_array($imageFileType,$extensions_arr) ){
        if(check!==false){

        $title =  $_REQUEST['subject'];
        $photo = addslashes(file_get_contents($_FILES["img"]["tmp_name"]));
        $content =  $_REQUEST['Content'];
        $target = $_REQUEST['sign_num'];
        $email = $_SESSION['user_name'];
        $date = date("y/m/d");
        $alert = $_REQUEST['alert_sign'];
        

        $sql= "INSERT INTO `all_petitions` VALUES ( NULL, '$title', '$content', '$target', '$email', '$date', '$photo', '$alert')";

        if(mysqli_query($conn, $sql)){
            echo '<script> alert ("your petition uploaded successfully.") </script>'; 
            echo "(<script> window.location='new_petition.html';</script>)";
            //header("Location: new_petition.html");
  
        } else{
            echo " Sorry please try again later $sql. " 
                . mysqli_error($conn);
        }
    }
    else{
        echo '<script> alert ("you can insert only jpg, jpeg ,png, gif files") </script>';
    }

    }

    
  ?>