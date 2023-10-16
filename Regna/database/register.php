<?php

include_once("dbconnect.php");
$conn = getConnection();


if(isset($_POST['submit'])){

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role =$_POST["role"];
    $status = $_POST["status"];


    $sql = "INSERT INTO users (firstname, lastname, address, email, password, role , status) 
    VALUES ('$firstname', '$lastname', '$address', '$email', '$password','$role','$status')";
    
    if ($conn->query($sql) === TRUE) {

    echo "<script language='javascript'>
    alert('Registered Successfully!');
    </script>";
    // $_SESSION['role'] = $row['role'];
     header( 'Location: ../login.php' );
  } else {
    echo 'Error: ' . $sql . '<br>' . $conn->error;
  }





    
 

  // if ( $conn->query( $sql ) === true ) {
  //   $result = $conn->query( $sql );
  //   $row = $result->fetch_assoc();
 

      // $_SESSION['role'] = $row['role'];
      // header( 'Location: ../login.php' );
    
 
    
    


}









?>