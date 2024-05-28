<?php
include_once "connection.php";

// Select from student_table
$sql = "SELECT * FROM student_table WHERE active=0 ORDER BY student_timestamp ASC";
$result = $connection->query($sql);
$students = array();

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    // $students
    array_push($students, $row);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>InternHub - Back End Student Account Deletion </title>
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
      <a class="deletion-link active-link" href="backend_acc_deletion_student.php">
        <h2>Student Profiles</h2>
      </a>
      <!-- <div class="line"></div> -->
      <a class="deletion-link" href="backend_acc_deletion_company.php">
        <h2>Company Profiles</h2>
      </a>
      <!-- <div class="line"></div> -->
      <a class="deletion-link" href="backend_acc_deletion_job.php">
        <h2>Posted Jobs</h2>
      </a>
    </div>
    <div class="additional-box">
      <?php foreach ($students as $student) : ?>
        <!-- <li><?php echo $color; ?></li> -->
        <div class="box-container">
          <div class="box">
            <img src="uploads/<?php echo $student['student_profilepicture']; ?>" alt="Example Image" class="box-image">
            <div class="box-content">
              <h2><?php echo $student["student_name"]; ?></h2>
              <p><?php echo $student["student_age"]; ?></p>
              <p><?php echo $student["student_location"]; ?></p>
              <p><?php echo $student["programme"]; ?></p>

              <form action="backend_student_profile.php" method="get">
                <input type="hidden" name="id" value="<?php echo $student['student_id']; ?>">
                <button class="box-button" type="submit" style="margin-right: 13%">View</button>
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
  <script>
    // document.addEventListener("DOMContentLoaded", function() {
    //   var optionsContainer = document.querySelector(".application-box .options");
    //   var dropdownContent = document.querySelector(".application-box .dropdown-content");

    //   optionsContainer.addEventListener("click", function(event) {
    //     dropdownContent.style.display = dropdownContent.style.display === "block" ? "none" : "block";
    //   });

    //   window.addEventListener("click", function(event) {
    //     if (!optionsContainer.contains(event.target)) {
    //       dropdownContent.style.display = "none";
    //     }
    //   });
    // });
  </script>
</body>

</html>