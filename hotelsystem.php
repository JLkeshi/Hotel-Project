<?php
session_start(); // Start session to manage user login state

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

// Login handling
if (isset($_POST['login_email'], $_POST['login_password'])) {
    $login_email = $_POST['login_email'];
    $login_password = $_POST['login_password'];
    
    // Prepare SQL statement to retrieve user by email
    $sql = "SELECT * FROM signup WHERE Email = ?";
    $stmt = $conn->prepare($sql);
    
    // Bind parameters and execute query
    $stmt->bind_param("s", $login_email);
    $stmt->execute();
    
    // Get result set
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Verify password
        if (password_verify($login_password, $row['Password'])) {
            // Password correct, set session variable
            $_SESSION['loggedin'] = true;

            // Redirect based on user type
            if ($login_email === 'admin@gmail.com') {
                header('Location: Admin.php'); // Redirect to admin page
            } else {
                header('Location: index.html'); // Redirect to regular user page
            }
            exit; // Ensure script stops execution after redirect
        } else {
            echo "Login failed. Incorrect password for user: $login_email";
        }
    } else {
        echo "Login failed. User not found: $login_email";
    }

    // Close prepared statement
    $stmt->close();
}

// Close database connection
$conn->close();
?>
