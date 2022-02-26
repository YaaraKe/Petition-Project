<?php
$sname = "localhost";
$unmae = "nofarrei_user";
$password = "12345";
$db_name = "nofarrei_Petition";
$conn = mysqli_connect($sname, $unmae, $password, $db_name);
if (!$conn) {

    error_log("logging failed",0);

}
?>
