<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InternHub - About Us</title>
    <link rel="stylesheet" href="CSS/aboutus_company.css">
</head>

<body>
    <header>
        <div class="container">
            <img src="CSS/images/logo.png" alt="Job Seeker" class="logo">
            <nav>
                <ul>
                    <li><a href="aboutus_company.php">About Us</a></li>
                    <li><a href="findcandidate_company.php">Candidate Profiles</a></li>
                    <li><a href="manageapplication_company.php">Applications</a></li>
                    <li><a href="viewpostedjob_company.php">Posted Jobs</a></li>
                    <div class="dropdown">
                        <a href="#" class="dropbtn"><img src="CSS/images/profile.png" alt="Profile" class="signin-img"></a>
                        <div class="dropdown-content">
                            <a href="profile_company.php">Profile</a>
                            <a href="manageapplication_student.php">Manage Application</a>
                            <a href="settings_company.php">Settings</a>
                            <hr>
                            <a href="index.php" class="signout">Sign Out</a>
                        </div>
                    </div>
                </ul>
            </nav>
        </div>x
    </header>

    <section id="scrollToSection" class="hero">
        <div class="container">
            <img src="CSS/images/logo.png" alt="InternHub Logo">
            <h2><span>InternHub</span> is a fast and simple platform for both students and employers to fill internships on the go.</h2>
        </div>
    </section>

    <div class="content1">
        <div class="text1">
            <h3>About Us</h3>
            <p>At InternHub, we understand that internships are pivotal stepping stones in a student's academic and professional journey. Founded on the belief that every student deserves access to enriching opportunities, we strive to bridge the gap between ambition and experience.</p>
        </div>
        <img src="CSS/images/about%20us.png" alt="About Us Image">
    </div>

    <div class="content2">
        <img src="CSS/images/about%20us%202.png" alt="About Us Image 2">
        <div class="text2">
            <h3>Why InternHub?</h3>
            <p>Our platform is designed to empower students and graduates to explore diverse internship opportunities tailored to their interests, skills, and career aspirations. Whether you're looking to gain hands-on experience in a specific industry, broaden your skill set, or simply explore different career paths, InternHub is here to support you every step of the way.</p>
        </div>
    </div>

    <section class="two-column-section">
        <div class="columnL">
            <h2>For Students</h2>
            <img src="CSS/images/for%20students.png" alt="For Students">
            <p>InternHub simplifies the internship search process for students by providing a centralized platform with comprehensive information that aligns with their goals and aspirations.</p>
            <button onclick="window.location.href = 'findjob_notlogin.php';">View Jobs</button>
        </div>
        <div class="columnR">
            <h2>For Companies</h2>
            <img src="CSS/images/for%20companies.png" alt="For Companies">
            <p>InternHub provides companies with a convenient and efficient platform to attract, screen, and recruit interns, offering advanced features and tools to streamline the entire recruitment process.</p>
            <button onclick="window.location.href = 'findcandidate_company.php';">View Candidates</button>
        </div>
    </section>

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
                            <li><a href="profile_company.php">Profile</a></li>
                            <li><a href="findcandidate_company.php">Candidates</a></li>
                            <li><a href="manageapplication_company.php">Manage Application</a></li>
                        </ul>
                    </div>
                    <div class="footer-section">
                        <h3>Support</h3>
                        <ul>
                            <li><a href="aboutus_company.php">About Us</a></li>
                            <li><a href="contactus_company.php">Contact Us</a></li>
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
