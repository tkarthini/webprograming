<?php
// Database connection details
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

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $company_id = $_POST['company_id'];
    $companyName = $_POST['companyName'];
    $location = $_POST['location'];
    $companyOverview = $_POST['companyOverview'];
    $whoWeAre = $_POST['whoWeAre'];

    // Handle profile picture upload if a new file is provided
    if (isset($_FILES['profilePicture']) && $_FILES['profilePicture']['error'] == UPLOAD_ERR_OK) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["profilePicture"]["name"]);
        if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $target_file)) {
            $profilePicture = $target_file;
        } else {
            $profilePicture = ""; 
        }
    } else {
        // If no new picture uploaded, retain the current one
        $sql = "SELECT profilePicture FROM company_table WHERE company_id = $company_id";
        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $profilePicture = $row['profilePicture'];
        } else {
            $profilePicture = "";
        }
    }

    // Update company profile in the database
    $sql = "UPDATE company_table SET company_name = '$companyName', company_location = '$location', profilePicture = '$profilePicture', companyOverview = '$companyOverview', whoWeAre = '$whoWeAre' WHERE company_id = $company_id";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the profile page with updated data
        header("Location: profile_company.php?id=$company_id");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>
