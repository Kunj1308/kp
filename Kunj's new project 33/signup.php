<?php
require("conn.php");
?>
<?php

if(isset($_POST["signup"]))
{
$id = $_POST['id'];
$name = $_POST['name'];
$mm = $_POST['mobile'];
$email = $_POST['email'];
$password = $_POST['pass'];
$client = $_POST['client'];
$site = $_POST['site'];

$query = "INSERT INTO kunj1308 VALUES ('$id','$name',$mm,'$email','$password','$client','$site')";
echo "".$query;
if(mysqli_query($con,$query))
    header("location:log.php");
 else    echo"no";

}


?>