<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = ""; // Typically empty for XAMPP
$dbname = "internhub_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Upload image and insert filename into database
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['upload_image'])) {
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
        // Check if the file is an actual image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            // Move the uploaded file to the uploads directory
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                // File uploaded successfully, now insert filename into database
                $filename = basename($_FILES["image"]["name"]);
                
                // Insert filename into database
                $sql = "INSERT INTO jobs_table (image) VALUES (?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $filename);
                $stmt->execute();
                
                // Close statement
                $stmt->close();
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "File is not an image.";
        }
    }
}

// Update job details
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_job'])) {
    $job_id = $_POST['id'];
    $job_title = $_POST['job_title'];
    $company = $_POST['company'];
    $location = $_POST['location'];
    $description = $_POST['description'];

    $sql = "UPDATE jobs_table SET job_title = ?, company = ?, location = ?, description = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $job_title, $company, $location, $description, $job_id);

    if ($stmt->execute()) {
        header("Location: viewpostedjob_company.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Delete job
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql = "DELETE FROM jobs_table WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $delete_id);

    if ($stmt->execute()) {
        header("Location: viewpostedjob_company.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Fetch jobs
$sql = "SELECT id, job_title, company, location, description, image FROM jobs_table";
$result = $conn->query($sql);

// Fetch single job for editing
$edit_job = null;
if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];
    $sql = "SELECT id, job_title, company, location, description FROM jobs_table WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $edit_id);
    $stmt->execute();
    $result_edit = $stmt->get_result();
    $edit_job = $result_edit->fetch_assoc();
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Posted Jobs</title>
    <link rel="stylesheet" href="CSS/viewpostedjob_company.css">
</head>

<body>
    <!-- Header Section -->
    <header>
        <div class="container">
            <img src="images/logo.png" alt="Job Seeker" class="logo">
            <nav>
                <ul>
                    <li><a href="aboutus_company.php">About Us</a></li>
                    <li><a href="findcandidate_company.php">Candidate Profiles</a></li>
                    <li><a href="manageapplication_company.php">Applications</a></li>
                    <li><a href="profile_company.php">Profile</a></li>
                    <div class="dropdown">
                        <a href="#" class="dropbtn"><img src="images/profile.png" alt="Profile" class="signin-img"></a>
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

    <!-- Page Title -->
    <h1>Posted Jobs</h1>

    <!-- Job Boxes Container -->
    <div class="box-container">
        <?php
        // Check if there are any jobs in the database
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                // Display job details and image
                echo "<div class='box'>
                    <img src='uploads/{$row['image']}' alt='Job Image' class='box-image'>
                    <div class='box-content'>
                        <h2>{$row['job_title']}</h2>
                        <p>{$row['location']}</p>
                        <p>{$row['description']}</p>
                        <button class='edit-button' onclick=\"window.location.href='viewpostedjob_company.php?edit_id={$row['id']}'\">Edit</button>
                        <button class='delete-button' onclick=\"if(confirm('Are you sure you want to delete this job?')) window.location.href='viewpostedjob_company.php?delete_id={$row['id']}'\">Delete</button>
                    </div>
                </div>";
            }
        } else {
            // If no jobs found, display a message
            echo "<p>No jobs found</p>";
        }
        ?>
    </div>

    <!-- Edit Job Form -->
    <?php if ($edit_job): ?>
    <div class="edit-form">
        <h2>Edit Job</h2>
        <form action="viewpostedjob_company.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $edit_job['id']; ?>">
            <input type="hidden" name="update_job" value="1">
            <label for="job_title">Job Title:</label><br>
            <input type="text" id="job_title" name="job_title" value="<?php echo $edit_job['job_title']; ?>" required><br><br>
            <label for="company">Company:</label><br>
            <input type="text" id="company" name="company" value="<?php echo $edit_job['company']; ?>" required><br><br>
            <label for="location">Location:</label><br>
            <input type="text" id="location" name="location" value="<?php echo $edit_job['location']; ?>" required><br><br>
            <label for="description">Description:</label><br>
            <textarea id="description" name="description" required><?php echo $edit_job['description']; ?></textarea><br><br>
            <input type="submit" value="Update Job">
        </form>
    </div>
    <?php endif; ?>

    <!-- Footer Section -->
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

</body>

</html>
