<?php
/*session_start();

require "mail.php";

$conn = mysqli_connect('localhost', 'root', '', 'kunj1308');
if (!$conn) {
    die("Connection failed".mysqli_connect_error());
}

$message='';
$message2='';

$mode = "enter_email";
if (isset($_GET['mode'])) {
    $mode = $_GET['mode'];
}

//something is posted

if (count($_POST) > 0) {
    switch ($mode) {
        case 'enter_email':
            $email = $_POST['email'];
            //validate the email
            if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                $message = "Please enter a valid email";
            } elseif (!valid_email($email)) {
                $message = "Email entered was not found";
            } else {
                $_SESSION['forgot']['email'] = $email;
                send_email($email);

                header("Location: forgot-password.php?mode=enter_code");
                die;
            }
            
            break;

        case 'enter_code':
            $code = $_POST['code'];
            $result = code_authentication($code);

            if ($result == "The Code is Correct") {
                $_SESSION['forgot']['code'] = $code;
                header("Location: forgot-password.php?mode=enter_password");
                die;
            }else{
                $message = $result;
            }
            break;

        case 'enter_password':
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];

            if ($password != $cpassword) {
                $message = "Passwords do not match";
            } elseif(!isset($_SESSION['forgot']['email']) || !isset($_SESSION['forgot']['code'])){
                header("Location: forgot-password.php");
            die;
            } else {
                save_password($password);
                if (isset($_SESSION['forgot'])) {
                    unset($_SESSION['forgot']);
                }
                header("Location: login.php");
            die;
            }
            
            break;
        
        default:
            // code...
            break;
    }
}

function send_email($email){
    global $conn;
    $expire = time() + (60 * 10);
    $code = rand(10000,99999);
    $email=addslashes($email);

    $query = "INSERT INTO resets (Email,Code,Expire)VALUES('$email','$code','$expire')";
    $query_run = mysqli_query($conn,$query) or die("Could not update");

    //send email
    send_mail($email,'Password Reset',"Your code is " . $code);
}

function code_authentication($code){
    global $conn;
    $code = addslashes($code);
    $expire = time();
    $email = addslashes($_SESSION['forgot']['email']);

    $query = "SELECT * FROM kunj2004 WHERE code = '$code' && email = '$email' ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($conn, $query);
    if ($result) {
        if (mysqli_num_rows($result) > 0) 
        {
            $row = mysqli_fetch_assoc($result);
            if ($row['Expire'] > $expire) {
                return "The Code is Correct";
            }else{
                return "The Code Has Expired";
            }
        }else{
            return "The Code You've Entered is Incorrect";
        }
    }
    return "The Code You've Entered is Incorrect";
}

function save_password($password){
    global $conn;
    $password = $password;
    $email = addslashes($_SESSION['forgot']['email']);

    $query = "UPDATE members SET password ='$password' WHERE email = '$email' LIMIT 1";
    mysqli_query($conn,$query);
}

function valid_email($email){
    global $conn;
    $email = addslashes($email);

    $query = "SELECT * FROM members WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $query);
    if ($result) {
        if (mysqli_num_rows($result) > 0) 
        {
            return true;
        }
    }

    return false;
}
*/

session_start();
require "mail.php"; // Assuming you have a separate mail.php for sending emails

// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'kunj1308');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize messages and mode
$message = '';
$mode = "enter_email";
if (isset($_GET['mode'])) {
    $mode = $_GET['mode'];
}

// Check if something is posted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($mode) {
        case 'enter_email':
            $email = $_POST['email'];
            // Validate the email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $message = "Please enter a valid email";
            } elseif (!valid_email($email)) {
                $message = "Email entered was not found";
            } else {
                $_SESSION['forgot']['email'] = $email;
                send_email($email);
                header("Location: reset.php?mode=enter_code");
                die;
            }
            break;

        case 'enter_code':
            $code = $_POST['code'];
            $result = code_authentication($code);

            if ($result == "The Code is Correct") {
                $_SESSION['forgot']['code'] = $code;
                header("Location: reset.php?mode=enter_password");
                die;
            } else {
                $message = $result;
            }
            break;

        case 'enter_password':
            $password = $_POST['new_password'];
            $confirm_password = $_POST['confirm_password'];

            if ($password != $confirm_password) {
                $message = "Passwords do not match";
            } elseif (!isset($_SESSION['forgot']['email']) || !isset($_SESSION['forgot']['code'])) {
                header("Location: reset.php");
                die;
            } else {
                save_password($password);
                unset($_SESSION['forgot']);
                header("Location: log.html");
                die;
            }
            break;

        default:
            break;
    }
}

// Function to send reset email with code
function send_email($email) {
    global $conn;
    $expire = time() + (60 * 10); // Code valid for 10 minutes
    $code = rand(10000, 99999);
    $email = addslashes($email);

    $query = "INSERT INTO resets (Email, Code, Expire) VALUES ('$email', '$code', '$expire')";
    mysqli_query($conn, $query) or die("Could not update");

    // Send email with the reset code
    send_mail($email, 'Password Reset', "Your code is " . $code);
}

// Function to authenticate the code
function code_authentication($code) {
    global $conn;
    $code = addslashes($code);
    $expire = time();
    $email = addslashes($_SESSION['forgot']['email']);

    $query = "SELECT * FROM resets WHERE Code = '$code' AND Email = '$email' ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['Expire'] > $expire) {
            return "The Code is Correct";
        } else {
            return "The Code Has Expired";
        }
    }
    return "The Code You've Entered is Incorrect";
}

// Function to save the new password
function save_password($password) {
    global $conn;
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hashing the password for security
    $email = addslashes($_SESSION['forgot']['email']);

    $query = "UPDATE members SET password = '$hashed_password' WHERE email = '$email' LIMIT 1";
    mysqli_query($conn, $query);
}

// Function to check if email exists
function valid_email($email) {
    global $conn;
    $email = addslashes($email);

    $query = "SELECT * FROM members WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $query);
    return ($result && mysqli_num_rows($result) > 0);
}
?>