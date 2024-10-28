<?php
   session_start();
   if(!isset($_SESSION["username"]))
   {
      header("Location:log.php");
      die();
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SP</title>
    <link rel="stylesheet" href="h1.css">
</head>
<body>
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">SP</h2>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="historry.php">HISTORY</a></li>
                </ul>
            </div>
            <form action="adminlogout.php" method="POST"><button class="btn" name="logout">Log out</a></button>
            </form>
        </div> 
        <div class="content">
            <h1>Hi ,<br><span>Admin</span> <br>Have a Nice Day</h1>
        </div>
    </div>
</body>
</html>


<style>
.menu{
    width: 400px;
    float: left;
    height: 70px;
    margin-left: 500px;
}
ul{
    float: left;
    display: flex;
    justify-content: center;
    align-items: center;
}
ul li{
    list-style: none;
    margin-left: 75px;
    margin-top: 27px;
    font-size: 15px;
}
ul li a{
    text-decoration: none;
    color: #fff;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-weight: bold;
    transition: 0.4s ease-in-out;
    display: inline;
    white-space: nowrap;
}
ul li a:hover{
    color: #ff7200;
}
.btn{
    width: 100px;
    height: 40px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-weight: bold;
    background: #ff7200;
    background: transparent;
    border: 3px solid #ff7200;
    border-radius: 10px;
    margin-top: 13px;
    color: #fff;
    font-size: 15px;
    transition: 0.4s ease-in-out;
    cursor: pointer;
}
.btn:hover{
    color: #000000;
}
.btn:focus{
    outline: none;
}
</style>
