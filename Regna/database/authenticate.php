<?php
session_start();
include_once("dbconnect.php");
$conn = getConnection();


$username = $_POST["username"];
$password = $_POST["password"];


$sql = "SELECT * from users where email = '".$username."' and password = '".$password."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if($row["email"] == $username && $row["password"]== $password)
{
    if($row["role"]=="admin")
    {        
        header("Location: dashboard.php");
    }
    else
    {        
        header("Location: usermanage.php");
    }
    $_SESSION["role"] = $row["role"];
    
}
else
{
    header("Location: ../login.php");
}
closeConnection();


?>