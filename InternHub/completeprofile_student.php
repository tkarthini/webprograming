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

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $studentName = $_POST['companyName'];
    $studentAge = $_POST['age'];
    $studentEmail = $_POST['email'];
    $studentLocation = $_POST['location'];
    $profilePicture = $_FILES['profilePicture']['name'];
    $studentProgramme = $_POST['programme'];
    $studentInstitution = $_POST['institution'];
    $studentAboutMe = $_POST['companyOverview'];

    // Handle file upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($profilePicture);
    $uploadOk = 1;

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["profilePicture"]["tmp_name"]);
    if($check === false) {
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["profilePicture"]["size"] > 5000000) {
        $uploadOk = 0;
    }

    // Allow certain file formats
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $message = "Sorry, your file was not uploaded.";
    // If everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $target_file)) {
            // Prepare and bind
            $stmt = $conn->prepare("INSERT INTO student_table (student_name, student_age, student_email, student_location, student_profilepicture, student_programme, student_institution, student_aboutme) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sissssss", $studentName, $studentAge, $studentEmail, $studentLocation, $profilePicture, $studentProgramme, $studentInstitution, $studentAboutMe);

            // Execute the statement
            if ($stmt->execute()) {
                $message = "Profile completed successfully!";
                // Redirect to aboutus_student.php after setting the message
                header("Location: aboutus_student.php");
                exit();
            } else {
                $message = "Error: " . $stmt->error;
            }

            // Close statement
            $stmt->close();
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InternHub - Complete Profile</title>
    <link rel="stylesheet" href="CSS/completeprofile_student.css">
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

    <div class="containerc">
        <h1>Complete Your Profile</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="companyName">Full Name</label>
                <input type="text" id="companyName" name="companyName" required>
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="text" id="age" name="age" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
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
                <label for="programme">Programme</label>
                <input type="text" id="programme" name="programme" required>
            </div>
            <div class="form-group">
                <label for="institution">University / Institution</label>
                <input type="text" id="institution" name="institution" required>
            </div>
            <div class="form-group">
                <label for="companyOverview">About Me</label>
                <textarea id="companyOverview" name="companyOverview" rows="4" required></textarea>
            </div>
            <button type="submit">Submit</button>
        </form>
        <p><?php echo $message; ?></p>
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
