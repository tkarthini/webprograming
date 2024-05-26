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
    <link rel="stylesheet" href="CSS/settings_company.css">
</head>

<body>
    <header>
        <div class="container">
            <img src="images/logo.png" alt="Job Seeker" class="logo">
            <nav>
                <ul>
                    <li><a href="CSS/aboutus_company.css">About Us</a></li>
                    <li><a href="findcandidate_company.php">Candidate Profiles</a></li>
                    <li><a href="manageapplication_company.php">Applications</a></li>
                    <li><a href="profile_company.php">Profile</a></li>
                    <div class="dropdown">
                        <a href="#" class="dropbtn"><img src="images/profile.png" alt="Profile" class="signin-img"></a>
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
    <input type="email" id="emailText" value="<?php echo htmlspecialchars($user_email); ?>">
</div>

    </div>

    <div class="containerP">
        <!-- Settings Box -->
        <div class="additional-box2">
    <h3>Password</h3>
    <input type="password" id="passwordText" value="<?php echo htmlspecialchars($user_password); ?>">
    <span id="editPassword"><img src="edit.png" alt="Edit Password"></span>
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
                    <img src="images/logo.png" alt="Job Seeker">
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

        // Save email and password functionality
        document.getElementById('savePassword').addEventListener('click', function() {
            var newEmail = document.getElementById('emailText').value;
            var newPasswordInput = document.getElementById('newPassword').value;
            var confirmPasswordInput = document.getElementById('confirmPassword').value;

            // Check if new password and confirm password match
            if (newPasswordInput !== confirmPasswordInput) {
                alert("New password and confirm password do not match.");
                return;
            }

            // Update email and password via AJAX
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "update_settings.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert("Settings updated successfully.");
                    location.reload();
                }
            };
            xhr.send("email=" + newEmail + "&password=" + newPasswordInput);

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

        // Event listener to the "Sign Out" link
        document.querySelector('.signout').addEventListener('click', function() {
            // Redirect the user to index.php
            window.location.href = 'index.php';
        });
    </script>
</body>

</html>
