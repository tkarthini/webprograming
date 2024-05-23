<?php
include_once "connection.php";

// Start session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if resume option is not selected
    if (!isset($_POST['resumeOption'])) {
        echo "<script>alert('Please select an option for the resume.')</script>";
    }
    // Check if cover letter option is not selected
    if (!isset($_POST['coverLetterOption'])) {
        echo "<script>alert('Please select an option for the cover letter.')</script>";
    } else {
        // Check if user is logged in
        if(isset($_SESSION['user_id'])) {
            // Retrieve user_id from session
            $user_id = $_SESSION['user_id']; 

            // Insert data into the database
            $application_date_applied = date('Y-m-d');
            $application_timestamp = date('Y-m-d H:i:s');


            $query = "INSERT INTO application_table (internship_id, user_id, application_timestamp)
                      VALUES ('$internship_id', '$user_id', '$application_timestamp')";
            
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Application submitted successfully.')</script>";
                // Redirect to pageS.php after successful submission
                echo "<script>window.location.href = 'applicationsuccess_student.php';</script>";
            } else {
                echo "<script>alert('Error: " . mysqli_error($conn) . "')</script>";
            }
        } else {
            // Redirect to login page if user is not logged in
            header("Location: login.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply Job - Multimedia Creative Designer </title>
    <link rel="stylesheet" href="css/applyjob_student.css">
</head>

<body>
    <header>
        <div class="container">
            <a href="aboutus_student.php">
                <img src="images/logo.png" alt="Job Seeker" class="logo">
            </a>
            <nav>
                <ul>
                    <li><a href="aboutus_student.php">About Us</a></li>
                    <li><a href="findjob_student.php">Job Search</a></li>
                    <li><a href="findcompany_student.php">Company Profiles</a></li>
                    <li><a href="studentprofile(nivin)_student.php">Profile</a></li>
                    <div class="dropdown">
                        <a href="#" class="dropbtn"><img src="images/profile.png" alt="Profile" class="signin-img"></a>
                        <div class="dropdown-content">
                            <a href="studentprofile(nivin)_student.php">Profile</a>
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
    
    <section id="scrollToSection" class="hero">
        <div class="container">
            <img id="joblogo" src="images/sutera.png">
            <h1 id="pvsgsb">Graphics Designer</h1>
            <p id="Sunlight">Sutera Harbour Sdn Bhd</p>
        </div>
        <div class="personal-details-box">
            <h1>Personal Details</h1>
            <form method="POST" action="applicationsuccess_student.php">
                <div class="name-fields">
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" id="firstName" name="firstName" required>
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" id="lastName" name="lastName" required>
                    </div>
                </div>
                <label for="address">Address</label>
                <input type="text" id="address" name="address" required>
                <div class="name-fields">
                    <div class="form-group">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="text" id="phoneNumber" name="phoneNumber" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                </div>
                <h1 class="resume-options">Resume</h1>
                <div class="resume-options">
                    <input type="radio" id="uploadResumeOption" name="resumeOption" value="upload" required>
                    <label for="uploadResumeOption">Upload Resume</label>
                    <input type="file" id="resumeUpload" name="resumeUpload" accept=".pdf,.doc,.docx" style="display: none;">
                    <input type="radio" id="dontIncludeResumeOption" name="resumeOption" value="dontInclude">
                    <label for="dontIncludeResumeOption">Don't Include Resume</label>
                </div>
                <h1 class="cover-letter-options">Cover Letter</h1>
                <div class="cover-letter-options">
                    <input type="radio" id="uploadCoverLetterOption" name="coverLetterOption" value="upload" required>
                    <label for="uploadCoverLetterOption">Upload Cover Letter</label>
                    <input type="file" id="coverLetterUpload" name="coverLetterUpload" accept=".pdf,.doc,.docx" style="display: none;">
                    <input type="radio" id="dontIncludeCoverLetterOption" name="coverLetterOption" value="dontInclude">
                    <label for="dontIncludeCoverLetterOption">Don't Include Cover Letter</label>
                    <input type="radio" id="typeCoverLetterOption" name="coverLetterOption" value="type">
                    <label for="typeCoverLetterOption">Type Cover Letter Here</label>
                    <textarea id="coverLetterText" name="coverLetterText" rows="4" cols="50"></textarea>
                </div>
                <section id="BtnIcon" class="two-column-section">
                    <div class="agree-policy">
                        <input type="checkbox" id="agreePrivacyPolicy" required>
                        <label for="agreePrivacyPolicy">By registering, I agree to the Privacy Policy and consent to the collection, storage, and use of my personal data as described in that policy. I agree to receive marketing messages from InternHub and understand that I can opt out at any time via the unsubscribe links or as detailed in the Privacy Policy.</label>
                    </div>
                    <button type="submit" id="applynowBtn">Submit Application</button>
                </section>
            </form>
        </div>
        <div class="scroll-down-button">
            <a href="#scrollToSection">
                <i class="fas fa-chevron-down"></i>
            </a>
        </div>
    </section>

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
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const uploadCoverLetterOption = document.getElementById('uploadCoverLetterOption');
            const uploadResumeOption = document.getElementById('uploadResumeOption');
            const coverLetterUpload = document.getElementById('coverLetterUpload');
            const resumeUpload = document.getElementById('resumeUpload');
            const coverLetterFileLabel = document.querySelector('.cover-letter-options .file-label');
            const resumeFileLabel = document.querySelector('.resume-options .file-label');

            uploadCoverLetterOption.addEventListener('change', () => {
                if (uploadCoverLetterOption.checked) {
                    coverLetterUpload.style.display = 'block';
                    coverLetterFileLabel.style.display = 'block';
                    resumeUpload.style.display = 'none';
                    resumeFileLabel.style.display = 'none';
                }
            });

            uploadResumeOption.addEventListener('change', () => {
                if (uploadResumeOption.checked) {
                    resumeUpload.style.display = 'block';
                    resumeFileLabel.style.display = 'block';
                    coverLetterUpload.style.display = 'none';
                    coverLetterFileLabel.style.display = 'none';
                }
            });

            const coverLetterOptions = document.querySelectorAll('input[name="coverLetterOption"]');
            const resumeOptions = document.querySelectorAll('input[name="resumeOption"]');

            coverLetterOptions.forEach(option => {
                option.addEventListener('change', () => {
                    if (option.value !== 'upload') {
                        coverLetterUpload.style.display = 'none';
                        coverLetterFileLabel.style.display = 'none';
                    }
                });
            });

            resumeOptions.forEach(option => {
                option.addEventListener('change', () => {
                    if (option.value !== 'upload') {
                        resumeUpload.style.display = 'none';
                        resumeFileLabel.style.display = 'none';
                    }
                });
            });
        });

    </script>
</body>
</html>
