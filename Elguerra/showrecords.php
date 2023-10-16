<!DOCTYPE html>
<html>
<head>
  <style>
  body {
    background: linear-gradient(to bottom, #99bfff,#c2ebff, #a3adff); /* Gradient background */
    font-family: Arial, sans-serif;
    margin-top: 5%;
    margin-left: 18%;
    padding: 0;
    justify-content: center;
    /* display: flex;
    justify-content: center;
    align-items: center; */
    height: 85vh;
  }
  /* Style for the table */
  table {
    width: 80%;
    border-collapse: collapse;
    font-size: 16px;
    border-radius: 8px;
    overflow: hidden;
  }


  th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }


  th {
    background-color:#b3d9ff;
    color: black;
  }


  tr:nth-child(odd), tr:nth-child(even) {
    background-color: #e6f2ff;
    color: black;
  }
  tr:hover {
    background-color: #99c7ff;
  }


</style>
</head>
<body>
<!-- <div style="text-align: center; margin-bottom: 20px; "> -->
  <h1 style= "margin-top: 10%;">List of Users</h1>
<!-- </div>  -->
<br>


<?php
// Define your database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sd_208";


// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);


// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['edit'])) {
  // Handle edit action here
  $ID = $_POST['edit_ID'];
  $newname = $_POST['new_name'];
  $newemail = $_POST['new_email'];
  $newpassword = $_POST['new_password'];
  $newrole = $_POST['new_Role'];
  $newgender = $_POST['new_gender'];
  $newstatus = $_POST['new_Status'];


  $sql = "UPDATE users SET name='$newname', email='$newEmail', password='$newPassword', role='$newRole', status='$newStatus',WHERE id=$id";


  if ($conn->query($sql) === TRUE) {
      echo '<script>alert("Record updated successfully.")</script>';
  } else {
      echo "Error updating record: " . $conn->error;
  }
}


if (isset($_POST['delete'])) {


  $id = $_POST['delete_id'];


  // Perform a DELETE query to remove the record
  $sql = "DELETE FROM users WHERE id=$id";


  if ($conn->query($sql) === TRUE) {
      echo '<script>alert("Record deleted successfully.")</script>';
  } else {
      echo "Error deleting record: " . $conn->error;
  }
}




// Define the SQL query to select all user records
$sql = "SELECT ID, Firstname, Lastname, Address, Email, Password, Role, Status FROM users";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
  echo "<table>";
  echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Address</th><th>Email</th><th>Password</th><th>Role</th><th>Status</th></tr>";
  // Output data of each row
  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["ID"] . "</td>";
    echo "<td>" . $row["Firstname"] . "</td>";
    echo "<td>" . $row["Lastname"] . "</td>";
    echo "<td>" . $row["Address"] . "</td>";
    echo "<td>" . $row["Email"] . "</td>";
    echo "<td>" . $row["Password"] . "</td>";
    echo "<td>" . $row["Role"] . "</td>";
    echo "<td>" . $row["Status"] . "</td>";
    echo "<td>
    <button type='button' class='edit-btn' data-ID='" . $row["ID"] . "' data-Firstname='" . $row["Firstname"] . "' data-Address='" . $row["Address"] . "' data-Email='" . $row["Email"] . "' data-Password='" . $row["Password"] . "' data-Role='" . $row["Role"] . "' data-Status='" . $row["Status"] . "' style = 'background-color: white; color: black; border: 1px solid black; border-radius: 3px;'>Edit</button>
    <form method='post' style='display:inline;'>
        <input type='hidden' name='delete_id' value='" . $row["ID"] . "'>
        <input type='submit' name='delete' value='Delete'>
    </form>
  </td>";
     
    echo "</tr>";
  }
  echo "</table>";
} else {
  echo "No data found.";
}


// Close the database connection
$conn->close();
?>


