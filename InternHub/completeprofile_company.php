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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // User inputs for security
    $companyName = $conn->real_escape_string($_POST['companyName']);
    $location = $conn->real_escape_string($_POST['location']);
    $companyOverview = $conn->real_escape_string($_POST['companyOverview']);
    $whoWeAre = $conn->real_escape_string($_POST['whoWeAre']);
    
    // File upload
    $targetDirectory = "uploads/";
    $profilePicture = basename($_FILES["profilePicture"]["name"]);
    $targetFilePath = $targetDirectory . $profilePicture;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["profilePicture"]["tmp_name"]);
    if($check !== false) {
        // Allow certain file formats
        if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        } else {
            // Attempt to upload file
            if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $targetFilePath)) {
                // Insert data into company_table
                $sql = "INSERT INTO company_table (company_name, company_location, companyOverview, whoWeAre, profilePicture)
                VALUES ('$companyName', '$location', '$companyOverview', '$whoWeAre', '$targetFilePath')";
                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "File is not an image.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InternHub - Complete Profile</title>
    <link rel="stylesheet" href="CSS/completeprofile_company.css">
</head>
<body>
    <header>
        <div class="container">
            <img src="CSS/images/logo.png" alt="Job Seeker" class="logo">
            <nav>
                <ul>
                    <li><a href="aboutus_company.php">About Us</a></li>
                    <li><a href="findcandidate_company.php">Candidate Profiles</a></li>
                    <li><a href="viewpostedjob_company.php">Posted Jobs</a></li>
                    <li><a href="profile_company.php">Profile</a></li>
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

    <div class="containerc">
        <h1>Complete Your Company Profile</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="companyName">Company Name</label>
                <input type="text" id="companyName" name="companyName" required>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" id="location" name="location" required>
            </div>
            <div class="form-group">
                <label for="profilePicture">Profile Picture</label>
                <input type="file" id="profilePicture" name="profilePicture" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="companyOverview">Company Overview</label>
                <textarea id="companyOverview" name="companyOverview" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="whoWeAre">Who We Are</label>
                <textarea id="whoWeAre" name="whoWeAre" rows="4" required></textarea>
            </div>
            
            <button type="button" onclick="addJob()">Add Job</button>
            
            <button type="submit">Submit</button>
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

    <script>
        // Function to handle "Add Job" button click
        function addJob() {
            window.location.href = "post_job.php";
        }
    </script>
</body>
</html>
