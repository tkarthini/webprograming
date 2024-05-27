<?php
session_start();

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "internhub_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$company_id = $_SESSION['company_id'];

// Fetch job applications for the company from the database
$sql = "SELECT * FROM job_applications WHERE company_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $company_id);
$stmt->execute();
$result = $stmt->get_result();

// Display job applications
while ($row = $result->fetch_assoc()) {
    
    echo '<div class="application-box">';
    echo '<div class="content">';
    echo '<h2>' . $row['candidate_name'] . '</h2>';
    echo '<p>Job: ' . $row['job_title'] . '</p>';
    echo '<p>Application Date: ' . $row['application_date'] . '</p>';
    echo '</div>';
    echo '<div class="view-application">';
    echo '<button>View Application</button>';
    echo '</div>';
    echo '</div>';
}

$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InternHub - Manage Application</title>
    <link rel="stylesheet" href="CSS/manageapplication_company.css">
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
        </div>
    </header>

    <div class="manage-application">
        <h1>Manage Applications</h1>
        <form method="post">
            <input type="submit" name="new" value="New Application">
            <input type="submit" name="approved" value="Approved">
            <input type="submit" name="rejected" value="Rejected">
            <input type="submit" name="pending" value="Pending">
        </form>
    </div>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["new"])) {
        // Application box 1
        echo '<div class="application-box" id="application1">
                <div class="options">
                    <div class="dropdowndot">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                    <div class="dropdown-content1">
                        <a href="#">Accept Application</a>
                        <a href="#">Pending List</a>
                        <a href="#" class="delete-application">Delete Application</a>
                    </div>
                </div>
                /* dummy */
                <div class="content">
                    <h2>Video Editor</h2>
                    <p>Sinan Teoman</p>
                    <p>Bachelors in Film Production</p>
                    <p>Tunku Abdul Rahman University of Management and Technology</p>
                    <div class="tick">&#10004;</div>
                    <div class="applied-on">Applied on 10 Apr 2024</div>
                </div>
                <div class="view-application">
                    <button>View Application</button>
                </div>
            </div>';

        // Application box 2
        echo '<div class="application-box" id="application2">
                <div class="options">
                    <div class="dropdowndot">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                    <div class="dropdown-content1">
                        <a href="#">Accept Application</a>
                        <a href="#">Pending List</a>
                        <a href="#" class="delete-application">Delete Application</a>
                    </div>
                </div>
                <div class="content">
                    <h2>Graphics Illustrator</h2>
                    <p>Nelson Teoh</p>
                    <p>Bachelors in Graphics Design</p>
                    <p>Tunku Abdul Rahman University of Management and Technology</p>
                    <div class="tick">&#10004;</div>
                    <div class="applied-on">Applied on 10 Apr 2024</div>
                </div>
                <div class="view-application">
                    <button>View Application</button>
                </div>
            </div>';
        // Application box 3
        echo'<div class="application-box" id="application3">
                <div class="options">
                    <div class="dropdowndot">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                    <div class="dropdown-content1">
                        <a href="#">Accept Application</a>
                        <a href="#">Pending List</a>
                        <a href="#" class="delete-application">Delete Application</a>
                    </div>
                </div>
                <div class="content">
                    <h2>Video Editor</h2>
                    <p>Muhammad Ali Kemal</p>
                    <p>Bachelors in Film Production</p>
                    <p>Tunku Abdul Rahman University of Management and Technology</p>
                    <div class="tick">&#10004;</div>
                    <div class="applied-on">Applied on 10 Apr 2024</div>
                </div>
                <div class="view-application">
                    <button>View Application</button>
                </div>
            </div>';
        // Application box 4
        echo'<div class="application-box" id="application4">
                <div class="options">
                    <div class="dropdowndot">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                    <div class="dropdown-content1">
                        <a href="#">Accept Application</a>
                        <a href="#">Pending List</a>
                        <a href="#" class="delete-application">Delete Application</a>
                    </div>
                </div>
                <div class="content">
                    <h2>Graphics Illustrator</h2>
                    <p>Ferris Tan</p>
                    <p>Bachelors in Graphics Desisgn</p>
                    <p>Tunku Abdul Rahman University of Management and Technology</p>
                    <div class="tick">&#10004;</div>
                    <div class="applied-on">Applied on 10 Apr 2024</div>
                </div>
                <div class="view-application">
                    <button>View Application</button>
                </div>
            </div>';
        // Application box 5
        echo'<div class="application-box" id="application5">
                <div class="options">
                    <div class="dropdowndot">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                    <div class="dropdown-content1">
                        <a href="#">Accept Application</a>
                        <a href="#">Pending List</a>
                        <a href="#" class="delete-application">Delete Application</a>
                    </div>
                </div>
                <div class="content">
                    <h2>Video Editor</h2>
                    <p>Tan Siew Kim</p>
                    <p>Bachelors in Graphics Desisgn</p>
                    <p>Tunku Abdul Rahman University of Management and Technology</p>
                    <div class="tick">&#10004;</div>
                    <div class="applied-on">Applied on 10 Apr 2024</div>
                </div>
                <div class="view-application">
                    <button>View Application</button>
                </div>
            </div>
        </div>';
        } elseif (isset($_POST["approved"])) {
        // Approved Application 1
        echo '<div class="application-box">
                <div class="content">
                    <h2>Michael Lee</h2>
                    <p>Job: Social Media Manager</p>
                    <p>Reason: Approved</p>
                    <p>Approval Date: 10 April 2024</p>
                </div>
                <div class="view-application">
                    <button>View Application</button>
                </div>
            </div>';
        // Approved Application 2
        echo'<div class="application-box">
  <div class="content">
    <h2>Nesavarma</h2>
    <p>Job: Graphics Designer</p>
    <p>Reason: Approved</p>
    <p>Approval Date: 10 April 2024</p>
  </div>
  <div class="view-application">
    <button>View Application</button>
  </div>
</div>
';
        } elseif (isset($_POST["rejected"])) {
            // Rejected Application 1
            echo'<div class="application-box">
         <div class="content">
            <h2>John Doe</h2>
            <p>Job : Graphics Designer</p>
            <p>Reason: Not a good fit for the role</p>
            <p>Rejected Date: 20 March 2024</p>
         </div>
         <div class="view-application">
            <button>View Application</button>
         </div>
      </div>';
            // Rejected Application 2
            echo' <div class="application-box">
         <div class="content">
            <h2>Alya Natasya</h2>
            <p>Job : Web Designer</p>
            <p>Reason: Not a good fit for the role</p>
            <p>Rejected Date: 27 March 2024</p>
         </div>
         <div class="view-application">
            <button>View Application</button>
         </div>
      </div>';
            // Rejected Application 3
            echo'<div class="application-box">
         <div class="content">
            <h2>Muhammad Khairul Nizam</h2>
            <p>Job : Graphics Designer</p>
            <p>Reason: Overqualified</p>
            <p>Rejected Date: 20 March 2024</p>
         </div>
         <div class="view-application">
            <button>View Application</button>
         </div>
        <div class="view-application">
          <button>View Application</button>
        </div>
      </div>';
            // Rejected Application 4
            echo'<div class="application-box">
         <div class="content">
            <h2>Tan Chen Seong</h2>
            <p>Job : Graphics Designer</p>
            <p>Reason: Not a good fit for the role</p>
            <p>Rejected Date: 20 March 2024</p>
         </div>
         <div class="view-application">
            <button>View Application</button>
         </div>
        <div class="view-application">
          <button>View Application</button>
        </div>
      </div>';

        } elseif (isset($_POST["pending"])) {
            // Pending Application 1
            echo'<div class="application-box">
      <div class="content">
        <h2>Lee Ming Jie</h2>
        <p>Job: Web Developer</p>
        <p>Reason: Pending review</p>
        <p>Application Date: 25 April 2024</p>
      </div>
      <div class="view-application">
        <button>View Application</button>
      </div>
    </div>';
            // Pending Application 2
            echo'<div class="application-box">
      <div class="content">
        <h2>Tan Hui Yin</h2>
        <p>Job: Web Developer</p>
        <p>Reason: Pending review</p>
        <p>Application Date: 25 April 2024</p>
      </div>
      <div class="view-application">
        <button>View Application</button>
      </div>
    </div>';
            // Pending Application 3
            echo'<div class="application-box">
      <div class="content">
        <h2>Nivin Thomas</h2>
        <p>Job: Web Developer</p>
        <p>Reason: Pending review</p>
        <p>Application Date: 25 April 2024</p>
      </div>
      <div class="view-application">
        <button>View Application</button>
      </div>
    </div>';
    }
}
?>


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
