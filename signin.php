<?php
include_once "brackets/connection.php";

$message = " ";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
    // Collect inputs from the form
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $acc_type = $_POST["acc_type"];

    // Encrypt the password
    $e_pwd = password_hash($pwd, PASSWORD_DEFAULT);

    // Insert record into the user table
    $sql = $connection->prepare("INSERT INTO user(user_email, user_password, user_level) VALUES(?, ?, ?)");

    // Execute the SQL statement
    $result = $sql->execute([$email, $e_pwd, $acc_type]);

    if ($result) {
        $message = "Successfully Signed In";
    } else {
        $message = "Failed to Sign In";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>InternHub - Sign In</title>
  <link rel="stylesheet" href="signin.css">
</head>
<body>
  <header>
    <div class="container">
      <img src="images/logo.png" alt="Job Seeker" class="logo">
      <nav>
        <ul>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Find Jobs</a></li>
          <li><a href="#">Students</a></li>
          <li><a href="#">Companies</a></li>
          <li><button id="signinBtn">Sign In</button></li>
        </ul>
      </nav>
    </div>
  </header>
  
  <body>

<div class="containerF">
    <h2>Sign In</h2>
    <form action="#" method="post">
        <div class="input-group">
            <label for="username">Email</label>
            <input type="text" id="username" name="username" required>
        </div>
        
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <a href="#" class="forgot-password">Forgot Password?</a>
        </div>
        <button type="submit" class="btn">Sign In</button>
    </form>
    <div class="new-user-link">
        <span>New User? </span><a href="#" class="signup-link">Sign Up Now!</a>
    </div>
</div>

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
