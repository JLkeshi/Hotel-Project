<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "admin123!";
$database = "hotelwebsite";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $user_id = $_POST['user_id']; // Assuming user_id is passed correctly
    $room_id = $_POST['room_id']; // Assuming room_id is passed correctly

    // Prepare SQL statement
    $sql = "INSERT INTO Reservations (user_id, room_id, check_in, check_out) 
            VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameters with correct data types
    $stmt->bind_param("iiss", $user_id, $room_id, $check_in, $check_out);

    if ($stmt->execute()) {
        // Redirect with success message
        header("Location: /FINAL%20hotel%20html/index.html?booking_success=true");
        exit();
    } else {
        // Check for specific SQL errors
        if ($stmt->errno == 1062) { // 1062 is the MySQL error code for duplicate entry
            header("Location: /FINAL%20hotel%20html/index.html?booking_success=false&error=duplicate_entry");
            exit();
        } else {
            header("Location: /FINAL%20hotel%20html/index.html?booking_success=false&error=" . urlencode($stmt->error));
            exit();
        }
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect back to index if accessed directly without POST data
    header("Location: /FINAL%20hotel%20html/index.html");
    exit();
}
?>