<center>
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>EDIT USER</h2>
        <form id="editForm">
            <label for="new_Firstname">ID:</label>
            <input type="text" id="new_ID" name="new_ID">


            <label for="new_Firstname">Firstname:</label>
            <input type="text" id="new_Firstname" name="new_Firstname">
           
            <label for="new_Lastname">Lastname:</label>
            <input type="text" id="new_Lastname" name="new_Lastname">
           
            <label for="new_Address">Address:</label>
            <input type="text" id="new_Address" name="new_Address">
           
            <label for="new_Email">Email:</label>
            <input type="email" id="new_Email" name="new_Email">
           
            <label for="new_Password">Password:</label>
            <input type="password" id="new_Password" name="new_Password">
           
            <label for="new_Role">Role:</label>
            <input type="text" id="new_Role" name="new_Role">
           
            <label for="new_Status">Status:</label>
            <input type="text" id="new_Status" name="new_Status">
           
            <button type="submit" id="submit">Save</button>
        </form>
    </div>
</div>


</center>


<style>
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        justify-content: center;
        align-items: center;
        color: black;
    }


    .modal-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        width: 50%;
        align-content: center;
        margin: 80px 0 0 0;
    }


    .close {
        float: right;
        cursor: pointer;
        margin: 5px 0 2% 0;
    }


    #editForm {
        display: flex;
        flex-direction: column;
    }


    h2 {
        margin: 5px 0 2% 0;
        font-weight: bolder;
    }


    label {
        margin-top: 10px;
        align-self: flex-start;
    }


    input {
        margin-bottom: 10px;
        padding: 5px;
    }


    button {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px;
        cursor: pointer;
    }
    button:hover{
      color: #9ec7ff;
    }
</style>


<script>
var editModal = document.getElementById('editModal');
var editBtns = document.getElementsByClassName('edit-btn');
var closeBtn = document.getElementsByClassName('close')[0];
var editForm = document.getElementById('editForm');
var editID = document.getElementById('new_ID'); // Corrected ID
var newFirstname = document.getElementById('new_Firstname');
var newLastname = document.getElementById('new_Lastname');
var newAddress = document.getElementById('new_Address');
var newEmail = document.getElementById('new_Email');
var newPassword = document.getElementById('new_Password');
var newRole = document.getElementById('new_Role');
var newStatus = document.getElementById('new_Status');


for (var i = 0; i < editBtns.length; i++) {
    editBtns[i].addEventListener('click', function () {
        editModal.style.display = 'block';
        editID.value = this.getAttribute('data-ID');
        newFirstname.value = this.getAttribute('data-Firstname');
        newLastname.value = this.getAttribute('data-Lastname');
        newAddress.value = this.getAttribute('data-Address');
        newEmail.value = this.getAttribute('data-Email');
        newPassword.value = this.getAttribute('data-Password');
        newRole.value = this.getAttribute('data-Role');
        newStatus.value = this.getAttribute('data-Status');
    });
}


closeBtn.addEventListener('click', function () {
    editModal.style.display = 'none';
});


editForm.addEventListener('submit', function (e) {
    e.preventDefault();
    // Corrected variable name
    var editID = document.getElementById('new_ID');
    var newFirstname = document.getElementById('new_Firstname');
    var newLastname = document.getElementById('new_Lastname');
    var newAddress = document.getElementById('new_Address');
    var newEmail = document.getElementById('new_Email');
    var newPassword = document.getElementById('new_Password');
    var newRole = document.getElementById('new_Role');
    var newStatus = document.getElementById('new_Status');


    var formData = new FormData();
    formData.append('edit_ID', editID.value);
    formData.append('new_Firstname', newFirstname.value);
    formData.append('new_Lastname', newLastname.value);
    formData.append('new_Address', newAddress.value);
    formData.append('new_Email', newEmail.value);
    formData.append('new_Password', newPassword.value);
    formData.append('new_Role', newRole.value);
    formData.append('new_Status', newStatus.value);


    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
                editModal.style.display = 'none';
            } else {
                // Handle errors here
                console.error(xhr.statusText);
            }
        }
    };
    xhr.open('POST', 'Included/php/update_user.php', true);
    xhr.send(formData);
});




</script>


</body>
</html>

