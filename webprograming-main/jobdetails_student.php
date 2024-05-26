<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "internhub_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if a job ID is provided in the URL
if (isset($_GET['job_id'])) {
    $job_id = $_GET['job_id'];

    // Fetch job details from the database
    $sql = "SELECT * FROM jobs_table WHERE id = $job_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display job details
        $row = $result->fetch_assoc();
        // Display job details here
        echo "<h2>" . $row['job_title'] . "</h2>";
        echo "<p>Company: " . $row['company'] . "</p>";
        echo "<p>Location: " . $row['location'] . "</p>";
        echo "<p>Description: " . $row['description'] . "</p>";
        echo "<p>Allowance: " . $row['allowance'] . "</p>";
        // Add more details as needed
    } else {
        echo "Job not found";
    }
} else {
    echo "Job ID not provided";
}

$conn->close();
?>
