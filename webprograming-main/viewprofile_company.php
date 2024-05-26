<?php
session_start();

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

// Check if the 'user_id' parameter is present in the URL
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Retrieve student profile data from the database based on the user ID
    $sql = "SELECT user_id, student_name, student_age, student_email, student_location, student_profilepicture, student_programme, student_institution, student_aboutme FROM student_table WHERE user_id = $user_id";
    $result = $conn->query($sql);

    // Check if the query returned any rows
    if ($result) {
        if ($result->num_rows > 0) {
            // Fetch data from the row
            $row = $result->fetch_assoc();
            // Assign fetched data to variables
            $student_id = $row['user_id'];
            $studentName = $row['student_name'];
            $studentAge = $row['student_age'];
            $studentEmail = $row['student_email'];
            $studentLocation = $row['student_location'];
            $studentProfilePicture = $row['student_profilepicture'];
            $studentProgramme = $row['student_programme'];
            $studentInstitution = $row['student_institution'];
            $studentAboutMe = $row['student_aboutme'];
        } else {
            // No student found with the provided ID
            $studentName = "Student not found";
            // You can handle this situation as per your application's logic
        }
    } else {
        // Handle SQL query error
        echo "Error: " . $conn->error;
    }
} else {
    // Handle case where 'user_id' parameter is not present in the URL
    echo "User ID not provided.";
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <link rel="stylesheet" href="viewprofile_company.css">
</head>
<body>
<header>
        <div class="container">
            <img src="images/logo.png" alt="Job Seeker" class="logo">
            <nav>
                <ul>
                    <li><a href="aboutus_company.php">About Us</a></li>
                    <li><a href="findcandidate_company.php">Candidate Profiles</a></li>
                    <li><a href="manageapplication_company.php">Applications</a></li>
                    <li><a href="profile_company.php">Profile</a></li>
                    <div class="dropdown">
                        <a href="#" class="dropbtn"><img src="images/profile.png" alt="Profile" class="signin-img"></a>
                        <div class="dropdown-content">
                            <a href="profile_company.php">Profile</a>
                            <a href="manageapplication_student.php">Manage Application</a>
                            <a href="settings_company.php">Settings</a>
                            <hr>
                            <a href="index.php" class="signout">Sign Out</a>
                        </div>
                    </div>
                </ul>
            </nav>
        </div>
    </header>

<h1>Student Profile</h1>
<div class="profile-container">
    <div class="profile-picture-container">
        <img src="uploads/<?php echo $studentProfilePicture; ?>" alt="Profile Picture">
    </div>
    <div class="profile-details">
        <h2><?php echo $studentName; ?></h2>
        <p>Age: <?php echo $studentAge; ?></p>
        <p>Email: <?php echo $studentEmail; ?></p>
        <p>Location: <?php echo $studentLocation; ?></p>
        <p>Programme: <?php echo $studentProgramme; ?></p>
        <p>Institution: <?php echo $studentInstitution; ?></p>
        <p>About Me: <?php echo $studentAboutMe; ?></p>
        <!-- Display other student details here -->
    </div>
</div>

<footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">
                    <img src="images/logo.png" alt="Job Seeker">
                </div>
                <nav class="footer-links">
                    <div class="footer-section">
                        <h3>Students</h3>
                        <ul>
                            <li><a href="findjob_notlogin.php">Job Search</a></li>
                            <li><a href="signin.php">Profile</a></li>
                            <li><a href="signin.php">Manage Application</a></li>
                        </ul>
                    </div>
                    <div class="footer-section">
                        <h3>Companies</h3>
                        <ul>
                            <li><a href="profile_company.php">Profile</a></li>
                            <li><a href="findcandidate_company.php">Candidates</a></li>
                            <li><a href="manageapplication_company.php">Manage Application</a></li>
                        </ul>
                    </div>
                    <div class="footer-section">
                        <h3>Support</h3>
                        <ul>
                            <li><a href="aboutus_company.php">About Us</a></li>
                            <li><a href="contactus_company.php">Contact Us</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </footer>

<script>
    // Event listener to the "Sign Out" link
    document.querySelector('.signout').addEventListener('click', function() {
        // Redirect the user to index.php
        window.location.href = 'index.php';
    });
</script>
</body>
</html>
