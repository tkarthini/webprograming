<?php
include_once "connection.php";

$jobId = $_GET['id'];
$availableJobs = array();

// Select from company_table
$result = $connection->execute_query("SELECT * FROM internship_table WHERE id=?", [$jobId]);
if ($result->num_rows == 1) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $jobInfo = $row;
        if ($row['active'] == 0) {
            echo '<script>alert("Job is deleted")</script>';
        }
    }
}

$companyResult = $connection->execute_query("SELECT * FROM company_table WHERE company_id=?", [$jobInfo['company_id']]);
if ($companyResult->num_rows > 0) {
    // output data of each row
    while ($row = $companyResult->fetch_assoc()) {
        $companyInfo = $row;
    }
}

if (isset($_POST['id'])) {
    $jobId = $_POST['id'];

    $sql = $connection->prepare("UPDATE internship_table SET active = 0 WHERE id=?");

    // Execute the SQL statement
    $result = $sql->execute([$jobId]);

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
    <title>InternHub - <?php echo $companyInfo["company_name"]; ?></title>
    <link rel="stylesheet" href="CSS/backend_job_detail.css">
</head>

<body>
    <header>
        <div class="container">
            <img src="css/images/logo.png" alt="Job Seeker" class="logo">
            <nav>
                <ul>
                    <li><a href="backend_admin_job.php">Posted Jobs</a></li>
                    <li><a href="backend_admin_students.php">Students</a></li>
                    <li><a href="backend_admin_company.php">Companies</a></li>
                    <div class="dropdown">
                        <a href="#" class="dropbtn"><img src="css/images/profile.png" alt="Profile" class="signin-img"></a>
                        <div class="dropdown-content" style="min-width: 15ch;">
                            <a href="backend_acc_deletion_student.php">Deletion</a>
                            <a href="backend_acc_setting.php">Settings</a>
                            <hr>
                            <a href="index.php" class="signout">Sign Out</a>
                        </div>
                    </div>
                </ul>
            </nav>
        </div>
    </header>

    <body>
        <section id="scrollToSection" class="hero">
            <div>
                <h3 id="Name">
                    <?php echo $jobInfo["internship_title"]; ?>
                </h3>
                <h4 id="companylocation">
                    <?php echo $companyInfo["company_name"]; ?>
                </h4>

                <!-- Trigger/Open The Modal -->
                <?php if ($jobInfo['active'] == 1) : ?>
                    <button class="delete-btn" id="openModal">Delete Job</button>
                <?php endif; ?>

                <p id="ssummary"><?php echo $jobInfo["internship_location"]; ?></p>
                <p id="ssummary"><?php echo $jobInfo["internship_category"]; ?></p>
                <p id="ssummary">Full Time</p>
                <p id="ssummary"><?php echo $jobInfo["internship_allowance"]; ?></p>
            </div>

            <!-- Delete Profile Modal -->
            <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <div style="text-align: center;">
                        <h2>Job Post Delete</h2>
                    </div>

                    <ul>
                        <li class="modal-li">Wrong/Inapproriate Content</li>
                        <li class="modal-li">Inactive Account</li>
                        <li class="modal-li">Policy Compliance</li>
                        <li class="modal-li">Spam, Fraudulent activity, or unauthorized access attempts</li>
                        <li class="modal-li">Do not meet certain criteria or validation requirements</li>
                        <li class="modal-li">Others</li>
                    </ul>

                    <form action="#" method="post">
                        <input type="hidden" name="id" value="<?php echo $jobInfo['id']; ?>">
                        <button class="delete-btn" type="submit" name="delete">Delete</button>
                    </form>
                </div>

            </div>

            <div class="overview">
                <h3 id="who-we-are">
                    Overview
                </h3>
                <p id="ssummary"><?php echo $jobInfo["overview"]; ?></p>
            </div>

            <div>
                <h3 id="who-we-are">
                    About the role:
                </h3>
                <p id="ssummary"><?php echo $jobInfo["about_the_role"]; ?></p>
            </div>
        </section>
    </body>
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

</html>