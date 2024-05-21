<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>InternHub - Find Candidate</title>
  <link rel="stylesheet" href="css/findcandidate_company.css">
</head>
<body>
  <header>
    <div class="container">
     <a href="aboutus_company.php">
      <img src="images/logo.png" alt="Job Seeker" class="logo">
      <nav>
      <ul>
        <li><a href="aboutus_company.php">About Us</a></li>
        <li><a href="findcandidate_company.php">Candidate Profiles</a></li>
        <li><a href="manageapplication_company.php">Applications</a></li>
        <li><a href="#">Profile</a></li>
        <div class="dropdown">
          <a href="#" class="dropbtn"><img src="images/profile.png" alt="Profile" class="signin-img"></a>
          <div class="dropdown-content">
            <a href="#">Profile</a>
            <a href="manageapplication_company.php">Manage Application</a>
            <a href="settings_company.php">Settings</a>
            <hr>
            <a href="#" class="signout">Sign Out</a>
          </div>
        </div>
      </ul>
      </nav>
    </div>
  </header>

 <div class="search-section">
    <h1>Find the right candidate for you</h1>
    <div class="search-container">
      <input type="text" placeholder="Search candidates...">
      <button type="submit">Search</button>
    </div>
    <hr>
    <h3>Showing recommended candidate result</h3>
</div>
     <div class="box-container">
    <div class="box">
      <img src="images/TanJeiHong.png" alt="Example Image" class="box-image">
      <div class="box-content">
        <h2>Tan Jie Hong</h2>
        <p>23 years old</p>
        <p>Penang, Malaysia</p>
        <p>BA in Film Studies</p>
        <a href="studentprofile(TanJieHong)_company.php" class="box-button">View Profile</a>
      </div>
    </div>
  </div>
  <div class="box-container">
    <div class="box">
      <img src="images/AbbyMethews.png" alt="Example Image" class="box-image">
      <div class="box-content">
        <h2>Abby Methews</h2>
        <p>24 years old</p>
        <p>Kuala Lumpur, Malaysia</p>
        <p>BA in Media Technology</p>
        <a href="studentprofile(AbbyMethews)_company.php" class="box-button">View Profile</a>
      </div>
    </div>
  </div>
  <div class="box-container">
    <div class="box">
      <img src="images/NurFatihahSuhana.png" alt="Example Image" class="box-image">
      <div class="box-content">
        <h2>Nur Fatihah Suhana</h2>
        <p>21 years old</p>
        <p>Johor, Malaysia</p>
        <p>BA in Advertising and Marketing Communications</p>
        <a href="studentprofile(FatihahSuhana)_company.php" class="box-button">View Profile</a>
      </div>
    </div>
  </div>
  <div class="box-container">
    <div class="box">
      <img src="images/Kiveena%20Seetha.png" alt="Example Image" class="box-image">
      <div class="box-content">
        <h2>Kiveena Seetha</h2>
        <p>22 years old</p>
        <p>Pahang, Malaysia</p>
        <p>BA in Theater Arts</p>
        <a href="studentprofile(kiveena)_company.php" class="box-button">View Profile</a>
      </div>
    </div>
  </div>
    <div class="box-container">
    <div class="box">
      <img src="images/MuhammadAliKemal.png" alt="Example Image" class="box-image">
      <div class="box-content">
        <h2>Muhammad Ali Kemal</h2>
        <p>24 years old</p>
        <p>Perlis, Malaysia</p>
        <p>BA in Music Production</p>
        <a href="studentprofile(Ali%20Kemal)_company.php" class="box-button">View Profile</a>
      </div>
    </div>
  </div>
  <div class="box-container">
    <div class="box">
      <img src="images/SinanDemir.png" alt="Example Image" class="box-image">
      <div class="box-content">
        <h2>Sinan Demir</h2>
        <p>25 years old</p>
        <p>Kuala Lumpur, Malaysia</p>
        <p>BA in Game Design and Development</p>
        <a href="studentprofile(SinanDemir)_company.php" class="box-button">View Profile</a>
      </div>
    </div>
  </div>
  <div class="box-container">
    <div class="box">
      <img src="images/FerrisTan.png" alt="Example Image" class="box-image">
      <div class="box-content">
        <h2>Ferris Tan</h2>
        <p>23 years old</p>
        <p>Kuala Lumpur, Malaysia</p>
        <p>BA in Digital Media</p>
        <a href="studentprofile(FerrisTan)_company.php" class="box-button">View Profile</a>
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
