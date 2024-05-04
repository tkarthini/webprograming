<?php
include_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    // Collect inputs from the form
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];
    $type = $_POST["user_type"];

    // Check if the user already exists
    $sql_check_user = $connection->prepare("SELECT * FROM user_table WHERE user_email = ?");
    $sql_check_user->bind_param("s", $email);
    $sql_check_user->execute();
    $result = $sql_check_user->get_result();

    if ($password !== $confirmPassword) {
        // Passwords do not match
        echo "<script>alert('Passwords do not match. Please try again.');</script>";
    } else {
        // Insert the user into the database
        $sql_insert_user = $connection->prepare("INSERT INTO user_table (user_email, user_password, user_type) VALUES (?, ?, ?)");
        $sql_insert_user->bind_param("sss", $email, $password, $type);
        if ($sql_insert_user->execute()) {
            // Registration successful, redirect based on user type
            if ($type === "student") {
                header("Location: aboutus_student.php");
            } elseif ($type === "company") {
                header("Location: aboutus_company.php");
            }
            exit; // Make sure to stop executing the current script after redirecting
        } else {
            // Failed to insert user into the database
            echo "<script>alert('Failed to register user. Please try again later.');</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>InternHub - Complete Profile</title>
  <link rel="stylesheet" href="css/completeprofile.css">
</head>
<body>
  <header>
    <div class="container">
       <a href="index.php">
        <img src="images/logo.png" alt="Job Seeker" class="logo">
        <nav>
            <ul>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="findjob_notlogin.php">Find Jobs</a></li>
                <li><a href="#">Students</a></li>
                <li><a href="#">Companies</a></li>
                <li><a href="signin.php" id="signinBtn">Sign In</a></li>
            </ul>
        </nav>
        </a>
    </div>
</header>
  
 <body>

<div class="outer-box">
    <h1>Nice one!</h1>
    <p>Your basic InternHub Profile is now up and running.</p>
    <div class="inner-box">
        <div class="icon">
            <img src="images/edit%20profile.png" alt="Icon">
        </div>
        <div class="content">
            <p>The more you add to your Profile, the more you stand out from other candidates.</p>
            <button onclick="completeProfile()">Complete Your Profile</button>
        </div>
    </div>
    <button class="continue-btn" onclick="continueToNextPage()">Continue</button>
</div>

<script>
  function continueToNextPage() {
    window.location.href = "nextpage.php"; // Replace "nextpage.php" with the URL of the desired page
  }
</script>

</body>
 
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
            <li><a href="#">Search</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Manage Application</a></li>
          </ul>
        </div>
        <div class="footer-section">
          <h3>Companies</h3>
          <ul>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Post Job</a></li>
            <li><a href="#">Manage Application</a></li>
          </ul>
        </div>
        <div class="footer-section">
          <h3>Support</h3>
          <ul>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">Help</a></li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
</footer>
</body>
</html>
