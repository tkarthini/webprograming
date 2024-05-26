<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = ""; // Typically empty for XAMPP
$dbname = "internhub_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the 'id' parameter is present in the URL
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Retrieve user profile data from the database based on the user ID
    $sql = "SELECT * FROM company_profile WHERE id = $user_id";
    $result = $conn->query($sql);

    // Check if the query returned any rows
    if ($result) {
        if ($result->num_rows > 0) {
            // Fetch data from each row
            $row = $result->fetch_assoc();
            // Assign fetched data to variables
            $companyName = $row['company_name'];
            $age = $row['age'];
            $email = $row['email'];
            $location = $row['location'];
            $profilePicture = $row['profile_picture'];
            $programme = $row['programme'];
            $institution = $row['institution'];
            $companyOverview = $row['company_overview'];
        } else {
            // No user found with the provided ID
            $companyName = "User not found";
            // You can handle this situation as per your application's logic
        }
    } else {
        // Handle SQL query error
        echo "Error: " . $conn->error;
    }
} else {
    // Handle case where 'id' parameter is not present in the URL
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
    <title>InternHub - Company Profile</title>
    <link rel="stylesheet" href="profile_student.css">
</head>

<body>
    <header>
        <div class="container">
            <img src="images/logo.png" alt="Job Seeker" class="logo">
            <nav>
                <ul>
                    <li><a href="aboutus_student.php">About Us</a></li>
                    <li><a href="findjob_student.php">Job Search</a></li>
                    <li><a href="findcompany_student.php">Company Profiles</a></li>
                    <li><a href="profile_student.php">Profile</a></li>
                    <div class="dropdown">
                        <a href="#" class="dropbtn"><img src="images/profile.png" alt="Profile" class="signin-img"></a>
                        <div class="dropdown-content">
                            <a href="profile_student.php">Profile</a>
                            <a href="manageapplication_student.php">Manage Applications</a>
                            <a href="settings_student.php">Settings</a>
                            <hr>
                            <a href="index.php" class="signout">Sign Out</a>
                        </div>
                    </div>
                </ul>
            </nav>
        </div>
    </header>

    <h1>User Profile</h1>
    <div class="profile-container">
        <div class="profile-picture-container">
            <img src="uploads/<?php echo $profilePicture; ?>" alt="Profile Picture">
            <div class="button-container">
                <button class="edit-profile-button" onclick="window.location.href='edit_profile.php?id=<?php echo $user_id; ?>'">Edit Profile</button>
            </div>
        </div>
        <div class="profile-details">
            <h2><?php echo $companyName; ?></h2>
            <p>Age: <?php echo $age; ?></p>
            <p>Email: <?php echo $email; ?></p>
            <p>Location: <?php echo $location; ?></p>
            <p>Programme: <?php echo $programme; ?></p>
            <p>Institution: <?php echo $institution; ?></p>
            <p>About Me: <?php echo $companyOverview; ?></p>
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
                            <li><a href="findjob_student.php">Job Search</a></li>
                            <li><a href="studentprofile(nivin)_student.php">Profile</a></li>
                            <li><a href="manageapplication_student.php">Manage Application</a></li>
                        </ul>
                    </div>
                    <div class="footer-section">
                        <h3>Companies</h3>
                        <ul>
                            <li><a href="register.php">Register</a></li>
                            <li><a href="register.php">Profile</a></li>
                            <li><a href="register.php">Manage Application</a></li>
                        </ul>
                    </div>
                    <div class="footer-section">
                        <h3>Support</h3>
                        <ul>
                            <li><a href="aboutus_student.php">About Us</a></li>
                            <li><a href="contactus_student.php">Contact Us</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </footer>
</body>

</html>
