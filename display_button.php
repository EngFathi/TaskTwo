<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "button_log"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT buttonName FROM log ORDER BY id DESC LIMIT 1"; // Assuming 'id' is the primary key with auto-increment
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $lastButtonClicked = $row['buttonName'];
} else {
    $lastButtonClicked = "No buttons clicked yet.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Last Button Clicked</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        .message {
            font-size: 24px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="message">
        Last Button Clicked: <?php echo htmlspecialchars($lastButtonClicked); ?>
    </div>
    <a href="1stTask.html">Go Back to Control Panel</a>
</body>
</html>
