<?php
include "navbar.php";
session_start(); 
require("conn.php");

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    // Redirect to login or error page if not logged in
    header("Location: login.php");
    exit();
}

$id = $_SESSION['id'];

// Ensure that $id is an integer to prevent SQL injection
$id = intval($id);

$query = "SELECT * FROM audit WHERE u_id = $id";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) > 0) {
    echo "<table border='1'>";
    echo "<tr><th>User Id</th><th>Audit Id</th><th>Login Date and Time</th><th>Logout Date and Time</th></tr>"; 
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['u_id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['a_id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['login_time']) . "</td>";
        echo "<td>" . htmlspecialchars($row['logout_time']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<script>alert('No audit records found.')</script>";
    header("Location: admin.html");
}
?>
