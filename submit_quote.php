<?php
$servername = "localhost";
$username   = "quote_user";
$password   = "QuotePass123!";
$dbname     = "quote_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Escape input to avoid SQL injection
$name    = $conn->real_escape_string($_POST['name']);
$email   = $conn->real_escape_string($_POST['email']);
$phone   = $conn->real_escape_string($_POST['phone']);
$message = $conn->real_escape_string($_POST['message']);

$sql = "INSERT INTO quotes (name, email, phone, message) 
        VALUES ('$name', '$email', '$phone', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Your request has been submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
