<?php
include_once "connection.php";
session_start();

// && isset($_POST["signup"])
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Collect inputs from the form
  $username = $_POST["username"];
  $password = $_POST["password"];

  $sql = "SELECT * FROM user_table WHERE user_type='admin' AND user_name='$username' AND user_password='$password'";
  $result = $connection->query($sql);

  // echo $result;

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $_SESSION['user_id'] = $row['user_id'];
    }
    header("Location: backend_admin_job.php");
  } else {
    echo '<script>alert("Invalid username/password!")</script>';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>InternHub - Admin Log In</title>
  <link rel="stylesheet" href="CSS/signin.css">
</head>

<body>
  <header>
    <div class="container">
      <img src="CSS/images/logo.png" alt="Job Seeker" class="logo">
    </div>
  </header>

  <body>
    <div class="containerF">
      <h2>Log In</h2>
      <form action="#" method="post">
        <div class="input-group">
          <label for="username">Email Address</label>
          <input type="text" id="username" name="username" required>
        </div>

        <div class="input-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required>
          <a href="#" class="forgot-password">Forgot Password?</a>
        </div>
        <button type="submit" class="btn">Log In</button>
      </form>

    </div>
  </body>

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
</body>

</html>