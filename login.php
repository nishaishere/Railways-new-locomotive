<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root"; // Change if needed
$password = ""; // Change if needed
$dbname = "railway_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    // Check if user exists
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($pass, $row['password'])) {
            // Password is correct, start session
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header("Location: booking.php"); // Redirect to ticket booking page
            exit();
        } else {
            echo "Invalid password";
        }
    } else {
        echo "No user found with that email";
    }

    $conn->close();
}
?>
 <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="signup.css">
    </head>
    <body>
        <header>
            <nav class="navbar">
                <div class="logo">
                    <img src="images/logo.png" alt="Indian Railways Logo" width="50">
                    <span>Indian Railways</span>
                </div>
                <ul class="nav-links">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#">Train Routes</a>
                        <ul class="dropdown">
                            <li><a href="#">Delhi to Mumbai</a></li>
                            <li><a href="#">Kolkata to Chennai</a></li>
                            <li><a href="#">Bangalore to Hyderabad</a></li>
                            <li><a href="#">Lucknow to Pune</a></li>
                        </ul>
                    </li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="offers.html">Offers</a></li>
                    <li><a href="login.html">Login</a></li>
                </ul>
            </nav>
        </header>
        <div class="container">
        <h2>Login</h2>
        <form method="POST" action="login.php">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>

            <button type="submit">Login</button>
        </form>

        <div class="form-footer">
            <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
        </div>

        <?php if (isset($error_message)) { ?>
            <div class="error-message">
                <?php echo $error_message; ?>
            </div>
        <?php } ?>
    </div>
        

        <footer>
            <p>&copy; 2024 Indian Railways. All Rights Reserved.</p>
        </footer>
    </body>
</html>