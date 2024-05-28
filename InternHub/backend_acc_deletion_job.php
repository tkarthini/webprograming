<?php
include_once "connection.php";

// Select from internship_table
$sql = "SELECT * FROM internship_table WHERE active=0 ORDER BY internship_timestamp ASC";
$result = $connection->query($sql);
$internships = array();

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        array_push($internships, $row);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InternHub - Back End Job Deletion </title>
    <link rel="stylesheet" href="CSS/base_css.css">
    <link rel="stylesheet" href="CSS/backend_acc_deletion.css">
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

    <div class="containerP">
        <!-- Settings Box -->
        <div class="additional-box2">
            <p>All deleted student profiles, company profiles and jobs posted by the companies are shown here</p>
        </div>
    </div>

    <div class="containerS">
        <!-- Settings Box -->
        <div class="settings-box">
            <a class="deletion-link" href="backend_acc_deletion_student.php">
                <h2>Student Profiles</h2>
            </a>
            <!-- <div class="line"></div> -->
            <a class="deletion-link" href="backend_acc_deletion_company.php">
                <h2>Company Profiles</h2>
            </a>
            <!-- <div class="line"></div> -->
            <a class="deletion-link active-link" href="backend_acc_deletion_job.php">
                <h2>Posted Jobs</h2>
            </a>
        </div>
        <div class="additional-box">
            <?php foreach ($internships as $internship) : ?>
                <div class="box-container">
                    <div class="box">
                        <img src="CSS/images/boomedia.png" alt="Example Image" class="box-image">
                        <div class="box-content">
                            <h2><?php echo $internship["internship_title"]; ?></h2>
                            <p><?php echo $internship["internship_location"]; ?></p>
                            <p><?php echo $internship["internship_description"]; ?></p>
                            <p><?php echo $internship["internship_allowance"]; ?></p>

                            <form action="#" method="post">
                                <input type="hidden" name="id" value="<?php echo $internship['id']; ?>">
                                <button class="box-button" type="submit" name="view">View</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">
                    <img src="css/images/logo.png" alt="Job Seeker">
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
</body>

</html>