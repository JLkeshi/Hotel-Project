<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "admin123!";
$database = "hotelwebsite";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM hotels";
$result = $conn->query($sql);

$hotels = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $hotels[] = $row;
    }
}

$conn->close();

header('Content-Type: booking.php');
echo json_encode($hotels);
?>
