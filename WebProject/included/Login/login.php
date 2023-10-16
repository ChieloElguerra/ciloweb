<?php
// Database configuration
$hostname = "localhost"; // Replace with your database hostname
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$database = "sd_208"; // Replace with your database name

// Create a database connection
$mysqli = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Handle login form submission
if (isset($_POST['signin'])) {
    $username = $_POST['your_name']; // Update 'your_name' to match your HTML form field name
    $password = $_POST['your_pass']; // Update 'your_pass' to match your HTML form field name
    $email = $_POST['your_email']; // Get the email from the form

    // Query to retrieve user data based on the 'name' (username) and 'email' columns
    $sql = "SELECT * FROM users WHERE name = ? OR email = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // User found, fetch the user data
        $row = $result->fetch_assoc();
        $hashed_password = $row['Password']; // Get the hashed password from the database

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Passwords match; user login is successful
            // Start a session and store user information (if needed)
            session_start();
            $_SESSION['user_id'] = $row['user_id']; // Store user ID or other user data as needed
            header("Location: index.html");
            exit();
        } else {
            // Passwords do not match; login failed
            echo "Incorrect username or password.";
        }
    } else {
        // User not found; login failed
        echo "User not found.";
    }

    $stmt->close();
}

// Close the database connection
$mysqli->close();
?>
