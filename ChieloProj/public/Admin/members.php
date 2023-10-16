<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sd_208";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to toggle user activation status
function toggleActivation($userId, $conn) {
    $sql = "UPDATE users SET login_status = NOT login_status WHERE ID = $userId";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to redirect to the edit page
function redirectToEditPage($userId) {
    // Implement the edit functionality here (e.g., redirect to an edit page).
    // You can use JavaScript to redirect the user.
    echo "<script>window.location.href = 'edit.php?userId=" . $userId . "';</script>";
    exit;
}

// Handle user actions (edit and toggle activation)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["action"]) && isset($_POST["userId"])) {
        $action = $_POST["action"];
        $userId = $_POST["userId"];
        
        if ($action === "edit") {
            redirectToEditPage($userId);
        } elseif ($action === "toggleActivation") {
            $success = toggleActivation($userId, $conn);
            if ($success) {
                echo json_encode(["success" => true]);
            } else {
                echo json_encode(["success" => false, "message" => "Failed to toggle activation status."]);
            }
            exit;
        }
    }
}

// SQL query to fetch records
$sql = "SELECT ID, name, email, role, gender, login_status FROM users";
$result = $conn->query($sql);

// Start generating the HTML for the table with Bootstrap classes
$html = '<table id="userTable" class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Gender</th>
                    <th>Login Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>';

// Loop through the query results and populate the table rows
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $html .= '<tr';
        if ($row["login_status"] == 0) {
            $html .= ' class="deactivated"';
        }
        $html .= '>';
        $html .= '<td>' . $row["ID"] . '</td>';
        $html .= '<td>' . $row["name"] . '</td>';
        $html .= '<td>' . $row["email"] . '</td>';
        $html .= '<td>' . $row["role"] . '</td>';
        $html .= '<td>' . $row["gender"] . '</td>';
        $html .= '<td>' . ($row["login_status"] == 1 ? "Active" : "Deactivated") . '</td>';
        $html .= '<td>';
        $html .= '<button class="btn btn-primary btn-sm" onclick="handleUserAction(\'edit\', ' . $row["ID"] . ')">Edit</button>';
        $html .= '<button class="btn btn-danger btn-sm" onclick="handleUserAction(\'toggleActivation\', ' . $row["ID"] . ')">' . ($row["login_status"] == 1 ? "Deactivate" : "Activate") . '</button>';
        $html .= '</td>';
        $html .= '</tr>';
    }
} else {
    $html .= '<tr><td colspan="7">No records found</td></tr>';
}

// Close the HTML table
$html .= '</tbody></table>';

// Send the HTML table to the client
echo $html;

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="members.css">
    <title>User Table</title>
    <script>
        // JavaScript function to handle user actions
        function handleUserAction(action, userId) {
    // Define the appropriate URL based on the action (activate or deactivate)
    const url = action === 'toggleActivation' ? 'activate.php' : 'deactivate.php';

    // Send an AJAX request to handle user actions
    const xhr = new XMLHttpRequest();
    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            if (response.success) {
                // Handle success as needed (e.g., update the UI)
                if (action === 'toggleActivation') {
                    const button = document.querySelector('button[data-userid="' + userId + '"]');
                    if (button) {
                        button.textContent = response.message;
                    }
                }
            } else {
                // Handle failure (e.g., display an error message)
                alert('Error: ' + response.message);
            }
        }
    };
    xhr.send('action=' + action + '&userId=' + userId);
}

    </script>
</head>
<body
