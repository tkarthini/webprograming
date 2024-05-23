<?php
include_once "connection.php";

// Database connection settings
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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $profileName = $_POST['profileName'];
    $profileLocation = $_POST['profileLocation'];
    $profileEmail = $_POST['profileEmail'];
    $profileBirthday = $_POST['profileBirthday'];
    $profileEducation = $_POST['profileEducation'];
    $profilePictureData = $_POST['profilePictureData'];
    $studentId = 1;

    // Handle profile picture upload
    if (!empty($profilePictureData)) {
        list($type, $data) = explode(';', $profilePictureData);
        list(, $data) = explode(',', $data);
        $data = base64_decode($data);
        $profilePicturePath = 'images/' . uniqid() . '.png';
        file_put_contents($profilePicturePath, $data);

        // Update the profile picture path in the database
        $stmt = $conn->prepare("UPDATE student_table SET profile_picture = ? WHERE id = ?");
        if ($stmt) {
            $stmt->bind_param('si', $profilePicturePath, $studentId);
            if (!$stmt->execute()) {
                echo "Error updating profile picture: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error preparing statement for profile picture: " . $conn->error;
        }
    }

    // Save other profile details to the database
    $stmt = $conn->prepare("UPDATE student_table SET student_name = ?, student_location = ?, student_email = ?, student_birthday = ?, student_education = ? WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param('sssssi', $profileName, $profileLocation, $profileEmail, $profileBirthday, $profileEducation, $studentId);
        if ($stmt->execute()) {
            echo "Profile updated successfully!";
        } else {
            echo "Error updating profile: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement for profile details: " . $conn->error;
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InternHub - Settings</title>
    <link rel="stylesheet" href="css/editprofile(nivin)_student.css">
    <style>
        .button-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 10px;
        }

        .header-box {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            background-color: #00214D;
            padding: 20px 30px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .settings-box button {
            background: none;
            border: none;
            cursor: pointer;
            color: #fff;
            font-size: 30px;
            padding: 0;
            margin: 0;
            display: block;
            width: 100%;
            text-align: left;
        }

    </style>
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

    <div class="header">
        <h1>Settings</h1>
    </div>

    <div class="containerS">
        <div class="settings-box">
            <div class="header-box">
                <button id="accountHeader" class="account">Account</button>
                <button id="editButton" class="edit">Edit</button>
            </div>
        </div>

        <div class="additional-box">
            <div class="content">
                <img id="profilebackground" src="images/nivinpaulycoverpic.png" width="95%" height="80%">
                <img id="profilepicture" src="images/nivinpauly.jpg" width="150px" height="200px">
                <button id="editProfilePicture">Edit Profile Picture</button>
                <input type="file" id="profilePictureInput" style="display: none;" accept="image/*">

                <form id="profileForm" action="save_profile.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="profilePictureData" name="profilePictureData">

                    <div class="editable-fields">
                        <div class="info-container">
                            <label for="profileName">Name:</label>
                            <input id="profileName" name="profileName" class="profile-name" type="text" value="Nivin Pauly" contenteditable="true">
                        </div>
                        <div class="info-container">
                            <label for="profileLocation">Location:</label>
                            <input id="profileLocation" name="profileLocation" class="profile-location" type="text" value="Kuala Lumpur, Malaysia" contenteditable="true">
                        </div>
                        <div class="info-container">
                            <label for="profileEmail">Email:</label>
                            <input id="profileEmail" name="profileEmail" class="profile-email" type="text" value="nivin1016@gmail.com" contenteditable="true">
                        </div>
                        <div class="info-container">
                            <label for="profileBirthday">Birthday:</label>
                            <input id="profileBirthday" name="profileBirthday" class="profile-birthday" type="text" value="16 October 2000" contenteditable="true">
                        </div>
                    </div>
                    <div class="upload-description">
                        <span>Resume:</span>
                        <div class="upload-document">
                            <span id="uploadIcon">&#43;</span>
                            <label for="fileInput">Upload a Resume</label>
                            <input type="file" id="fileInput" name="resume" style="display: none;">
                        </div>
                    </div>
                    <div class="button-container">
                        <button id="cancelUpload" type="button">Cancel</button>
                        <button id="saveUpload" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="containerP">
        <div class="additional-box2 delete-account-box">
            <h3>Delete Account</h3>
            <button id="deleteAccount">Delete</button>
        </div>
    </div>

    <div id="confirmDeleteWindow" class="edit-window">
        <div class="edit-window-content">
            <span class="close">&times;</span>
            <h2>Confirm Delete Account</h2>
            <p>Are you sure you want to delete your account?</p>
            <div class="button-container">
                <button id="confirmDelete">Yes</button>
                <button id="cancelDelete">No</button>
            </div>
        </div>
    </div>

    <!-- appears only when user click edit -->
    <div class="containerD" style="display: none;">
        <div class="additional-box2 edu-account-box">
            <div class="personal-details-box">
                <h1>Add Education</h1>
                <form>
                    <div class="name-fields">
                        <div class="form-group">
                            <label for="profileEducation">Education Level</label>
                            <input type="text" id="profileEducation" name="profileEducation" required>

                        </div>
                        <div class="form-group">
                            <label for="lastName">Institution Name</label>
                            <input type="text" id="lastName" name="lastName" required>
                        </div>
                    </div>

                    <label for="address">Programme Name</label>
                    <input type="text" id="address" name="address" required>

                    <div class="name-fields">
                        <div class="form-group">
                            <label for="phoneNumber">Start Year</label>
                            <input type="text" id="phoneNumber" name="phoneNumber" required>
                        </div>
                        <div class="form-group">
                            <label for="endYear">End Year</label>
                            <input type="number" id="endYear" name="endYear" required>
                        </div>
                    </div>

                    <div class="button-container">
                        <button id="cancelUpload" type="button">Cancel</button>
                        <button id="saveUpload" type="submit">Save</button>
                    </div>

                </form>
            </div>
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

    <script>
        // Function to toggle visibility of containers
        function toggleContainers(show) {
            const containers = document.querySelectorAll('.additional-box, .containerP');
            containers.forEach(container => {
                container.style.display = show ? 'block' : 'none';
            });
        }

        // Show account details when 'Account' button is clicked
        document.getElementById('accountHeader').addEventListener('click', function() {
            toggleContainers(true);
            document.querySelector('.containerD').style.display = 'none'; 
            // Ensure containerD is hidden when 'Account' is clicked
            document.querySelector('footer').style.display = 'block';
        });

        // Show edit details when 'Edit' button is clicked
        document.getElementById('editButton').addEventListener('click', function() {
            toggleContainers(false);
            document.querySelector('.containerD').style.display = 'block'; 
            // Show containerD when 'Edit' is clicked
            document.querySelector('footer').style.display = 'block';
        });

        // Trigger file input click when 'Edit Profile Picture' button is clicked
        document.getElementById('editProfilePicture').addEventListener('click', function() {
            document.getElementById('profilePictureInput').click();
        });

        // Display selected file as the new profile picture
        document.getElementById('profilePictureInput').addEventListener('change', function() {
            const file = this.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                const profilePicture = document.getElementById('profilepicture');
                profilePicture.src = e.target.result;
                document.getElementById('profilePictureData').value = e.target.result;
            };

            reader.readAsDataURL(file);
        });

        // Display selected file name in an alert when resume is uploaded
        document.getElementById('fileInput').addEventListener('change', function() {
            const fileName = this.files[0].name;
            alert('Selected file: ' + fileName);
        });

        // Save button action for container D
        document.getElementById('saveUpload').addEventListener('click', function(event) {
            // Prevent the default form submission behavior
            event.preventDefault();

            // Show a popup message
            alert('Profile updated successfully!');

            // Redirect to studentprofile(nivin)_student.php
            window.location.href = 'studentprofile(nivin)_student.php';
        });

        // Cancel button redirects to profile page
        document.getElementById('cancelUpload').addEventListener('click', function() {
            window.location.href = 'studentprofile(nivin)_student.php';
        });

        // Confirm delete account logic
        const deleteAccountButton = document.getElementById('deleteAccount');
        const confirmDeleteWindow = document.getElementById('confirmDeleteWindow');
        const closeConfirmDeleteWindowButton = document.querySelector('.close');

        deleteAccountButton.addEventListener('click', function() {
            confirmDeleteWindow.style.display = 'block';
        });

        closeConfirmDeleteWindowButton.addEventListener('click', function() {
            confirmDeleteWindow.style.display = 'none';
        });

        // Confirm delete account
        document.getElementById('confirmDelete').addEventListener('click', function() {
            // Perform request to delete account
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'delete_account.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert('Account deleted successfully!');
                    window.location.href = 'login.php'; // Redirect to login page after account deletion
                }
            };
            xhr.send();
        });

        // Cancel delete account
        document.getElementById('cancelDelete').addEventListener('click', function() {
            confirmDeleteWindow.style.display = 'none';
        });

    </script>
</body>
</html>
