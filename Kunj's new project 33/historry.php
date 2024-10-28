<?php
include "navbar.php";
session_start(); 
require("conn.php");
        $query = "SELECT * FROM audit";
        $result = mysqli_query($con, $query);
         
        if (mysqli_num_rows($result) > 0) {
            echo "<table border='1'>";
            echo "<tr><th>User Id</th><th>Audit Id</th><th>Login Data and Time </th><th>Logout Data and Time </th></tr>"; 
              
            while ($row = mysqli_fetch_assoc($result)) {
               
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['u_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['a_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['login_time']) . "</td>";
                echo "<td>" . htmlspecialchars($row['logout_time']) . "</td>";
                echo "</tr>";
            }
        
       // $_SESSION['username'] = $user['name'];
        //header("Location:service.html");
        exit();
    } else {
        echo "<script>alert('Incorrect name or password. Please try again.')</script>";
        header("Location:admin.html");
    }

?>

