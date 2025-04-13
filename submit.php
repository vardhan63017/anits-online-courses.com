<?php
// Database connection
$servername = "localhost";
$username = "root"; // default XAMPP username
$password = "";     // default XAMPP password is empty
$database = "project"; // Make sure 'project' database is created in phpMyAdmin

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data safely
$rollno = $_POST['roll'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Insert into database
$sql = "INSERT INTO users (rollno, name, email, phone) VALUES ('$rollno', '$name', '$email', '$phone')";

if ($conn->query($sql) === TRUE) {
    // After successful registration, go to home page
    header("Location: index.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
