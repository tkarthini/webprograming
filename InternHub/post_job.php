<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internhub - New Job</title>
    <link rel="stylesheet" href="CSS/post_job.css">
    <script>
        function showMessageAndRedirect(message) {
            if (message) {
                alert(message);
                window.location.href = 'find_jobs.php';
            }
        }

    </script>
</head>

<body onload="showMessageAndRedirect('<?php echo $message; ?>')">
    <header>
        <div class="container">
            <img src="images/logo.png" alt="Job Seeker" class="logo">
            <nav>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Candidate Profiles</a></li>
                    <li><a href="#">Applications</a></li>
                    <li><a href="#">Profile</a></li>
                    <div class="dropdown">
                        <a href="#" class="dropbtn"><img src="images/profile.png" alt="Profile" class="signin-img"></a>
                        <div class="dropdown-content">
                            <a href="#">Profile</a>
                            <a href="#">Manage Application</a>
                            <a href="#">Settings</a>
                            <hr>
                            <a href="#" class="signout">Sign Out</a>
                        </div>
                    </div>
                </ul>
            </nav>
        </div>
    </header>

    <h1>Post a Job</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
        <label for="job_title">Job Title:</label><br>
        <input type="text" id="job_title" name="job_title" required><br><br>
        <label for="company">Company:</label><br>
        <input type="text" id="company" name="company" required><br><br>
        <label for="location">Location:</label><br>
        <input type="text" id="location" name="location" required><br><br>
        <label for="description">Job Description:</label><br>
        <textarea id="description" name="description" required></textarea><br><br>
        <label for="allowance">Allowance:</label><br>
        <input type="text" id="allowance" name="allowance"><br><br> <!-- New field for allowance -->
        <label for="image">Job Image:</label><br>
        <input type="file" id="image" name="image" accept="image/*"><br><br>
        <input type="submit" value="Post Job">
    </form>

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

    $message = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $job_title = $_POST['job_title'];
        $company = $_POST['company'];
        $location = $_POST['location'];
        $description = $_POST['description'];
        $allowance = $_POST['allowance']; // New field for allowance

        // Handle file upload
        $image = $_FILES['image']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $uploadOk = 1;

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check === false) {
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["image"]["size"] > 5000000) {
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $message = "Sorry, your file was not uploaded.";
        // If everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                // Prepare and bind
                $stmt = $conn->prepare("INSERT INTO jobs_table (job_title, company, location, description, allowance, image) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssss", $job_title, $company, $location, $description, $allowance, $image);

                // Execute the statement
                if ($stmt->execute()) {
                    $message = "New job posted successfully!";
                    // Redirect to viewpostedjob_company.php after posting job successfully
                    header("Location: viewpostedjob_company.php");
                    exit(); // Ensure script execution stops after redirection
                } else {
                    $message = "Error: " . $stmt->error;
                }

                // Close statement
                $stmt->close();
            } else {
                $message = "Sorry, there was an error uploading your file.";
            }
        }
    }

    // Close connection
    $conn->close();
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

