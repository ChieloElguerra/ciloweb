<?php

session_start();

if ($_SESSION["role"] == null) {

    header("Location: login.html");

} else {
    if ($_SESSION["role"] == "admin") {
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meeting Schedule Dashboard</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        table {
            margin: 20px auto;
            width: 80%;
            border-collapse: collapse;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        table th {
            background-color: #007BFF;
            color: white;
        }

        div {
            margin: 20px auto;
            width: 80%;
            text-align: center;
        }

        select, button {
            padding: 10px;
            margin: 5px;
            width: 100%;
        }

        #btn {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }
        #logout{
            width: 10%;
            height: 3vh;
            margin-left: 85%;
        }
        #logout a{
            text-align: center;
            text-decoration: none;
        }
    </style>
<body>
    <h1>Meeting Schedule Dashboard</h1>
        <button id="logout"><a href="logout.php">Logout</a></button>
    <table>
        <tr>
            <th>Date</th>
            <th>Time</th>
            <th>Topic</th>
        </tr>
        <!-- Meetings will be dynamically added here -->
    </table>

    <div>
        <h2>Add a New Meeting</h2>
        <select id="meeting-date">
            <option value="2023-09-22">2023-09-22</option>
            <option value="2023-09-23">2023-09-23</option>
            <option value="2023-09-24">2023-09-24</option>
            <!-- Add more date options as needed -->
        </select>
        <select id="meeting-time">
            <option value="09:00">09:00 AM</option>
            <option value="10:00">10:00 AM</option>
            <option value="11:00">11:00 AM</option>
            <!-- Add more time options as needed -->
        </select>
        <select id="meeting-topic">
            <option value="Topic 1">Topic 1</option>
            <option value="Topic 2">Topic 2</option>
            <option value="Topic 3">Topic 3</option>
            <!-- Add more options as needed -->
        </select>
        <button onclick="addMeeting()" id="btn">Add Meeting</button>
    </div>

    <script>
        function addMeeting() {
            const date = document.getElementById('meeting-date').value;
            const time = document.getElementById('meeting-time').value;
            const topic = document.getElementById('meeting-topic').value;

            if (date && time && topic) {
                const table = document.querySelector('table');
                const newRow = table.insertRow(-1);
                const dateCell = newRow.insertCell(0);
                const timeCell = newRow.insertCell(1);
                const topicCell = newRow.insertCell(2);

                dateCell.textContent = date;
                timeCell.textContent = time;
                topicCell.textContent = topic;

                // Reset dropdowns to the default values
                document.getElementById('meeting-date').value = '2023-09-22';
                document.getElementById('meeting-time').value = '09:00';
                document.getElementById('meeting-topic').value = 'Topic 1';
            }
        }
    </script>
</body>
</html>
