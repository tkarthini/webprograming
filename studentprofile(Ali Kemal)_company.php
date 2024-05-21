<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InternHub - Muhammad Ali Kemal</title>
    <link rel="stylesheet" href="css/studentprofile(kiveena)_company.css">
</head>

<body>
    <header>
        <div class="container">
            <a href="aboutus_company.php">
                <img src="images/logo.png" alt="Job Seeker" class="logo">
                <nav>
                    <ul>
                        <li><a href="aboutus_company.php">About Us</a></li>
                        <li><a href="findcandidate_company.php">Candidate Profiles</a></li>
                        <li><a href="manageapplication_company.php">Applications</a></li>
                        <li><a href="#">Profile</a></li>
                        <div class="dropdown">
                            <a href="#" class="dropbtn"><img src="images/profile.png" alt="Profile" class="signin-img"></a>
                            <div class="dropdown-content">
                                <a href="#">Profile</a>
                                <a href="manageapplication_company.php">Manage Application</a>
                                <a href="settings_company.php">Settings</a>
                                <hr>
                                <a href="#" class="signout">Sign Out</a>
                            </div>
                        </div>
                    </ul>
                </nav>
        </div>
    </header>

    <body>
        <div class="content">
            <img id="profilebackground" src="images/abbycoverpic.webp" width="100%" height="60%">
            <img id="profilepicture" src="images/MuhammadAliKemal.png" width="300px" height="400px">
        </div>

        <section id="scrollToSection" class="hero">

            <div>
                <h3 id="Name">Muhammad Ali Kemal
                    <br><img id="x" src="images/X%20logo.webp" width="40px"> <img id="facebook" src="images/facebook logo.webp" width="65px"><img id="ins" src="images/ins logo.webp" width="40px">
                </h3>
                <h4 id="Summary">Profile Summary</h4>
                <p id="ssummary">A passionate and talented 24-year-old music producer from Perlis, Malaysia. With a Bachelor of Arts in Music Production, I had honed my skills in audio engineering, sound design, and music composition. My education has provided me with a solid foundation in both the technical and creative aspects of music production, allowing me to produce high-quality audio content across various genres.</p>
            </div>

            <div>
                <h4 id="Skills">Skills</h4>
                <button id="FilmAnalysis">Audio Engineering</button>
                <button id="CriticalThinking">Sound Design</button>
                <button id="CommunicationSkills">Music Composition</button>

            </div>

            <div>
                <button id="VisualLiteracy">Mixing and Mastering</button>
                <button id="VisualLiteracy">Project Management</button>
                
            </div>

            <h4 id="Education">Education</h4>
            <button id="year">2021 - Present</button>
            <ul>
                <li id="li">Bachelors in Music Production, TAR UMT </li>
            </ul>
            <button id="year">2020 - 2019</button>
            <ul>
                <li id="li">Diploma in Music Production, TAR UMT</li>
            </ul>

            <h4 id="iinterest">Interests</h4>
            <p id="interest"><img id="acting" src="images/acting icon.png" width="80px"> Acting
                <br><img id="acting" src="images/drawing icon.png" width="50px"> Drawing
                <br><img src="images/costume design icon.png" width="50px">Custome design
                <br><img src="images/writing%20icon.png" width="50px"> Writing
            </p>

            <h4 id="eemail">Email</h4>
            <p id="email">muhdalikemal@gmail.com</p>

            <h4 id="llocation">Location</h4>
            <p id="location">Perlis, Malaysia</p>

            <img id="maps" src="images/google maps logo.png" alt="Maps" class="logo">
            <button id="viewresumeBtn" onclick="openResume()">View Resume</button>

        </section>
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
 
        <script>
    function openResume() {
        // Define the URL of the resume image
        var resumeImage = "images/resume_alikemal.png";
        // Open the pop-up window with the image
        var popupWindow = window.open(resumeImage, "_blank", "width=600,height=400");
    }
</script>

    </body>
    </html>