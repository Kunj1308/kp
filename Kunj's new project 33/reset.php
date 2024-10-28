<?php
// Include your database connection
include('conn.php'); 
session_start();

if (isset($_POST['reset'])) {
    $email = $_POST['email'];
    $new_password = $_POST['new_password'];

    // Hash the new password
    $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

    // Prepare SQL query
    $query = "SELECT * FROM kunj1308 WHERE u_mail = ?";
    $stmt = $con->prepare($query);
    
    // Check if prepare() was successful
    if ($stmt === false) {
        die("Error preparing the statement: " . $con->error);
    }

    // Bind parameter and execute
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update the password
        $update_query = "UPDATE kunj1308 SET u_pass = ? WHERE u_mail = ?";
        $update_stmt = $con->prepare($update_query);

        // Check if prepare() was successful
        if ($update_stmt === false) {
            die("Error preparing the update statement: " . $con->error);
        }

        $update_stmt->bind_param('ss', $hashed_password, $email);

        if ($update_stmt->execute()) {
            echo "<script>alert('Password reset successfully.'); window.location.href = 'log.html';</script>";
        } else {
            echo "<script>alert('Error updating password. Please try again later.');</script>";
        }

        $update_stmt->close();
    } else {
        echo "<script>alert('Email not found. Please try again.');</script>";
    }

    // Close statement and connection
    $stmt->close();
    $con->close();
}
?>
