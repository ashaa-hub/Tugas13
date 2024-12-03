<?php
session_start();

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "LoginSystem";

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error = ""; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hashedPassword);

    if ($stmt->fetch() && password_verify($password, $hashedPassword)) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Username atau password salah.";
    }

    $stmt->close();
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #ffe6f2; 
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #ffffff; 
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        .login-container h1 {
            color: #ff007f; 
            margin-bottom: 20px;
        }

        .login-container form {
            display: flex;
            flex-direction: column;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ff99cc; 
            border-radius: 5px;
            font-size: 16px;
        }

        .login-container input[type="text"]:focus,
        .login-container input[type="password"]:focus {
            outline: none;
            border-color: #ff007f;
            box-shadow: 0 0 5px rgba(255, 0, 127, 0.4);
        }

        .login-container button {
            background-color: #ff007f; 
            color: #ffffff;
            border: none;
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-container button:hover {
            background-color: #e60073; 
        }

        .login-container .error {
            color: red;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .login-container .footer {
            margin-top: 20px;
            font-size: 14px;
        }

        .login-container .footer a {
            color: #ff007f;
            text-decoration: none;
        }

        .login-container .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <?php if ($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="post" action="">
            <input type="text" name="username" placeholder="Enter your username" required>
            <input type="password" name="password" placeholder="Enter your password" required>
            <button type="submit">Login</button>
        </form>
        <div class="footer">
            <p>Don't have an account? <a href="register.php">Sign up</a></p>
        </div>
    </div>
</body>
</html>
