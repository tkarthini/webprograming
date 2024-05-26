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
      <a href="viewjob_student.php?job_id=<?php echo $job['id']; ?>" class="box-button">View More</a>

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
      <a href="viewjob_student.php?job_id=<?php echo $job['id']; ?>" class="box-button">View More</a>

    </div>
  </div>
  <div class="box">
    <img src="Images/boomedia.png" alt="Dummy Job Image" class="box-image">
    <div class="box-details">
      <h2>Video Editor</h2> <!-- Removed anchor tag -->
      <p>Boomedia Productions</p>
      <p>Subang Jaya, Selangor</p>
      <a href="viewjob_student.php?job_id=<?php echo $job['id']; ?>" class="box-button">View More</a>

    </div>
  </div>
  <div class="box">
    <img src="Images/sunway.png" alt="Dummy Job Image" class="box-image">
    <div class="box-details">
      <h2>Digital Illustrator</h2> <!-- Removed anchor tag -->
      <p>Sunway Berhad</p>
      <p>Bandar Sunway, Selangor</p>
      <a href="viewjob_student.php?job_id=<?php echo $job['id']; ?>" class="box-button">View More</a>

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
