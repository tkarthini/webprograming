<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InternHub - Manage Application</title>
    <link rel="stylesheet" href="css/manageapplication_student.css">
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

    <div class="manage-application">
        <h1>Manage Applications</h1>
        <form method="post">
            <input type="submit" name="saved" value="Saved">
            <input type="submit" name="applied" value="Applied">
        </form>
    </div>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["saved"])) {
        // Saved Application box 1
        echo '<div class="application-box">
                <div class="options">
                    <div class="dropdowndot">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                    <div class="dropdown-content1">
                        <a href="#" class="delete-application">Delete Application</a>
                    </div>
                </div>
                <div class="content">
                    <h2>UI /UX Designer</h2>
                    <p>Yea Business</p>
                    <p>Posted 14d ago</p>
                    <p>Petaling Jaya, Selangor</p>
                    <div class="applybtn">
                    <button>Apply</button>
                </div>
                </div>
            </div>';
        // Saved Application box 2
        echo '<div class="application-box">
                <div class="options">
                    <div class="dropdowndot">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                    <div class="dropdown-content1">
                        <a href="#" class="delete-application">Delete Application</a>
                    </div>
                </div>
                <div class="content">
                    <h2>Graphics Designer</h2>
                    <p>Sutera Sdn. Bhd.</p>
                    <p>Posted 10d ago</p>
                    <p>Petaling Jaya, Selangor</p>
                    <div class="applybtn">
                    <button>Apply</button>
                </div>
                </div>
            </div>';

        } elseif (isset($_POST["applied"])) {
        // Applied Application 1
        echo'<div class="application-box" id="application3">
                <div class="content">
                    <h2>Content Creator (TikTok)</h2>
                    <p>Gladiolab Sdn. Bhd.</p>
                    <p>Posted 23d ago</p>
                    <p>Petaling Jaya, Selangor</p>
                    <div class="tick">&#10004;</div>
                    <div class="applied-on">Applied on 10 Apr 2024</div>
                    <p>Status : Success</p>
                </div>
            </div>';
        // Applied Application 2
        echo'<div class="application-box" id="application3">
                <div class="content">
                    <h2>Graphics Designer</h2>
                    <p>Study Germany Education Centre</p>
                    <p>Posted 13d ago</p>
                    <p>Subang Jaya, Selangor</p>
                    <div class="tick">&#10004;</div>
                    <div class="applied-on">Applied on 10 Apr 2024</div>
                    <p>Status : Rejected</p>
                </div>
            </div>';
        // Applied Application 3
        echo'<div class="application-box" id="application3">
                <div class="content">
                    <h2>Video Editor</h2>
                    <p>HomeTech Limited</p>
                    <p>Posted 1 month ago</p>
                    <p>bangi, Selangor</p>
                    <div class="tick">&#10004;</div>
                    <div class="applied-on">Applied on 11 Mar 2024</div>
                    <p>Status : Rejected</p>
                </div>
            </div>';
    }
}
?>

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
        // Event listener to the "Sign Out" link
        document.querySelector('.signout').addEventListener('click', function() {
            // Redirect the user to index.php
            window.location.href = 'index.php';
        });
    </script>
</body>

</html>
