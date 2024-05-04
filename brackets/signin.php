<?php
include_once "connection.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signin"])) {
    // Collect inputs from the form
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    // Check if the user exists
    $sql_check_user = $connection->prepare("SELECT * FROM user_table WHERE user_email = ?");
    $sql_check_user->bind_param("s", $email);
    $sql_check_user->execute();
    $result = $sql_check_user->get_result();

    if ($result->num_rows > 0) {
        // User exists
        $user_exists = true;
        
        // Fetch user data
        $user = $result->fetch_assoc();
        
        logSignInEvent($user['user_id']);
        
        // Redirect the user based on user type
        if ($user['user_type'] === "student") {
            header("Location: aboutus_student.php");
            exit();
        } elseif ($user['user_type'] === "company") {
            header("Location: aboutus_company.php");
            exit();
        }
    } else {
        // User does not exist
        $user_exists = false;
        $message = "User not exist. Please Sign Up";
    }

    if ($user_exists) {
        // If the user exists, show a message
        $message = "User exists. Redirecting to Homepage";
    }
}

        // Function to log sign-in event
    function logSignInEvent($userId) {
        global $connection;
        $sql_insert_log = $connection->prepare("INSERT INTO user_logs (user_id, event_type, event_timestamp) VALUES (?, 'Sign In', ?)");
        $currentTimestamp = date('Y-m-d H:i:s');
        $sql_insert_log->bind_param("is", $userId, $currentTimestamp);
        $sql_insert_log->execute();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>InternHub - Sign In</title>
  <link rel="stylesheet" href="css/signin.css">
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
                <li><a href="#">Students</a></li>
                <li><a href="#">Companies</a></li>
                <li><a href="signin.php" id="signinBtn">Sign In</a></li>
            </ul>
        </nav>
        </a>
    </div>
</header>
  
<div class="containerF">
    <h2>Sign In</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="input-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" required>
        </div>
        
        <div class="input-group">
            <label for="pwd">Password</label>
            <input type="password" id="pwd" name="pwd" required>
            <a href="#" class="forgot-password">Forgot Password?</a>
        </div>
        <button type="submit" class="btn" name="signin">Sign In</button>
    </form>

    <div class="new-user-link">
    <span>New User? </span><a href="register.php" class="signup-link">Sign Up Now!</a>
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

<!-- JavaScript to display popup for new users -->
<script>
    var message = "<?php echo $message; ?>";
    if (message.trim() === "User not exist. Please Sign Up") {
        // Show your pop-up here
        alert(message);
    }
</script>
</body>
</html>
