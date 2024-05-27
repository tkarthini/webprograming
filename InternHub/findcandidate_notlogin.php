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

// Fetch students from database
$sql = "SELECT user_id, student_name, student_location, student_profilepicture, student_programme FROM student_table";
$result = $conn->query($sql);

$students = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>InternHub - Find Students</title>
  <link rel="stylesheet" href="CSS/findcompany_student.css">
</head>
<body>
  <header>
        <div class="container">
            <a href="index.php">
                <img src="CSS/images/logo.png" alt="Job Seeker" class="logo">
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
    <h1>Find the right student for you</h1>
    <div class="search-container">
      <input type="text" placeholder="Search students...">
      <button type="submit">Search</button>
    </div>
    <hr>
    <h3>Showing recommended student results</h3>
  </div>

  <div class="box-container">
    <?php foreach ($students as $student): ?>
      <div class="box">
        <img src="uploads/<?php echo htmlspecialchars($student['student_profilepicture']); ?>" alt="Student Profile Picture" class="box-image">
        <div class="box-details">
          <h2><?php echo htmlspecialchars($student['student_name']); ?></h2>
          <p><?php echo htmlspecialchars($student['student_location']); ?></p>
          <p><?php echo htmlspecialchars($student['student_programme']); ?></p>
          <a href="viewprofile_company.php?user_id=<?php echo $student['user_id']; ?>" class="box-button">View More</a>
        </div>
      </div>
    <?php endforeach; ?>
    <!-- Dummy Company Card -->
    <div class="box">
      <img src="CSS/images/NurFatihahSuhana.png" alt="Dummy Job Image" class="box-image">
      <div class="box-details">
        <h2>Nur Fatihah Suhana</h2> 
        <p>Bayan Lepas, Penang</p>
        <p>Bachelors in Graphics Design</p>
        <a href="viewprofilecompany_student.php" class="box-button">View More</a>
      </div>
    </div>
    <div class="box">
      <img src="CSS/images/FerrisTan.png" alt="Dummy Job Image" class="box-image">
      <div class="box-details">
        <h2>Ferris Tan</h2> 
        <p>Klang, Selangor</p>
        <p>Bachelors in Media & Communications</p>
        <a href="viewprofilecompany_student.php" class="box-button">View More</a>
      </div>
    </div>
  </div>

  <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">
                    <img src="CSS/images/logo.png" alt="Job Seeker">
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

  <script>
    // Event listener to the "Sign Out" link
    document.querySelector('.signout').addEventListener('click', function() {
      // Redirect the user to index.php
      window.location.href = 'index.php';
    });
  </script>
</body>
</html>
