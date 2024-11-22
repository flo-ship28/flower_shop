<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'flowershop');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is received
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data using the isset check to prevent warnings
    $name = isset($_POST['name']) ? $conn->real_escape_string($_POST['name']) : '';
    $email = isset($_POST['email']) ? $conn->real_escape_string($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? $conn->real_escape_string($_POST['phone']) : '';
    $message = isset($_POST['message']) ? $conn->real_escape_string($_POST['message']) : '';

    // Check if required fields are not empty
    if (!empty($name) && !empty($email) && !empty($phone) && !empty($message)) {
        // Insert data into the database
        $sql = "INSERT INTO contact (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";
        if ($conn->query($sql) === TRUE) {
            echo "Message sent successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Order successfull!";
    }
} else {
    echo "Invalid request!";
}

// Close the connection
$conn->close();
?>