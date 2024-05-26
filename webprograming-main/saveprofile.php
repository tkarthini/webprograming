<?php
// Database connection
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "internhub_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the data from the AJAX request
$name = $_POST['name'];
$location = $_POST['location'];
$email = $_POST['email'];
$birthday = $_POST['birthday'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO student_table (student_name, student_location, student_email, student_birthday) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $location, $email, $birthday);

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
