<?php
include_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    // Collect inputs from the form
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];
    $type = $_POST["user_type"];

    // Check if the user already exists
    $sql_check_user = $connection->prepare("SELECT * FROM user_table WHERE user_email = ?");
    $sql_check_user->bind_param("s", $email);
    $sql_check_user->execute();
    $result = $sql_check_user->get_result();

    if ($password !== $confirmPassword) {
        // Passwords do not match
        echo "<script>alert('Passwords do not match. Please try again.');</script>";
    } else {
        // Insert the user into the database
        $sql_insert_user = $connection->prepare("INSERT INTO user_table (user_email, user_password, user_type) VALUES (?, ?, ?)");
        $sql_insert_user->bind_param("sss", $email, $password, $type);
        if ($sql_insert_user->execute()) {
            // Redirect the user based on user type
            header("Location: completeprofile.php?type=" . $type);
            exit;
        } else {
            // Failed to insert user into the database
            echo "<script>alert('Failed to register user. Please try again later.');</script>";
            echo "Error: " . $connection->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InternHub - Register</title>
    <link rel="stylesheet" href="CSS/register.css">

</head>

<body>
    <header>
        <div class="container">
            <a href="index.php">
                <img src="CSS/images/logo.png" alt="Job Seeker" class="logo">
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

    <body>
        <div class="containerR">
            <h2>Register</h2>
            <form action="#" method="post">
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="input-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>
                <div class="input-groupC">
                    <input type="radio" id="student" name="user_type" value="student" checked>
                    <label for="student">Student</label>
                    <input type="radio" id="company" name="user_type" value="company">
                    <label for="company">Company</label>
                </div>

                <div class="input-group">
                    <input type="checkbox" id="privacy_policy" name="privacy_policy" required>
                    <label for="privacy_policy">By registering, I agree to the Privacy Policy and consent to the collection, storage and use of my personal data as described in that policy.</label>
                </div>
                <button type="submit" class="btn" name="register">Register</button>
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
