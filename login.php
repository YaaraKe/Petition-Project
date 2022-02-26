<?php
session_start(); 

include "db_conn.php";


if (isset($_POST['uname']) && isset($_POST['password'])) {
    
    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = validate($_POST['uname']);

    $upass = validate($_POST['password']);

    $pass=md5($upass);
    
    if (empty($uname)) {
        
        header("Location: index.php?error=User Name is required");

        exit();

    }else if(empty($upass)){

        header("Location: index.php?error=Password is required");

        exit();

    }else{


        $sql = "SELECT * FROM users WHERE user_name='$uname' AND upassword='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['user_name'] === $uname && $row['upassword'] === $pass) {

                error_log("Logged in",0);
                $_SESSION['user_name'] = $row['user_name'];

                header("Location: home.php");

                exit();

            }else{

                header("Location: index.php?error=Incorect User name or password");

                exit();

            }

        }else{

            header("Location: index.php?error=Incorrect User name or password");

            exit();

        }

    }

}else{

    header("Location: index.php");

    exit();

}