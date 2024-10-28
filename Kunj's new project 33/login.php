<?php
session_start(); 
require("conn.php");

// Check if POST variables are set
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['pass']) ? $_POST['pass'] : '';

$query = "SELECT * FROM `kunj1308` WHERE `u_mail`='$email' AND `u_pass`='$password'";
$result = mysqli_query($con, $query);

if ($user = mysqli_fetch_assoc($result)) {
    $id = $user['u_id']; // Get the user ID from the fetched result
    // Modify the query if logout_time doesn't exist
    $log_login_sql = "INSERT INTO audit (u_id, a_id, login_time) VALUES ('$id', '', CURRENT_TIMESTAMP)";
    
    // If you want to keep logout_time in the SQL, ensure it exists in the table.
    // Otherwise, just remove it as shown above.
    mysqli_query($con, $log_login_sql);

    $_SESSION['id'] = $id; // Store the user ID in the session
    $_SESSION['username'] = $user["u_mail"];

    header("Location:h.php");
    exit();
} else {
    header("Location:log.php");
}
?>
