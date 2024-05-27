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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $user_id = $_POST['user_id'];
    $companyName = $_POST['companyName'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $location = $_POST['location'];
    $programme = $_POST['programme'];
    $institution = $_POST['institution'];
    $companyOverview = $_POST['companyOverview'];

    // Handle file upload
    if (isset($_FILES['profilePicture']) && $_FILES['profilePicture']['error'] == 0) {
        $profilePicture = basename($_FILES['profilePicture']['name']);
        $targetDir = "uploads/";
        $targetFile = $targetDir . $profilePicture;

        // Move uploaded file to target directory
        if (move_uploaded_file($_FILES['profilePicture']['tmp_name'], $targetFile)) {
            // Update the database with the new profile picture
            $sql = "UPDATE company_profile SET profile_picture = '$profilePicture' WHERE id = $user_id";
            $conn->query($sql);
        }
    }

    // Update user profile data in the database
    $sql = "UPDATE company_profile 
                        SET company_name = '$companyName', 
                age = '$age', 
                email = '$email', 
                location = '$location', 
                programme = '$programme', 
                institution = '$institution', 
                company_overview = '$companyOverview'
            WHERE id = $user_id";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the profile page after successful update
        header("Location: studentprofile(nivin)_student.php?id=$user_id");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>

