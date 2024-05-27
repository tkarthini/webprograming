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

// Check if the 'company_id' parameter is present in the URL
if (isset($_GET['company_id'])) {
    $company_id = $_GET['company_id'];

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
    // Handle case where 'company_id' parameter is not present in the URL
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
    <title>InternHub - Company Profile</title>
    <link rel="stylesheet" href="CSS/viewprofile_company.css">
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
                    <li><a href="viewpostedjob_company.php">Posted Jobs</a></li>
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

<div class="company-profile">
    <div class="profile-header">
        <img src="<?php echo htmlspecialchars($profilePicture); ?>" alt="Company Profile Picture" class="profile-image">
        <div class="profile-details">
            <h1><?php echo htmlspecialchars($companyName); ?></h1>
            <p><?php echo htmlspecialchars($location); ?></p>
        </div>
    </div>
    <div class="profile-content">
        <section class="company-overview">
            <h2>Company Overview</h2>
            <p><?php echo htmlspecialchars($companyOverview); ?></p>
        </section>
        <section class="who-we-are">
            <h2>Who We Are</h2>
            <p><?php echo htmlspecialchars($whoWeAre); ?></p>
        </section>
    </div>
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

<script>
// Event listener to the "Sign Out" link
document.querySelector('.signout').addEventListener('click', function() {
    // Redirect the user to index.php
    window.location.href = 'index.php';
});
</script>
</body>
</html>

