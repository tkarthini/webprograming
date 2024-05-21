<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>InternHub - Find Job</title>
  <link rel="stylesheet" href="css/findjob_student.css">
</head>
<body>
  <header>
    <div class="container">
     <a href="aboutus_student.php">
      <img src="images/logo.png" alt="Job Seeker" class="logo">
      <nav>
      <ul>
        <li><a href="aboutus_student.php">About Us</a></li>
        <li><a href="findjob_student.php">Job Search</a></li>
        <li><a href="findcompany_student.php">Company Profiles</a></li>
        <li><a href="#">Profile</a></li>
        <div class="dropdown">
          <a href="#" class="dropbtn"><img src="images/profile.png" alt="Profile" class="signin-img"></a>
          <div class="dropdown-content">
            <a href="#">Profile</a>
            <a href="manageapplication_student.php">Manage Applications</a>
            <a href="settings_student.php">Settings</a>
            <hr>
            <a href="#" class="signout">Sign Out</a>
          </div>
        </div>
      </ul>
      </nav>
    </div>
  </header>

 <div class="search-section">
    <h1>Find the right job for you</h1>
    <div class="search-container">
      <input type="text" placeholder="Search jobs...">
      <button type="submit">Search</button>
    </div>
    <hr>
    <h3>Showing recommended job result</h3>
</div>
     <div class="box-container">
    <div class="box">
      <img src="images/boomedia.png" alt="Example Image" class="box-image">
      <div class="box-content">
        <h2>Social Media Manager</h2>
        <p>Puchong, Selangor</p>
        <p>Social Media Content Creator and Manager</p>
        <p>MYR 500 - 800</p>
        <button class="box-button" onclick="window.location.href='viewjob(SMMboomedia)_student.php'">Apply</button>
      </div>
    </div>
  </div>
  <div class="box-container">
    <div class="box">
      <img src="images/sutera.png" alt="Example Image" class="box-image">
      <div class="box-content">
        <h2>Graphics Designer</h2>
        <p>Johor Baharu, Johor</p>
        <p>Graphic Design (Design and Architecture)</p>
        <p>MYR 800 - 1000</p>
        <button class="box-button" onclick="window.location.href='viewjob(GDsutera)_student.php'">Apply</button>
      </div>
    </div>
  </div>
  <div class="box-container">
    <div class="box">
      <img src="images/yeabusiness.png" alt="Example Image" class="box-image">
      <div class="box-content">
        <h2>UI / UX Designer</h2>
        <p>Balik Pulau, Penang</p>
        <p>Web Development and Production</p>
        <p>MYR 1000</p>
        <button class="box-button" onclick="window.location.href='viewjob(UIUXyea)_student.php'">Apply</button>
      </div>
    </div>
  </div>
  <div class="box-container">
    <div class="box">
      <img src="images/imini.png" alt="Example Image" class="box-image">
      <div class="box-content">
        <h2>Multimedia Creative Designer</h2>
        <p>Petaling Jaya, Selangor</p>
        <p>Graphic Design</p>
        <p>MYR 300 - 800</p>
        <button class="box-button" onclick="window.location.href='viewjob(MCDimini)_student.php'">Apply</button>
      </div>
    </div>
  </div>
    <div class="box-container">
    <div class="box">
      <img src="images/sunwaylagoon.png" alt="Example Image" class="box-image">
      <div class="box-content">
        <h2>Creative Illustrator</h2>
        <p>Bandar Sunway, Selangor</p>
        <p>Graphic Design</p>
        <p>MYR 450 - 800</p>
        <button class="box-button" onclick="window.location.href='viewjob(CIsunway)_student.php'">Apply</button>
      </div>
    </div>
  </div>
  <div class="box-container">
    <div class="box">
      <img src="images/tealive.jpg" alt="Example Image" class="box-image">
      <div class="box-content">
        <h2>Social Media Manager</h2>
        <p>Kuala Lumpur, Malaysia</p>
        <p>Social Media Post Management</p>
        <p>MYR 600 - 800</p>
        <button class="box-button">Apply</button>
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
<script>
    // Event listener to the "Sign Out" link
    document.querySelector('.signout').addEventListener('click', function() {
      // Redirect the user to index.php
      window.location.href = 'index.php';
    });
  </script>
</body>
</html>
