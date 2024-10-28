<?php
session_start(); 
require("conn.php");

if (isset($_POST["log"])) {
    
    $id = $_POST['id'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $query = "SELECT * FROM `admin` WHERE `a_mail`='$email' AND `a_pass`='$password'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) == 1) {
        $id = $user['a_id']; // Ensure you are using the correct user ID from the fetched result
        $log_login_sql = "INSERT INTO audit (u_id,a_id,login_time) VALUES ('$id', '',CURRENT_TIMESTAMP)";
        mysqli_query($con, $log_login_sql);

        $user = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $user['a_mail'];

    header("Location:adminshow.php");
        echo "hello";
        exit();
    } else {

        echo "<script>alert('Incorrect name or password. Please try again.')</script>";
      //  header("Location:admin.html");
    }
}

?>