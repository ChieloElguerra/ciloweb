<?php
// Database configuration
$hostname = "localhost"; // Replace with your database hostname
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$database = "sd_208"; // Replace with your database name

// Create a database connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize and validate user inputs (you should add more validation)
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']); // Store the password as-is
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);

    // SQL query to insert user data
    $sql = "INSERT INTO users (name, email, password, role, gender) 
            VALUES ('$name', '$email', '$hashed_password', '$role', '$gender')";
            

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}


// Close the database connection
$conn->close();
?>
