<?php
// Include the database connection file (connect.php)

include ("dbutilacce")




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $re_password = $_POST["re_password"];
    $gender = $_POST["gender"];
    $role = $_POST["role"];
    $status = $_POST["status"];

    // Check if passwords match
    if ($password != $re_password) {
        echo "Passwords do not match.";
        // You can handle this error more gracefully, like displaying a message to the user.
    } else {
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data into the database
        $sql = "INSERT INTO users (name, email, password, gender, role, status)
                VALUES ('$name', '$email', '$hashed_password', '$gender', '$role', '$status')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
            // You can redirect to a login page or perform other actions here.
        } else {
            echo "Error: " . $sql . "<br>" .  mysqli_error($conn); // Add this line to display the MySQL error message;
        }
    }
}

// Close the database connection
$conn->close();
?>
