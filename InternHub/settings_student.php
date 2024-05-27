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

// Assuming user_id is stored in the session
$user_id = $_SESSION['user_id'];

// Fetch user email and password from the database
$sql = "SELECT user_email, user_password FROM user_table WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($user_email, $user_password);
$stmt->fetch();
$stmt->close();
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InternHub - Settings</title>
    <link rel="stylesheet" href="CSS/settings_student.css">
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

    <div class="header">
        <h1>Settings</h1>
    </div>

    <div class="containerS">
        <!-- Settings Box -->
        <div class="settings-box">
            <div class="header-box">
                <span id="accountHeader" class="account">Account</span>
            </div>
        </div>
        <div class="additional-box">
    <h3>Email</h3>
    <p id="emailText"><?php echo htmlspecialchars($user_email); ?></p>
</div>

    </div>

    <div class="containerP">
        <!-- Settings Box -->
        <div class="additional-box2">
    <h3>Password</h3>
    <p id="passwordText">********</p>
    <span id="editPassword"><img src="CSS/images/edit.png" alt="Edit Password"></span>
</div>



        <!-- Delete Account Box -->
        <div class="additional-box2 delete-account-box">
            <h3>Delete Account</h3>
            <button id="deleteAccount">Delete</button>
        </div>
    </div>

    <!-- Edit Password Window -->
    <div id="editPasswordWindow" class="edit-window">
        <div class="edit-window-content">
            <span class="close">&times;</span>
            <h2>Change Password</h2>
            <label for="newPassword">New Password:</label><br>
            <input type="password" id="newPassword"><br>
            <label for="confirmPassword">Confirm Password:</label><br>
            <input type="password" id="confirmPassword"><br>
            <button id="savePassword">Save</button>
        </div>
    </div>

    <!-- Confirm Delete Account Window -->
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
        // Closing the confirm delete account window
        function closeConfirmDeleteWindow() {
            document.getElementById('confirmDeleteWindow').style.display = 'none';
        }

        document.getElementById('accountHeader').addEventListener('click', function() {
            // Toggle classes on accountHeader and notificationHeader
            document.getElementById('accountHeader').classList.add('active');
            document.getElementById('notificationHeader').classList.remove('active');
        });

        // Edit password functionality
        document.getElementById('editPassword').addEventListener('click', function() {
            document.getElementById('editPasswordWindow').style.display = 'block';
        });

        document.getElementsByClassName('close')[0].addEventListener('click', function() {
            document.getElementById('editPasswordWindow').style.display = 'none';
        });

        // Save password functionality
        document.getElementById('savePassword').addEventListener('click', function() {
            var passwordText = document.getElementById('passwordText');
            var newPasswordInput = document.getElementById('newPassword');
            var confirmPasswordInput = document.getElementById('confirmPassword');

            // Check if new password and confirm password match
            if (newPasswordInput.value !== confirmPasswordInput.value) {
                alert("New password and confirm password do not match.");
                return;
            }

            passwordText.textContent = newPasswordInput.value;

            // Close the edit password window
            document.getElementById('editPasswordWindow').style.display = 'none';
        });

        // Delete account functionality
        document.getElementById('deleteAccount').addEventListener('click', function() {
            // Confirm delete account window
            document.getElementById('confirmDeleteWindow').style.display = 'block';
        });

        // Cancel delete account functionality
        document.getElementById('cancelDelete').addEventListener('click', function() {
            // Hide the confirm delete account window
            closeConfirmDeleteWindow();
        });

        // Confirm delete account functionality
        document.getElementById('confirmDelete').addEventListener('click', function() {
            // After successful deletion, redirect the user to a login page
            alert("Account deleted successfully!");
            // Redirect to index.php
            window.location.href = 'index.php';
            closeConfirmDeleteWindow();
        });

        document.querySelector('.signout').addEventListener('click', function() {
            // Perform sign out actions if needed
            // For example: clear session, cookies, etc.

            // Redirect to index.php
            window.location.href = 'index.php';
        });

        // Event listener to the "Sign Out" link
        document.querySelector('.signout').addEventListener('click', function() {
            // Redirect the user to index.php
            window.location.href = 'index.php';
        });

    </script>
</body>

</html>
