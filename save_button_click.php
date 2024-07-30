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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $buttonName = $_POST['buttonName'];

    if (!empty($buttonName)) {
        $stmt = $conn->prepare("INSERT INTO log (buttonName) VALUES (?)");
        $stmt->bind_param("s", $buttonName);

        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Button name is empty.";
    }
} else {
    echo "Invalid request method.";
}

$conn->close();
?>