<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        /* Gaya dasar */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        /* Header */
        .header {
            background-color: #ff007f;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
        }

        /* Navigasi */
        .nav {
            display: flex;
            justify-content: center;
            background-color: #ff99cc;
            padding: 10px 0;
        }

        .nav a {
            text-decoration: none;
            color: #fff;
            margin: 0 15px;
            font-weight: bold;
            transition: color 0.3s;
        }

        .nav a:hover {
            color: #ff007f;
        }

        /* Kontainer utama */
        .main-container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 20px;
            gap: 20px;
            flex-wrap: wrap;
        }

        /* Kartu */
        .card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .card h2 {
            color: #ff007f;
            margin-bottom: 10px;
        }

        .card p {
            color: #666;
            font-size: 14px;
        }

        /* Footer */
        .footer {
            background-color: #ff007f;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            margin-top: 20px;
            position: relative;
        }

        .footer p {
            margin: 0;
            font-size: 14px;
        }

        .footer a {
            color: #fff;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
        <p>Your personalized dashboard</p>
    </div>

    <!-- Navigasi -->
    <div class="nav">
        <a href="#">Home</a>
        <a href="#">Profile</a>
        <a href="#">Settings</a>
        <a href="logout.php">Logout</a>
    </div>

    <!-- Konten utama -->
    <div class="main-container">
        <!-- Card 1 -->
        <div class="card">
            <h2>My Tasks</h2>
            <p>View and manage your daily tasks.</p>
        </div>

        <!-- Card 2 -->
        <div class="card">
            <h2>Notifications</h2>
            <p>You have 5 new messages and 3 alerts.</p>
        </div>

        <!-- Card 3 -->
        <div class="card">
            <h2>Analytics</h2>
            <p>Track your progress and stats.</p>
        </div>

        <!-- Card 4 -->
        <div class="card">
            <h2>Community</h2>
            <p>Join discussions with fellow users.</p>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; <?php echo date("Y"); ?> Your Company. All Rights Reserved. | <a href="#">Privacy Policy</a></p>
    </div>
</body>
</html>
