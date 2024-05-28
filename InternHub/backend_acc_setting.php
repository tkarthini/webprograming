<?php

include_once "connection.php";
session_start();

$user_id = $_SESSION['user_id'];

// Fetch user email and password from the database
$sql = "SELECT * FROM user_table WHERE user_id=$user_id";
$result = $connection->query($sql);
$user_email = "";
$user_password = "";

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $user_email = $row['user_email'];
    $user_password = $row['user_password'];
  }
} else {
  echo '<script>alert("Could not find the user_id from session, please login again.")</script>';
}

if (isset($_POST["saveBtn"])) {
  $newPassword = $_POST["newPassword"];
  $confirmPassword = $_POST["confirmPassword"];

  if ($newPassword != $confirmPassword) {
    echo '<script>alert("Password and confirm password do not matched")</script>';
  } else {
    $sql = $connection->prepare("UPDATE user_table SET user_password = ? WHERE user_id=?");

    // Execute the SQL statement
    $result = $sql->execute([$newPassword, $user_id]);

    if ($result) {
      echo '<script>alert("Successfully updated password!")</script>';
    } else {
      echo '<script>alert("Fail to update")</script>';
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>InternHub - Back End Settings</title>
  <link rel="stylesheet" href="CSS/backend_setting.css">
</head>

<body>
  <header>
    <header>
      <div class="container">
        <img src="css/images/logo.png" alt="Job Seeker" class="logo">
        <nav>
          <ul>
            <li><a href="backend_admin_job.php">Posted Jobs</a></li>
            <li><a href="backend_admin_students.php">Students</a></li>
            <li><a href="backend_admin_company.php">Companies</a></li>
            <div class="dropdown">
              <a href="#" class="dropbtn"><img src="css/images/profile.png" alt="Profile" class="signin-img"></a>
              <div class="dropdown-content" style="min-width: 15ch;">
                <a href="backend_acc_deletion_student.php">Deletion</a>
                <a href="backend_acc_setting.php">Settings</a>
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

      <div class="setting-field">
        <div class="additional-box">
          <h3>Email</h3>
          <input type="email" id="emailText" value="<?php echo htmlspecialchars($user_email); ?>" class="input-field">
        </div>
        <br>
        <div class="additional-box">
          <h3>Password</h3>
          <span id="editPassword"><img src="css/images/edit.png" alt="Edit Password" style="width: 30px; height: 30px; float: right;"></span>
          <input type="password" id="passwordText" value="<?php echo htmlspecialchars($user_password); ?>" class="input-field">
        </div>
      </div>

    </div>

    <div class="containerP">


      <!-- Delete Account Box -->
      <!-- <div class="additional-box2 delete-account-box">
      <h3>Delete Account</h3>
      <button id="deleteAccount">Delete</button>
    </div> -->
    </div>

    <!-- Edit Password Window -->
    <div id="editPasswordWindow" class="edit-window">
      <div class="edit-window-content">
        <span class="close">&times;</span>
        <h2>Change Password</h2>
        <form action="#" method="post">
          <label for="newPassword">New Password:</label><br>
          <input type="password" id="newPassword" name="newPassword" required><br>
          <label for="confirmPassword">Confirm Password:</label><br>
          <input type="password" id="confirmPassword" name="confirmPassword" required><br>
          <button id="savePassword" type="submit" name="saveBtn">Save</button>
        </form>

        <!-- <label for="newPassword">New Password:</label><br>
      <input type="password" id="newPassword"><br>
      <label for="confirmPassword">Confirm Password:</label><br>
      <input type="password" id="confirmPassword"><br>
      <button id="savePassword">Save</button> -->
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
            <img src="css/images/logo.png" alt="Job Seeker">
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