<?php
$type = $_GET["type"];

if($type == "student") {
    $redirect = "aboutus_student.php";
    
}
elseif($type == "company") {
    $redirect = "aboutus_company.php";
    
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InternHub - Complete Profile</title>
    <link rel="stylesheet" href="css/completeprofile.css">
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

    <body>
        <div class="outer-box">
            <h1>Nice one!</h1>
            <p>Your basic InternHub Profile is now up and running.</p>
            <div class="inner-box">
                <div class="icon">
                    <img src="images/edit%20profile.png" alt="Icon">
                </div>
                <div class="content">
                    <p>The more you add to your Profile, the more you stand out from other candidates.</p>
                    <button onclick="completeProfile()">Complete Your Profile</button>
                </div>
            </div>
            <a href="<?php echo $redirect; ?>"><button class="continue-btn" onclick="">Continue</button></a>
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
