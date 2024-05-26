<?php
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

// Fetch jobs from database
$sql = "SELECT id, job_title, company, location, description, image FROM jobs_table";
$result = $conn->query($sql);

$jobs = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $jobs[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>InternHub - Find Jobs</title>
  <link rel="stylesheet" href="CSS/findcompany_student.css">
</head>
<body>
  <header>
        <div class="container">
            <a href="index.php">
                <img src="images/logo.png" alt="Job Seeker" class="logo">
                <nav>
                    <ul>
                        <li><a href="aboutus.php">About Us</a></li>
                        <li><a href="findcandidate_notlogin.php">Find Candidates</a></li>
                        <li><a href="signin.php" id="signinBtn">Sign In</a></li>
                    </ul>
                </nav>
            </a>
        </div>
    </header>

  <div class="search-section">
    <h1>Find the right job for you</h1>
    <div class="search-container">
      <input type="text" placeholder="Search jobs...">
      <button type="submit">Search</button>
    </div>
    <hr>
    <h3>Showing recommended job results</h3>
  </div>

  <?php if (count($jobs) > 0): ?>
<div class="box-container">
  <?php foreach ($jobs as $job): ?>
  <div class="box">
    <img src="uploads/<?php echo htmlspecialchars($job['image']); ?>" alt="Job Image" class="box-image">
    <div class="box-details">
      <h2><?php echo htmlspecialchars($job['job_title']); ?></h2> <!-- Removed anchor tag -->
      <p><?php echo htmlspecialchars($job['company']); ?></p>
      <p><?php echo htmlspecialchars($job['location']); ?></p>
      <a href="signin.php" class="box-button">View More</a>
    </div>
  </div>
  <?php endforeach; ?>
  
   <!-- Dummy Job Card -->
  <div class="box">
    <img src="Images/imini.png" alt="Dummy Job Image" class="box-image">
    <div class="box-details">
      <h2>Social Media Content Creator</h2> <!-- Removed anchor tag -->
      <p>IMini Sdn Bhd</p>
      <p>Bayan Lepas, Penang</p>
      <a href="#" class="box-button">View More</a>
    </div>
  </div>
  <div class="box">
    <img src="Images/boomedia.png" alt="Dummy Job Image" class="box-image">
    <div class="box-details">
      <h2>Video Editor</h2> <!-- Removed anchor tag -->
      <p>Boomedia Productions</p>
      <p>Subang Jaya, Selangor</p>
      <a href="#" class="box-button">View More</a>
    </div>
  </div>
  <div class="box">
    <img src="Images/sunway.png" alt="Dummy Job Image" class="box-image">
    <div class="box-details">
      <h2>Digital Illustrator</h2> <!-- Removed anchor tag -->
      <p>Sunway Berhad</p>
      <p>Bandar Sunway, Selangor</p>
      <a href="#" class="box-button">View More</a>
    </div>
  </div>
</div>
<?php else: ?>
<p>No jobs found.</p>
<?php endif; ?>

  

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
