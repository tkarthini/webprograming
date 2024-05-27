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
    <title>InternHub - Edit Profile</title>
    <link rel="stylesheet" href="CSS/editprofile_student.css">
</head>
<body>
    <header>
        <div class="container">
            <img src="CSS/images/logo.png" alt="Job Seeker" class="logo">
            <nav>
                <ul>
                    <li><a href="aboutus_student.php">About Us</a></li>
                    <li><a href="findjob_student.php">Job Search</a></li>
                    <li><a href="findcompany_student.php">Company Profiles</a></li>
                    <li><a href="profile_student.php">Profile</a></li>
                    <div class="dropdown">
                        <a href="#" class="dropbtn"><img src="CSS/images/profile.png" alt="Profile" class="signin-img"></a>
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

    <div class="containerA">
        <h1>Edit Profile</h1>
        <form action="update_profile.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="companyName">Full Name</label>
                <input type="text" id="companyName" name="companyName" value="<?php echo htmlspecialchars($companyName); ?>" required>
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="text" id="age" name="age" value="<?php echo htmlspecialchars($age); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" id="location" name="location" value="<?php echo htmlspecialchars($location); ?>" required>
            </div>
            <div class="form-group">
                <label for="profilePicture">Profile Picture</label>
                <input type="file" id="profilePicture" name="profilePicture" accept="image/*">
            </div>
            <div class="form-group">
                <label for="programme">Programme</label>
                <input type="text" id="programme" name="programme" value="<?php echo htmlspecialchars($programme); ?>" required>
            </div>
            <div class="form-group">
                <label for="institution">University / Institution</label>
                <input type="text" id="institution" name="institution" value="<?php echo htmlspecialchars($institution); ?>" required>
            </div>
            <div class="form-group">
                <label for="companyOverview">About Me</label>
                <textarea id="companyOverview" name="companyOverview" rows="4" required><?php echo htmlspecialchars($companyOverview); ?></textarea>
            </div>
            <button type="submit">Save</button>
            <!-- Hidden input field to pass user ID to update_profile.php -->
            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>">
        </form>
    </div>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">
                    <img src="CSS/images/logo.png" alt="Job Seeker">
                </div>
                <nav class="footer-links">
                    <div class="footer-section">
                        <h3>Students</h3>
                        <ul>
                            <li><a href="findjob_student.php">Job Search</a></li>
                            <li><a href="profile_student.php">Profile</a></li>
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
