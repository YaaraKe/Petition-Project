<?php
    $sname = "localhost";
    $unmae = "nofarrei_user";
    $password = "12345";
    $db_name2 = "nofarrei_Member_of_Knesset";
    $conn = mysqli_connect($sname, $unmae, $password, $db_name2);
    if (!$conn) {
    
        error_log("logging failed",0);
    
    }
    echo "connected successfully";

    ?>