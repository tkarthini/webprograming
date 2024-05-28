<?php
include_once "connection.php";

// Select from company_table
$sql = "SELECT * FROM company_table WHERE active=1 ORDER BY company_timestamp ASC";
$result = $connection->query($sql);
$companies = array();

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    // $companies
    array_push($companies, $row);
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

if (isset($_POST['sorting'])) {
  $sort = $_POST['sort'];
  if ($sort == "newest") {
    $sql = "SELECT * FROM company_table WHERE active=1 ORDER BY company_timestamp DESC";
    $result = $connection->query($sql);
  } else {
    $sql = "SELECT * FROM company_table WHERE active=1 ORDER BY company_timestamp ASC";
    $result = $connection->query($sql);
  }

  if ($result->num_rows > 0) {
    $companies = array();
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      array_push($companies, $row);
    }
  }
}

if (isset($_POST['search'])) {
  $searchtext = $_POST['search_text'];
  $result = $connection->execute_query("SELECT * FROM company_table WHERE active=1 AND company_name LIKE ?", ['%' . $searchtext . '%']);
  if ($result->num_rows > 0) {
    $companies = array();
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      array_push($companies, $row);
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>InternHub - Back End Comapny</title>
  <link rel="stylesheet" href="base_css.css">
  <link rel="stylesheet" href="CSS/backend_admin_job.css">
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

  <div class="search-section">
    <h1>Find the right company for you </h1>
    <div class="search-container">
      <input type="text" placeholder="Search by company name">
      <button type="submit">Search</button>
    </div>
    <hr>
    <h3>Showing recommended company result</h3>
    <!-- Form with dropdown for sorting -->
    <form action="#" method="get">
      <label for="sort">Sort By:</label>
      <select name="sort" id="sort">
        <option value="newest">Newest First</option>
        <option value="oldest">Oldest First</option>
      </select>
      <button type="submit">Sort</button>
    </form>
  </div>

  <?php foreach ($companies as $company) : ?>
    <div class="box-container">
      <div class="box">
        <img src="css/images/<?php echo $company['image_name']; ?>" alt=" Example Image" class="box-image">
        <div class="box-content">
          <h2><?php echo $company["company_name"]; ?></h2>
          <p><?php echo $company["company_location"]; ?></p>
          <p><?php echo $company["company_description"]; ?></p>
          <form action="#" method="post">
            <input type="hidden" name="id" value="<?php echo $company['company_id']; ?>">
            <button class="box-button" type="submit" name="delete">Delete</button>
          </form>
          <form action="backend_company_profile.php" method="get">
            <input type="hidden" name="id" value="<?php echo $company['company_id']; ?>">
            <button class="box-button" type="submit" style="margin-right: 13%">View</button>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach; ?>

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
</body>

</html>