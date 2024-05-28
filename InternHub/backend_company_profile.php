<?php
include_once "connection.php";

$companyId = $_GET['id'];
$availableJobs = array();

// Select from company_table
$result = $connection->execute_query("SELECT * FROM company_table WHERE company_id=?", [$companyId]);
if ($result->num_rows == 1) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $companyInfo = $row;
        if ($row['active'] == 0) {
            echo '<script>alert("Company is deleted")</script>';
        }
    }
}

$availableJobsResult = $connection->execute_query("SELECT * FROM internship_table WHERE company_id=?", [$companyId]);
if ($availableJobsResult->num_rows > 0) {
    // output data of each row
    while ($row = $availableJobsResult->fetch_assoc()) {
        array_push($availableJobs, $row);
    }
}

if (isset($_POST['id'])) {
    $companyId = $_POST['id'];

    $sql = $connection->prepare("UPDATE company_table SET active = 0 WHERE company_id=?");

    // Execute the SQL statement
    $result = $sql->execute([$companyId]);

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
    <link rel="stylesheet" href="CSS/backend_company_profile.css">
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
        <div class="content">
            <img id="profilebackground" src="css/images/company_background.jpg" width="100%" height="35%" alt="">
            <img id="profilepicture" src="css/images/<?php echo $companyInfo['image_name']; ?>" width="250px" height="350px">
        </div>

        <section id="scrollToSection" class="hero">
            <div>
                <h3 id="Name">
                    <?php echo $companyInfo["company_name"]; ?>
                </h3>
                <h4 id="companylocation">
                    <?php echo $companyInfo["company_location"]; ?>
                </h4>

                <!-- Trigger/Open The Modal -->
                <?php if ($companyInfo['active'] == 1) : ?>
                    <button class="delete-btn" id="openModal">Delete Profile</button>
                <?php endif; ?>

                <h4 id="Summary">Company Overview</h4>
                <p id="ssummary"><?php echo $companyInfo["companyOverview"]; ?></p>
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
                        <input type="hidden" name="id" value="<?php echo $companyInfo['company_id']; ?>">
                        <button class="delete-btn" type="submit" name="delete">Delete</button>
                    </form>
                </div>

            </div>

            <div class="company-who-we-are">
                <h3 id="who-we-are">
                    Who We Are
                </h3>
                <p id="ssummary"><?php echo $companyInfo["who_we_are"]; ?></p>
            </div>

            <div style="margin-bottom: 3rem;">
                <h3 id="available-job">
                    Available Jobs
                </h3>

                <div id="available-job-content">
                    <?php foreach ($availableJobs as $availableJob) : ?>
                        <div class="available-job">
                            <h4><?php echo $availableJob["internship_title"]; ?></h4>
                            <p><?php echo $availableJob["internship_description"]; ?></p>

                            <form action="backend_job_detail.php" method="get">
                                <input type="hidden" name="id" value="<?php echo $availableJob['id']; ?>">
                                <button class="box-button" type="submit" style="margin-right: 13%">View</button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                </div>
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