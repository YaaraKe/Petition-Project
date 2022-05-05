<?php
 session_start();
include 'db_conn.php';
$email=$_SESSION['user_name']; 
// Check connection
 
if(isset($_REQUEST["term"])){
    // Prepare a select statement
    $sql = "SELECT * FROM all_petitions AS p WHERE (target_singatures > (SELECT COUNT(*) FROM signatures AS s WHERE p.id_petition = s.id_petition)) AND ( `title` LIKE ?) AND (p.id_petition NOT IN (SELECT id_petition FROM signatures WHERE `email_signed`='" . mysqli_escape_string($conn,$email) . "')) LIMIT 5";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        
        // Set parameters
        $param_term = '%%' . $_REQUEST["term"] . '%%';
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<div>" . $row['title'] . "</div>";
                }
            } else{
                echo "<div>No matches found</div>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
}
 
?>