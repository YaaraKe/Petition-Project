<?php
$servername = "localhost";
$username   = "nofarrei_user";
$password   = "12345";
$dbname     = "nofarrei_Petition";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
    $trp = mysqli_query($conn, "SELECT * from shop");
    $rows = array();
    while($r = mysqli_fetch_assoc($trp)) {
        $rows[] = $r;
    }
    print json_encode($rows); //convert php data to json data
?>