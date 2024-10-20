<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - HOTEL GP</title>
    <link rel="stylesheet" href="admin.css">
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
    <link rel="icon" href="images/logo.png" type="image/png">
    <style>
        /* Basic CSS for demonstration purposes */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        .navbar {
            background-color: #444;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        .main-content {
            padding: 20px;
        }
        .dashboard-section {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .table-container {
            overflow-x: auto;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 10px;
        }
        .btn:hover {
            background-color: #45a049;
        }
        .customers-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .customer {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 20px;
            text-align: center;
            flex: 1;
            min-width: 200px;
        }
        .customer img {
            width: 100%;
            height: auto;
            border-radius: 50%;
            margin-bottom: 10px;
        }
        .rating {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <!-- header -->
    <header class="header">
        <div class="head-top">
            <div class="site-name">
                <span>SOCIOS HOTEL Admin Dashboard</span>
            </div>
        </div>
    </header>
    <!-- end of header -->

    <!-- navigation -->
    <nav class="navbar">
        <ul>
            <li><a href="#bookings">Bookings</a></li>
            <li><a href="#customers">Customers</a></li>
            <!-- Add more navigation items as needed -->
        </ul>
    </nav>
    <!-- end of navigation -->

    <div class="main-content">
        <div class="dashboard-section" id="bookings">
            <h2>Reservation Details</h2>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Reservation ID</th>
                            <th>User ID</th>
                            <th>Room ID</th>
                            <th>Check-in Date</th>
                            <th>Check-out Date</th>
                        </tr>
                    </thead>
                    <tbody id="reservationTableBody">
                        <?php
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

                        // Fetch reservations from database
                        $sql = "SELECT * FROM reservations";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['reservation_id'] . "</td>";
                                echo "<td>" . $row['user_id'] . "</td>";
                                echo "<td>" . $row['room_id'] . "</td>";
                                echo "<td>" . $row['check_in'] . "</td>";
                                echo "<td>" . $row['check_out'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo '<tr><td colspan="5">No reservations found</td></tr>';
                        }

                        // Close connection
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    
        <!-- Other sections as needed -->
    
        <div id="customers" class="dashboard-section">
            <!-- Customer section -->
            <h2>DEVELOPER</h2>
            <div class="customers-container">
                <!-- Placeholder for customer information -->
                <div class="customer">
                    <div class="rating">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                    </div>
                    <h3>PROGRAMMER</h3>
                    <p></p>
                    <img src="images/cus1.jpg" alt="customer image">
                    <span>Jhon Lloyd Combalicer, Canada</span>
                </div>
                <div class="customer">
                    <div class="rating">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                    </div>
                    <h3>PROGRAMMER</h3>
                    <p></p>
                    <img src="images/cus2.jpg" alt="customer image">
                    <span>Ace Alfonso, Japan</span>
                </div>
                <div class="customer">
                    <div class="rating">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                    </div>
                    <h3>DESIGNER</h3>
                    <p></p>
                    <img src="images/cus4.jpg" alt="customer image">
                    <span>Ashly Mendoza, Parian</span>
                </div>
                <div class="customer">
                    <div class="rating">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                    </div>
                    <h3>DESIGNER</h3>
                    <p></p>
                    <img src="images/cus3.jpg" alt="customer image">
                    <span>Christian Gabrielle Garces, America</span>
                </div>
            </div>
        </div>
    </div>
    <!-- end of main content -->
</body>
</html>
