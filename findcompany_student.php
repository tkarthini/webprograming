<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>InternHub - Find Comapny</title>
  <link rel="stylesheet" href="css/findcompany_student.css">
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
    <h1>Find the right company for you</h1>
    <div class="search-container">
      <input type="text" placeholder="Search companies...">
      <button type="submit">Search</button>
    </div>
    <hr>
    <h3>Showing recommended company result</h3>
</div>
     <div class="box-container">
    <div class="box">
      <img src="images/sunway.png" alt="Example Image" class="box-image">
      <div class="box-content">
        <h2>Sunway Berhad</h2>
        <p>Level 14, Menara Sunway, Jalan Lagoon Timur,</p>
        <p>Bandar Sunway, Petaling Jaya, Malaysia</p>
        <p>Trades and Services</p>
        <a href="companyprofile(sunway)_student.php"><button class="box-button">View Profile</button></a>
      </div>
    </div>
  </div>
  <div class="box-container">
    <div class="box">
      <img src="images/sutera%20harbour.png" alt="Example Image" class="box-image">
      <div class="box-content">
        <h2>Sutera Harbour Resort</h2>
        <p>1 Sutera Harbour Boulevard, Sutera harbour, </p>
        <p>88100 Kota Kinabalu</p>
        <p>Hotel and Accommodation Services</p>
        <a href="companyprofile(sutera)_student.php"><button class="box-button">View Profile</button></a>
      </div>
    </div>
  </div>
  <div class="box-container">
    <div class="box">
      <img src="images/boomedia.png" class="box-image">
      <div class="box-content">
        <h2>Boomedia Sdn Bhd</h2>
        <p>Jalan Sultan Ahmad Shah, Georgetown, 10050 </p>
        <p>George Town, Penang, Malaysia</p>
        <p>Advertising, Marketing and Communications</p>
        <a href="companyprofile(boomedia)_student.php"><button class="box-button">View Profile</button></a>
      </div>
    </div>
  </div>
  <div class="box-container">
    <div class="box">
      <img src="images/imini.png" alt="Example Image" class="box-image">
      <div class="box-content">
        <h2>IMini Technology</h2>
        <p>Changkat Bukit Utama Bandar Utama Petaling </p>
        <p>Jaya Selangor Malaysia</p>
        <p>Computer Software and Networking</p>
        <a href="companyprofile(imini)_student.php"><button class="box-button">View Profile</button></a>
      </div>
    </div>
  </div>
    <div class="box-container">
    <div class="box">
      <img src="images/yeabusiness.png" alt="Example Image" class="box-image">
      <div class="box-content">
        <h2>Yea Business</h2>
        <p>No.20, Jalan PJS 5/28,PJCC, Pusat Dagangan </p>
        <p>Petaling, 46150 Petaling Jaya, Selangor</p>
        <p>Broadcast Media, Entertainment and Publishing</p>
        <a href="companyprofile(yea)_student.php"><button class="box-button">View Profile</button></a>
      </div>
    </div>
  </div>
  <div class="box-container">
    <div class="box">
      <img src="images/pirana.png" alt="Example Image" class="box-image">
      <div class="box-content">
        <h2>Pirana Graphics</h2>
        <p>Leisure Commerce Square Jalan PJS 8/9 Bandar</p>
        <p>Sunway Petaling Jaya Selangor Malaysia</p>
        <p>Advertising, Marketing and Communications</p>
        <a href="companyprofile(sunway)_student.php"><button class="box-button">View Profile</button></a>
      </div>
    </div>
  </div>
  <div class="box-container">
    <div class="box">
      <img src="images/web%20master.png" alt="Example Image" class="box-image">
      <div class="box-content">
        <h2>Web Masters Technologies Sdn Bhd</h2>
        <p>Unit 19-10-5, UOA Centre, UOA 1, No. 19, Jalan </p>
        <p>Pinang, Penang</p>
        <p>Computer Software and Networking</p>
        <button class="box-button">View Profile</button>
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
