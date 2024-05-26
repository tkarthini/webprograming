<?php
include_once "connection.php";

session_start(); // Start the session

$message = "";
$redirectUrl = ""; // Initialize the redirect URL variable

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signin"])) {
    // Collect inputs from the form
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    // Check if the user exists
    $sql_check_user = $connection->prepare("SELECT * FROM user_table WHERE user_email = ?");
    if (!$sql_check_user) {
        error_log("Prepare statement failed: " . $connection->error);
    }
    $sql_check_user->bind_param("s", $email);
    $sql_check_user->execute();
    $result = $sql_check_user->get_result();
    if (!$result) {
        error_log("Get result failed: " . $sql_check_user->error);
    }

    if ($result->num_rows > 0) {
        // User exists
        $user_exists = true;
        
        // Fetch user data
        $user = $result->fetch_assoc();
        
        // Validate password
        if (password_verify($pwd, $user['user_password'])) {
            // Password is correct
            logSignInEvent($user['user_id']);
            // Redirect the user based on user type
            if ($user['user_type'] === "student") {
                $_SESSION['success_message'] = "Welcome back, " . $user['user_name'] . "! You have successfully signed in.";
                $redirectUrl = "aboutus_student.php";
            } elseif ($user['user_type'] === "company") {
                $_SESSION['success_message'] = "Welcome back, " . $user['user_name'] . "! You have successfully signed in.";
                $redirectUrl = "aboutus_company.php";
            }
            // If user exists and password is correct, set message and redirect URL
            $_SESSION['message'] = "User exists. Redirecting to Homepage";
            $_SESSION['redirectUrl'] = $redirectUrl;

            // Redirect to avoid resubmission on refresh
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            // Password is incorrect
            $_SESSION['message'] = "Invalid email or password. Please try again.";
            error_log("Password verification failed for user: $email");
        }
    } else {
        // User does not exist
        $user_exists = false;
        $_SESSION['message'] = "Invalid email or password. Please try again.";
        error_log("No user found with email: $email");
    }
}

// Function to log sign-in event
function logSignInEvent($userId) {
    global $connection;
    $sql_insert_log = $connection->prepare("INSERT INTO user_logs (user_id, event_type, event_timestamp) VALUES (?, 'Sign In', NOW())");
    if (!$sql_insert_log) {
        error_log("Prepare statement for log failed: " . $connection->error);
    }
    $sql_insert_log->bind_param("i", $userId);
    $sql_insert_log->execute();
    if ($sql_insert_log->error) {
        error_log("Execute statement for log failed: " . $sql_insert_log->error);
    }
}

// Set the message and redirect URL for JavaScript
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']); // Clear the message after using it
}
if (isset($_SESSION['redirectUrl'])) {
    $redirectUrl = $_SESSION['redirectUrl'];
    unset($_SESSION['redirectUrl']); // Clear the redirect URL after using it
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InternHub - Sign In</title>
    <link rel="stylesheet" href="CSS/signin.css">
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
    var message = "<?php echo $message; ?>";
    var redirectUrl = "<?php echo $redirectUrl; ?>";
    if (message.trim() !== "") {
        alert(message);
        if (redirectUrl !== "") {
            window.location.replace(redirectUrl);
        }
    }
    </script>
</body>
</html>
