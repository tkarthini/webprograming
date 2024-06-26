<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InternHub - About Us</title>
    <link rel="stylesheet" href="css/aboutus_student.css">
</head>

<body>
    <header>
        <div class="container">
            <img src="CSS/images/logo.png" alt="Job Seeker" class="logo">
            <nav>
                <ul>
                    <li><a href="aboutus_student.php">About Us</a></li>
                    <li><a href="findjob_student.php">Job Search</a></li>
                    <li><a href="findcompany_student.php">Company Profiles</a></li>
                    <li><a href="profile_student.php">Profile</a></li>
                    <div class="dropdown">
                        <a href="#" class="dropbtn"><img src="CSS/images/profile.png" alt="Profile" class="signin-img"></a>
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
    <section id="scrollToSection" class="hero">
        <div class="container">
            <img src="CSS/images/logo.png">
            <h2><span>InternHub</span> is a fast and simple platform for both students and employers to fill internships on the go.</h2>
        </div>
    </section>

    <body>
        <div class="content1">
            <div class="text1">
                <h3>About Us</h3>
                <p>At InternHub, we understand that internships are pivotal stepping stones in a student's academic and professional journey. Founded on the belief that every student deserves access to enriching opportunities, we strive to bridge the gap between ambition and experience.</p>
            </div>
            <img src="CSS/images/about%20us.png" alt="Aboutus Image">
        </div>
        <div class="content2">
            <img src="CSS/images/about%20us%202.png">
            <div class="text2">
                <h3>Why InternHub?</h3>
                <p>Our platform is designed to empower students and graduates to explore diverse internship opportunities tailored to their interests, skills, and career aspirations. Whether you're looking to gain hands-on experience in a specific industry, broaden your skill set, or simply explore different career paths, InternHub is here to support you every step of the way.</p>
            </div>
        </div>
        <section class="two-column-section">
            <div class="columnL">
                <h2>For Students</h2>
                <img src="CSS/images/for%20students.png" alt="Description">
                <p> InternHub simplify the internship search process for students by providing a centralized platform with comprehensive information that align with their goals and aspirations.</p>
                <button onclick="window.location.href = 'findjob_student.php';">View Jobs</button>
            </div>
            <div class="columnR">
                <h2>For Companies</h2>
                <img src="CSS/images/for%20companies.png" alt="Description">
                <p> InternHub provide companies with a convenient and efficient platform to attract, screen, and recruit interns, offering advanced features and tools to streamline the entire recruitment process.</p>
                <button>View Candidates</button>
            </div>
        </section>
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
                            <li><a href="findjob_student.php">Job Search</a></li>
                            <li><a href="profile_student.php">Profile</a></li>
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
</body>

</html>
