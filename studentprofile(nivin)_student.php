<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InternHub - Nivin Pauly</title>
    <link rel="stylesheet" href="css/studentprofile(Nivinpauly)_company.css">
    <style>
        .profile-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .profile-header #Name {
            margin: 0;
        }

        .profile-header .social-icons img {
            margin-left: 10px;
        }

        .profile-header .button-container {
            margin-left: auto;
        }

        .profile-header .button-container button {
            margin-left: 10px;
        }

    </style>
</head>

<body>
    <header>
        <div class="container">
            <a href="aboutus_student.php">
                <img src="images/logo.png" alt="Job Seeker" class="logo">
            </a>
            <nav>
                <ul>
                    <li><a href="aboutus_student.php">About Us</a></li>
                    <li><a href="findjob_student.php">Job Search</a></li>
                    <li><a href="findcompany_student.php">Company Profiles</a></li>
                    <li><a href="studentprofile(nivin)_student.php">Profile</a></li>
                    <div class="dropdown">
                        <a href="#" class="dropbtn"><img src="images/profile.png" alt="Profile" class="signin-img"></a>
                        <div class="dropdown-content">
                            <a href="studentprofile(nivin)_student.php">Profile</a>
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

    <div class="content">
        <img id="profilebackground" src="images/nivinpaulycoverpic.png" width="100%" height="60%">
        <img id="profilepicture" src="images/nivinpauly.jpg" width="300px" height="400px">
    </div>

    <section id="scrollToSection" class="hero">
        <div class="profile-header">
            <h3 id="Name">Nivin Pauly</h3>
            <div class="social-icons">
                <img id="x" src="images/X%20logo.webp" width="40px">
                <img id="facebook" src="images/facebook logo.webp" width="65px">
                <img id="ins" src="images/ins logo.webp" width="40px">
            </div>
            <div class="button-container">
                <button id="contactButton">Edit Profile</button>
            </div>
        </div>

        <h4 id="Summary">Profile Summary</h4>
        <p id="ssummary">A passionate and skilled Game Designer with a strong educational foundation in Game Design and Development. At 25 years old, Sinan has already demonstrated an exceptional ability to create engaging and immersive gaming experiences. With a BA in Game Design and Development from a reputed institution, Sinan possesses a deep understanding of game mechanics, narrative design, and user experience.</p>

        <h4 id="Skills">Skills</h4>
        <button id="FilmAnalysis">Game Development</button>
        <button id="CriticalThinking">Programming Languages</button>
        <button id="CommunicationSkills">Design Tools</button>
        <button id="VisualLiteracy">Narrative Design</button>
        <button id="VisualLiteracy">Project Management</button>

        <h4 id="Education">Education</h4>
        <button id="year">2021 - Present</button>
        <ul>
            <li id="li">Bachelors in Game Design and Development, TAR UMT </li>
        </ul>
        <button id="year">2020 - 2019</button>
        <ul>
            <li id="li">Diploma in Game Design, TAR UMT</li>
        </ul>

        <h4 id="iinterest">Interests</h4>
        <p id="interest">
            <img id="acting" src="images/acting icon.png" width="80px"> Acting
            <br><img id="acting" src="images/drawing icon.png" width="50px"> Drawing
            <br><img src="images/costume design icon.png" width="50px">Custome design
            <br><img src="images/writing%20icon.png" width="50px"> Writing
        </p>

        <h4 id="eemail">Email</h4>
        <p id="email">paulyjr1016@gmail.com</p>

        <h4 id="llocation">Location</h4>
        <p id="location">Kuala Lumpur, Malaysia</p>

        <img id="maps" src="images/google maps logo.png" alt="Maps" class="logo">
        <button id="viewresumeBtn" onclick="openResume()">View Resume</button>
    </section>

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
                            <li><a href="findjob_student.php">Job Search</a></li>
                            <li><a href="studentprofile(nivin)_student.php">Profile</a></li>
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

    <script>
        function openResume() {
            var resumeImage = "images/resume_nivin.jpg";
            window.open(resumeImage, "_blank", "width=600,height=400");
        }

        document.querySelector('.signout').addEventListener('click', function() {
            window.location.href = 'index.php';
        });

        document.getElementById('contactButton').addEventListener('click', function() {
            window.location.href = 'editprofile(nivin)_student.php';
        });

    </script>
</body>

</html>
