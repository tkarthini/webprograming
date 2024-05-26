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

// Fetch companies from database
$sql = "SELECT company_id, company_name, company_location, profilePicture FROM company_table";
$result = $conn->query($sql);

$companies = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $companies[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>InternHub - Find Companies</title>
  <link rel="stylesheet" href="CSS/findcompany_student.css">
</head>
<body>
  <header>
        <div class="container">
            <img src="images/logo.png" alt="Job Seeker" class="logo">
            <nav>
                <ul>
                    <li><a href="aboutus_student.php">About Us</a></li>
                    <li><a href="findjob_student.php">Job Search</a></li>
                    <li><a href="findcompany_student.php">Company Profiles</a></li>
                    <li><a href="profile_student.php">Profile</a></li>
                    <div class="dropdown">
                        <a href="#" class="dropbtn"><img src="images/profile.png" alt="Profile" class="signin-img"></a>
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

  <div class="search-section">
    <h1>Find the right company for you</h1>
    <div class="search-container">
      <input type="text" placeholder="Search companies...">
      <button type="submit">Search</button>
    </div>
    <hr>
    <h3>Showing recommended company results</h3>
  </div>

  <div class="box-container">
    <?php foreach ($companies as $company): ?>
      <div class="box">
        <img src="<?php echo htmlspecialchars($company['profilePicture']); ?>" alt="Company Profile Picture" class="box-image">
        <div class="box-details">
          <h2><?php echo htmlspecialchars($company['company_name']); ?></h2>
          <p><?php echo htmlspecialchars($company['company_location']); ?></p>
          <a href="viewprofilecompany_student.php?company_id=<?php echo $company['company_id']; ?>" class="box-button">View More</a>
        </div>
      </div>
    <?php endforeach; ?>
    
    <!-- Dummy Company Card -->
    <div class="box">
      <img src="Images/imini.png" alt="Dummy Job Image" class="box-image">
      <div class="box-details">
        <h2>IMini Sdn Bhd</h2> 
        <p>Bayan Lepas, Penang</p>
        <a href="viewprofilecompany_student.php" class="box-button">View More</a>
      </div>
    </div>
    <div class="box">
      <img src="Images/yeabusiness.png" alt="Dummy Job Image" class="box-image">
      <div class="box-details">
        <h2>YEA Business Berhad</h2> 
        <p>Subang Jaya, Selangor</p>
        <a href="viewprofilecompany_student.php" class="box-button">View More</a>
      </div>
    </div>
    <div class="box">
      <img src="Images/karisma.png" alt="Dummy Job Image" class="box-image">
      <div class="box-details">
        <h2>Karisma Kreatif Berhad</h2> 
        <p>Kuala Lumpur, Malaysia</p>
        <a href="viewprofilecompany_student.php" class="box-button">View More</a>
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
    // Event listener to the "Sign Out" link
    document.querySelector('.signout').addEventListener('click', function() {
      // Redirect the user to index.php
      window.location.href = 'index.php';
    });
  </script>
</body>
</html>
