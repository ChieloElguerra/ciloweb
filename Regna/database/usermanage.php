<?php
session_start();
if ($_SESSION["role"] == null) {
    header("Location: login.html");
} else {
    if ($_SESSION["role"] == "user") {
    } 
    else {
    header("Location: login.html");
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserManage</title>
</head>
<body>
    <h1>user manage</h1>
    <button><a href="logout.php">Logout</a></button>
    
</body>
</html>
