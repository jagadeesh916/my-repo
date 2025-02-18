<?php
$servername = "localhost";
$username = "root";
$password = "krithick@1234";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $conn->real_escape_string($_POST['title']);
    $date = $_POST['date'];

    $sql = "INSERT INTO events (title, event_date) VALUES ('$title', '$date')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Event added successfully!";
        header("Location: admin.php"); // Redirect back to admin panel
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
