<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "internhub_database";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>InternHub - Home</title>
  <link rel="stylesheet" href="css/styles.css">
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
            <li><a href="backend_admin_login.php" id="backendSigninBtn">Admin Sign In</a></li>
            <li><a href="signin.php" id="signinBtn">Sign In</a></li>
          </ul>
        </nav>
      </a>
    </div>
  </header>

  <section id="scrollToSection" class="hero">
    <div class="container">
      <h2>FIND THE INTERNSHIP THAT <span>SHINE</span> YOUR LIFE</h2>
      <p>Intern Hub is here for you to get your dream intern fast. Unlock your new step of life.</p>
      <a href="findjob_notlogin.php" class="btn">Search Internship</a>
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
              <li><a href="findjob_notlogin.php">Job Search</a></li>
              <li><a href="signin.php">Profile</a></li>
              <li><a href="signin.php">Manage Application</a></li>
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
              <li><a href="aboutus.php">About Us</a></li>
              <li><a href="contactus.php">Contact Us</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </footer>
</body>

</html>