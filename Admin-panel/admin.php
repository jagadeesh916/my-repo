<?php
$servername = "localhost";
$username = "root";
$password = "krithick@1234";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Add Event</title>
    <link rel="stylesheet" href="styles.css"> <!-- Linking CSS file -->
    <style>
        /* General Page Styling */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
*{
    margin:0;
    padding:0;
    font-family: "poppins";
}
/* Container */
.container {
    background: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    width: 400px;
    text-align: center;
}

/* Heading */
h2 {
    color: #333;
    margin-bottom: 15px;
}

/* Form Styling */
form {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

/* Labels */
label {
    font-weight: bold;
    text-align: left;
}

/* Input Fields */
input {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 100%;
    font-size: 16px;
}

/* Submit Button */
button {
    background: #007BFF;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background 0.3s ease;
}

button:hover {
    background: #0056b3;
}

/* Event List */
.event-list {
    list-style-type: none;
    padding: 0;
    margin-top: 20px;
    text-align: left;
}

.event-list li {
    background: #f1f1f1;
    padding: 10px;
    margin: 5px 0;
    border-radius: 5px;
}
#container{
    border: 4px solid #eaeaea;
}
    </style>
</head>
<body>
    <center>
<div class="container" id="container">
<img src="/COLLEGE_WEB_1/assets//img//TNC_logo.png" alt="" style="height: 50px;width:100px"><h2>Welcome to TNC Admin Panel</h2>
        <p>Only authorized users can access this page.</p> <br>
        <a href="logout.php" ><button style="background-color: #a30000;">Logout</button></a>
    </div> 
    </center>
    <br>
    <div style="display: flex; justify-content:space-around">
    <div class="container">
        <h2>Add New Event</h2>
        <form action="add-events.php" method="POST">
            <label for="title">Event Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="date">Event Date:</label>
            <input type="date" id="date" name="date" required>

            <button type="submit" style="background-color: #a30000;">Add Event</button>
        </form>
        <br>
    </div>
    <div>
        <h2>Existing Events</h2>
        <ul class="event-list">
            <?php
            $sql = "SELECT * FROM events ORDER BY event_date DESC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<li><strong>{$row['event_date']}</strong> - {$row['title']}</li>";
                }
            } else {
                echo "<li>No events found.</li>";
            }
            ?>
        </ul>
    </div>
    </div>
</body>
</html>
