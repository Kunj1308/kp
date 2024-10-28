<?php 
   session_start();
   if(isset($_SESSION["username"]))
   {
      session_destroy();
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SP</title>
    <link rel="stylesheet" href="login.css">
</head>
<body action="login.php">
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">SP</h2>
            </div>
                <div class="form">
                    <h2>Login Here</h2>
                    <form action="login.php" method="POST">
                    <input type="email" name="email" placeholder="Enter Email Here">
                    <input type="password" name="pass" placeholder="Enter Password Here">
                    <button class="btnn" name="login"><a href="login.php">Login</a></button>
                    <p class="link">Don't have an account<br>
                    <a href="sign.html">Sign up </a> here</a></p>
                    <p class="link">Admin account<br>
                    <a href="admin.html">Admin</a> here</a></p>
                    </form>
                </div>
                    </div>
                </div>
        </div>
    </div>
</body>
</html>