<?php

include_once 'connection.php';


$job_id = null;

// Check if job_id is provided in the URL
if (isset($_GET['job_id'])) {
    $job_id = $_GET['job_id'];

    // Fetch job details from the database based on job_id
    $stmt = $connection->prepare("SELECT * FROM jobs_table WHERE id = ?");
    $stmt->bind_param("i", $job_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the job exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Close statement
        $stmt->close();
    } else {
        echo "Job not found.";
        exit; // Terminate script if job not found
    }
} else {
    echo "Job ID not provided.";
    exit; // Terminate script if job ID not provided
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
}

// Close database connection
$connection->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InternHub - Apply for Job</title>
    <link rel="stylesheet" href="CSS/viewjob_student.css">
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

    <div class="containerZ">
    <?php if ($row) : ?>
        <h1><?php echo $row['job_title']; ?></h1>
        <p><strong>Company:</strong> <?php echo $row['company']; ?></p>
        <p><strong>Location:</strong> <?php echo $row['location']; ?></p>
        <p><strong>Description:</strong> <?php echo $row['description']; ?></p>
        <p><strong>Allowance:</strong> <?php echo $row['allowance']; ?></p>

        <h2>Apply for this Job</h2>
        <form action="submit_application.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">
            <label for="name">Your Name:</label><br>
            <input type="text" id="name" name="name" value="<?php echo $companyName; ?>" required><br><br>
            <label for="email">Your Email:</label><br>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required><br><br>
            <label for="university">University/Institution:</label><br>
            <input type="text" id="university" name="university" value="<?php echo $institution; ?>" required><br><br>
            <label for="cover_letter">Cover Letter:</label><br>
            <textarea id="cover_letter" name="cover_letter" rows="4" required></textarea><br><br>
            <label for="resume">Upload Resume:</label><br>
            <input type="file" id="resume" name="resume" accept="application/pdf" required><br><br>
            <input type="submit" value="Apply">
        </form>
    <?php else : ?>
        <p>Job details not available.</p>
    <?php endif; ?>
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
