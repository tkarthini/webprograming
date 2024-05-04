<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>InternHub - Approved</title>
  <link rel="stylesheet" href="css/manageapplication(approved)_company.css">
</head>
<body>
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
  
  <div class="manage-application">
    <h1>Manage Applications</h1>
  </div>
  <div class="filter-links">
  <a href="#" class="filter-link rejected">New Applications</a>
  <a href="#" class="filter-link success">Rejcted</a>
  <a href="#" class="filter-link success">Pending</a>
  <a href="#" class="filter-link success">Approved</a>
</div>
  <div class="application-box">
  <div class="content">
    <h2>Michael Lee</h2>
    <p>Job: Social Media Manager</p>
    <p>Reason: Approved</p>
    <p>Approval Date: 10 April 2024</p>
  </div>
  <div class="view-application">
    <button>View Application</button>
  </div>
</div>
   <div class="application-box">
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
   <script>
  document.addEventListener("DOMContentLoaded", function() {
    var optionsContainer = document.querySelector(".application-box .options");
    var dropdownContent = document.querySelector(".application-box .dropdown-content");

    optionsContainer.addEventListener("click", function(event) {
      dropdownContent.style.display = dropdownContent.style.display === "block" ? "none" : "block";
    });

    window.addEventListener("click", function(event) {
      if (!optionsContainer.contains(event.target)) {
        dropdownContent.style.display = "none";
      }
    });
  });
</script>
</body>
</html>
