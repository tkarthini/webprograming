<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>InternHub - Creative Illustrator</title>
  <link rel="stylesheet" href="css/viewjob(sutera)_student.css">
</head>
<body>
  <header>
    <div class="container">
     <a href="aboutus_student.php">
      <img src="images/logo.png" alt="Job Seeker" class="logo">
      <nav>
      <ul>
        <li><a href="aboutus_student.php">About Us</a></li>
        <li><a href="findjob_student.php">Job Search</a></li>
        <li><a href="findcompany_student.php">Company Profiles</a></li>
        <li><a href="#">Profile</a></li>
        <div class="dropdown">
          <a href="#" class="dropbtn"><img src="images/profile.png" alt="Profile" class="signin-img"></a>
          <div class="dropdown-content">
            <a href="#">Profile</a>
            <a href="manageapplication_student.php">Manage Applications</a>
            <a href="settings_student.php">Settings</a>
            <hr>
            <a href="#" class="signout">Sign Out</a>
          </div>
        </div>
      </ul>
      </nav>
    </div>
  </header>
  <section id="scrollToSection" class="hero">
    <div class="container">

      <div class="container">
      <img id="joblogo" src="images/sunway.png">
      <h1 id="pvsgsb">Creative Illustrator</h1>
      <p id="Sunlight">Sunway Berhad</p>
      </div>

      <p id="description">
        <span>&#128204;</span> Bandar Sunway, Selangor <br>
        <span>&#127968;</span> Graphic Design <br>
        <span>&#9200;</span> Full time <br>
        <span>&#128176;</span> MYR 450 - 800 per month
      </p>

      <button id="applyBtn">Apply</button>
      <div class="content">
        <h3>Overview</h3>
        <p>We strongly believe that sustainability and profitability can go hand-in-hand – integrating the environmental, social and governance (ESG) as a framework on which our core business strategies are built to promote the needs of our communities and to achieve the United Nations Sustainable Development Goals (UN-SDGs). We will continue to carry out our businesses with integrity as our guide, humility as our virtue and the pursuit of excellence as our choice.
        </p>
      </div>

      <div class="Content">
      <h4 id="ATR">About the Role:</h4>
      <p id="ATRP">As a Creative Illustrator intern in our company, you will immerse yourself in the world of graphics design, contributing your artistic flair to various projects. Your primary responsibility will be to conceptualize and create captivating visual content that resonates with our brand identity and effectively communicates our messages.
      </p>

      <h4 id="ATR">What We Need In You:</h4>
      <ul id="WWMlist">
        <li>A passionate and imaginative individual with a strong foundation in graphics design.</li>
        <li>Proficient skills in design software such as Adobe Illustrator, Photoshop, and/or other relevant tools.</li>
        <li>Attention to detail, creativity, and the ability to think critically are essential qualities for this role. </li>
      </ul>

      <h4 id="ATR">Who You Are:</h4>
      <ul id="WYAlist">
        <li>A creative thinker with a problem-solving mindset, eager to explore the intersection of design and technology.</li>
        <li>Prioritize practical skills, creativity, and a strong work ethic.</li>
        <li> Approach challenges with a solutions-oriented mindset, seeking innovative ways to overcome obstacles.</li>
      </ul>

      <h2 id="line">=====================</h2>

      <p id="ATRP">If you believe that you are the perfect fit for this position, APPLY NOW or submit your CV to us.</p>

      <section id="BtnIcon" class="two-column-section">
   <button id="applynowBtn">Apply Now</button>
</section>
 
      <p id="ATRP">Be careful<br>Don't provide your bank or credit card details when applying for jobs.</p>

    </div>
   
    <div class="scroll-down-button">
      <a href="#scrollToSection">
        <i class="fas fa-chevron-down"></i>
      </a>
    </div>
  </section>
  
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
document.getElementById("applyBtn").addEventListener("click", function() {
  window.location.href = "applyjob(CIsunway)_student.php";
});
    
document.getElementById("applynowBtn").addEventListener("click", function() {
  window.location.href = "applyjob(CIsunway)_student.php";
});
</script>

</body>
</html>
