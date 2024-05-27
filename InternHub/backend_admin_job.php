<?php
include_once "brackets/connection.php";

// Select from internship_table
$sql = "SELECT * FROM internship_table WHERE active=1 ORDER BY internship_timestamp ASC";
$result = $connection->query($sql);
$internships = array();
// echo $result;

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    // $internships
    array_push($internships, $row);
  }
}

if (isset($_POST['id'])) {
  $internshipId = $_POST['id'];

  $sql = $connection->prepare("UPDATE internship_table SET active = 0 WHERE id=?");

  // Execute the SQL statement
  $result = $sql->execute([$internshipId]);

  if ($result) {
    $message = "Successfully deleted";
  } else {
    $message = "Failed to delete";
  }
}

if (isset($_POST['sorting'])) {
  $sort = $_POST['sort'];
  if ($sort == "newest") {
    $sql = "SELECT * FROM internship_table WHERE active=1 ORDER BY internship_timestamp DESC";
    $result = $connection->query($sql);
  } else {
    $sql = "SELECT * FROM internship_table WHERE active=1 ORDER BY internship_timestamp ASC";
    $result = $connection->query($sql);
  }

  if ($result->num_rows > 0) {
    $internships = array();
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      // $internships
      array_push($internships, $row);
    }
  }
}

if (isset($_POST['search'])) {
  $searchtext = $_POST['search_text'];
  $result = $connection->execute_query("SELECT * FROM internship_table WHERE active=1 AND internship_title LIKE ?", ['%' . $searchtext . '%']);
  if ($result->num_rows > 0) {
    $internships = array();
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      array_push($internships, $row);
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>InternHub - Back End Find Job</title>
  <link rel="stylesheet" href="base_css.css">
  <link rel="stylesheet" href="CSS/backend_admin_job.css">
</head>

<body>
  <header>
    <div class="container">
      <img src="CSS/images/logo.png" alt="Job Seeker" class="logo">
      <nav>
        <ul>
          <li><a href="#">Posted Jobs</a></li>
          <li><a href="#">Students</a></li>
          <li><a href="#">Companies</a></li>
          <div class="dropdown">
            <a href="#" class="dropbtn"><img src="CSS/images/profile.png" alt="Profile" class="signin-img"></a>
            <div class="dropdown-content" style="min-width: 15ch;">
              <a href="#">Profile</a>
              <a href="#">Deletion</a>
              <a href="#">Settings</a>
              <hr>
              <a href="#" class="signout">Sign Out</a>
            </div>
          </div>
        </ul>
      </nav>
    </div>
  </header>

  <div class="search-section">
    <h1>Find your internship here</h1>
    <div class="search-container">
      <form action="#" method="post" class="search-form">
        <input type="text" placeholder="Search job title" name="search_text">
        <button type="submit" name="search">Search</button>
      </form>
    </div>
    <hr>
    <h3>Showing recommended internship result</h3>

    <!-- Form with dropdown for sorting -->
    <form action="#" method="post" class="sorting-form">
      <label for="sort">Sort By:</label>
      <select name="sort" id="sort">
        <option value="newest">Newest First</option>
        <option value="oldest">Oldest First</option>
      </select>
      <button type="submit" value="sorting" name="sorting">Sort</button>
    </form>
  </div>

  </div>
  <?php foreach ($internships as $internship) : ?>
    <!-- <li><?php echo $color; ?></li> -->
    <div class="box-container">
      <div class="box">
        <img src="images/boomedia.png" alt="Example Image" class="box-image">
        <div class="box-content">
          <h2><?php echo $internship["internship_title"]; ?></h2>
          <p><?php echo $internship["internship_location"]; ?></p>
          <p><?php echo $internship["internship_description"]; ?></p>
          <p><?php echo $internship["internship_allowance"]; ?></p>
          <!-- <button class="box-button">Edit</button>
          <button class="box-button">Delete</button> -->
          <form action="#" method="post">
            <input type="hidden" name="id" value="<?php echo $internship['id']; ?>">
            <button class="box-button" type="submit" name="delete">Delete</button>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach; ?>

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