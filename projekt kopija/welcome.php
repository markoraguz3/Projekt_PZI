<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
       body{ font: 14px sans-serif;  background-color: black;}
        .wrapper{ width: 350px; padding: 20px; margin-left:500px; margin-top: 80px; background-color:white;}
    </style>
</head>
<body>
<div class = "wrapper">
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    </div>
    <p>
        <a href="reset-password.php" class="btn btn-warning" style="background-color:#0099CC;">Reset Your Password</a><br></br>
        <a href="logout.php" class="btn btn-warning" style="background-color:#0099CC;">Sign Out of Your Account</a><br></br>
        <a href="index.php" class="btn btn-warning" style="background-color:#0099CC;">Book Your Flight</a><br></br>
    </p>
    </div>
</body>
</html>