<?php
session_start();
require("conn.php");

// Check if the user is logged in
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    // Update the logout_time for the user's most recent login record
    $logout_sql = "UPDATE audit SET logout_time = CURRENT_TIMESTAMP WHERE u_id = '$id' AND logout_time IS NULL";
    mysqli_query($con, $logout_sql);
    // Destroy the session to log the user out
    session_destroy();
}
// Redirect to the login page after logout
header("Location: log.php");
exit();
?>
