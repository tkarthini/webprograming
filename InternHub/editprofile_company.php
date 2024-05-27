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
    $company_id = $_GET['id'];

    // Retrieve company profile data from the database based on the company ID
    $sql = "SELECT * FROM company_table WHERE company_id = $company_id";
    $result = $conn->query($sql);

    // Check if the query returned any rows
    if ($result) {
        if ($result->num_rows > 0) {
            // Fetch data from the row
            $row = $result->fetch_assoc();
            // Assign fetched data to variables
            $companyName = $row['company_name'];
            $location = $row['company_location'];
            $profilePicture = $row['profilePicture'];
            $companyOverview = $row['companyOverview'];
            $whoWeAre = $row['whoWeAre'];
        } else {
            // No company found with the provided ID
            $companyName = "Company not found";
            $location = "";
            $profilePicture = "";
            $companyOverview = "";
            $whoWeAre = "";
        }
    } else {
        // Handle SQL query error
        echo "Error: " . $conn->error;
    }
} else {
    // Handle case where 'id' parameter is not present in the URL
    echo "Company ID not provided.";
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InternHub - Edit Company Profile</title>
    <link rel="stylesheet" href="CSS/editprofile_company.css">
</head>
<body>
    <header>
        <div class="container">
            <img src="CSS/images/logo.png" alt="Job Seeker" class="logo">
            <nav>
                <ul>
                    <li><a href="aboutus_company.php">About Us</a></li>
                    <li><a href="findcandidate_company.php">Candidate Profiles</a></li>
                    <li><a href="manageapplication_company.php">Applications</a></li>
                    <li><a href="viewpostedjob_company.php">Posted Jobs</a></li>
                    <div class="dropdown">
                        <a href="#" class="dropbtn"><img src="CSS/images/profile.png" alt="Profile" class="signin-img"></a>
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

    <div class="containerA">
        <h1>Edit Company Profile</h1>
                <form action="update_profile_company.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="company_id" value="<?php echo $company_id; ?>">
            <div class="form-group">
                <label for="companyName">Company Name:</label>
                <input type="text" id="companyName" name="companyName" value="<?php echo $companyName; ?>" required>
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" value="<?php echo $location; ?>" required>
            </div>
            <div class="form-group">
                <label for="profilePicture">Profile Picture:</label>
                <input type="file" id="profilePicture" name="profilePicture">
                <?php if ($profilePicture): ?>
                    <img src="<?php echo $profilePicture; ?>" alt="Profile Picture" class="profile-picture-preview">
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="companyOverview">Company Overview:</label>
                <textarea id="companyOverview" name="companyOverview" required><?php echo $companyOverview; ?></textarea>
            </div>
            <div class="form-group">
                <label for="whoWeAre">Who We Are:</label>
                <textarea id="whoWeAre" name="whoWeAre" required><?php echo $whoWeAre; ?></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="save-button">Save Changes</button>
            </div>
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
</body>
</html>

