<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture booking details
    $train_name = $_POST['train_name'];
    $departure = $_POST['departure'];
    $destination = $_POST['destination'];
    $date = $_POST['date'];

    // Store booking information (This is an example; you need to create a bookings table in your database)
    // Save the booking data to the database
    // For now, we'll just print the booking data
    echo "<div class='success-message'>Ticket booked successfully for train: <strong>$train_name</strong>, from <strong>$departure</strong> to <strong>$destination</strong> on <strong>$date</strong>.</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Ticket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            font-size: 14px;
            color: #555;
            display: block;
            margin-bottom: 6px;
        }

        input[type="text"], input[type="date"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0 20px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .form-footer {
            text-align: center;
            font-size: 14px;
            margin-top: 20px;
        }

        .success-message {
            background-color: #e7f7e7;
            color: #4CAF50;
            padding: 15px;
            border-radius: 4px;
            margin-top: 20px;
            text-align: center;
        }

        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 4px;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Book Ticket</h2>
        <form method="POST" action="booking.php">
            <label for="train_name">Train Name:</label>
            <input type="text" id="train_name" name="train_name" required><br>

            <label for="departure">Departure:</label>
            <input type="text" id="departure" name="departure" required><br>

            <label for="destination">Destination:</label>
            <input type="text" id="destination" name="destination" required><br>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required><br>

            <button type="submit">Book Ticket</button>
        </form>

        <div class="form-footer">
            <p><a href="logout.php">Logout</a></p>
        </div>
    </div>
</body>
</html>
