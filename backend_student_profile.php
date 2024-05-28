<?php
include_once "connection.php";

$studentId = $_GET['id'];
$skillset = array();
$interests = array();

// Select from student_table
$result = $connection->execute_query("SELECT * FROM student_table WHERE student_id=?", [$studentId]);
if ($result->num_rows == 1) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $studentInfo = $row;
        $skillset = explode(',', $studentInfo["skillset"]);
        $interests = explode(',', $studentInfo["interests"]);
    }
}

if (isset($_POST['id'])) {
    $studentId = $_POST['id'];

    $sql = $connection->prepare("UPDATE student_table SET active = 0 WHERE student_id=?");

    // Execute the SQL statement
    $result = $sql->execute([$studentId]);

    if ($result) {
        $message = "Successfully deleted";
    } else {
        $message = "Failed to delete";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InternHub - <?php echo $studentInfo["student_name"]; ?></title>
    <link rel="stylesheet" href="backend_student_profile.css">
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
                        <li><a href="companyprofile(boomedia)_company.php">Profile</a></li>
                        <div class="dropdown">
                            <a href="#" class="dropbtn"><img src="images/profile.png" alt="Profile" class="signin-img"></a>
                            <div class="dropdown-content">
                                <a href="companyprofile(boomedia)_company.php">Profile</a>
                                <a href="manageapplication_company.php">Manage Application</a>
                                <a href="settings_company.php">Settings</a>
                                <hr>
                                <a href="index.php" class="signout">Sign Out</a>
                            </div>
                        </div>
                    </ul>
                </nav>
            </a>
        </div>
    </header>

    <body>
        <div class="content">
            <img id="profilebackground" src="images/abbycoverpic.webp" width="100%" height="60%">
            <img id="profilepicture" src="images/<?php echo $studentInfo['image_path']; ?>" width="300px" height="400px">
        </div>

        <section id="scrollToSection" class="hero">

            <div>
                <h3 id="Name"><?php echo $studentInfo["student_name"]; ?>
                    <br><img id="x" src="images/X%20logo.webp" width="40px"> <img id="facebook" src="images/facebook logo.webp" width="65px"><img id="ins" src="images/ins logo.webp" width="40px">
                </h3>
                <h4 id="Summary">Profile Summary</h4>
                <p id="ssummary"><?php echo $studentInfo["profile_description"]; ?></p>
            </div>


            <!-- Trigger/Open The Modal -->
            <button id="openModal">Delete Profile</button>

            <!-- The Modal -->
            <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <div style="text-align: center;">
                        <h2>Profile Delete</h2>
                    </div>

                    <ul>
                        <li>Coffee</li>
                        <li>Tea</li>
                        <li>Milk</li>
                    </ul>

                    <form action="#" method="post">
                        <input type="hidden" name="id" value="<?php echo $studentInfo['student_id']; ?>">
                        <button class="box-button" type="submit" name="delete">Delete</button>
                    </form>
                </div>

            </div>

            <div>
                <h4 id="Skills">Skills</h4>
                <?php foreach ($skillset as $skill) : ?>
                    <button class="skillset"><?php echo $skill; ?></button>
                <?php endforeach; ?>
                <!-- <button class="skillset">Adobe Creative Suit</button>
                <button class="skillset">Graphics Design</button>
                <button class="skillset">Web Programming</button> -->
            </div>

            <h4 id="Education">Education</h4>
            <button id="year">2021 - Present</button>
            <ul>
                <li id="li">Bachelors in Media Technology, LimKokwing University </li>
            </ul>
            <button id="year">2020 - 2019</button>
            <ul>
                <li id="li">Foundation in Art, Sunway University College</li>
            </ul>

            <h4 id="iinterest">Interests</h4>
            <p id="interest">
                <!-- <img id="acting" src="images/acting icon.png" width="80px"> -->
                <?php foreach ($interests as $interest) : ?>
            <ul>
                <li style="padding-left: 6%">
                    <h3><?php echo $interest; ?></h3>
                </li>
            </ul>
        <?php endforeach; ?>
        </p>

        <h4 id="eemail">Email</h4>
        <p id="email"><?php echo $studentInfo['student_email']; ?></p>

        <h4 id="llocation">Location</h4>
        <p id="location"><?php echo $studentInfo['location']; ?></p>

        <!-- Map link -->
        <form action="<?php echo $studentInfo['map_link']; ?>">
            <input type="image" src="css/images/map.png" style="height: 100px;width: 160px; padding-left: 5%;" />
        </form>

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
                            <li><a href="findjob_notlogin.php">Job Search</a></li>
                            <li><a href="signin.php">Profile</a></li>
                            <li><a href="signin.php">Manage Application</a></li>
                        </ul>
                    </div>
                    <div class="footer-section">
                        <h3>Companies</h3>
                        <ul>
                            <li><a href="companyprofile(boomedia)_company.php">Profile</a></li>
                            <li><a href="findcandidate_company.php">Candidates</a></li>
                            <li><a href="register.php">Manage Application</a></li>
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
        function openResume() {
            // Define the URL of the resume image
            var resumeImage = "images/resume_abby.png";
            // Open the pop-up window with the image
            var popupWindow = window.open(resumeImage, "_blank", "width=600,height=400");
        }
    </script>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("openModal");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>

</html>