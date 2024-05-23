<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InternHub - Graphics Design</title>
    <link rel="stylesheet" href="css/viewjob(sutera)_student.css">
</head>

<body>
    <header>
        <div class="container">
            <a href="aboutus_student.php">
                <img src="images/logo.png" alt="Job Seeker" class="logo">
            </a>
            <nav>
                <ul>
                    <li><a href="aboutus_student.php">About Us</a></li>
                    <li><a href="findjob_student.php">Job Search</a></li>
                    <li><a href="findcompany_student.php">Company Profiles</a></li>
                    <li><a href="studentprofile(nivin)_student.php">Profile</a></li>
                    <div class="dropdown">
                        <a href="#" class="dropbtn"><img src="images/profile.png" alt="Profile" class="signin-img"></a>
                        <div class="dropdown-content">
                            <a href="studentprofile(nivin)_student.php">Profile</a>
                            <a href="manageapplication_student.php">Manage Applications</a>
                            <a href="settings_student.php">Settings</a>
                            <hr>
                            <a href="index.php" class="signout">Sign Out</a>
                        </div>
                    </div>
                </ul>
            </nav>
        </div>
    </header>
    <section id="scrollToSection" class="hero">
        <div class="container">
            <div class="container">
                <img id="joblogo" src="images/sutera.png">
                <h1 id="pvsgsb">Graphic Designer</h1>
                <p id="Sunlight">Sutera Harbour Sdn Bhd</p>
            </div>
            <p id="description">
                <span>&#128204;</span> Johor Baharu <br>
                <span>&#127968;</span> Design and Architecture <br>
                <span>&#9200;</span> Full time <br>
                <span>&#128176;</span> RM MYR 800 - 1000 per month
            </p>
            <button id="applyBtn">Apply</button>
            <div class="content">
                <h3>Overview</h3>
                <p>Overlooking the tranquil South China Sea, with views of tropical islands and the majestic Mount Kinabalu, is the 384-acre grand expansive Sutera Harbour Resort. Let us indulge you with our spectacular array of Resort facilities, from choice of luxurious 5-star hotels, award-winning 27-hole Graham Marsh designed golf course to the 104-berth marina and exhilarating recreational services.The elegant business setting of The Pacific Sutera Hotel, is complemented by the resort ambience of The Magellan Sutera Resort, offering a combined total of 956 guestrooms and suites, each offering an unsurpassed level of accommodation and warm hospitality.</p>
            </div>
            <div class="Content">
                <h4 id="ATR">About the Role:</h4>
                <p id="ATRP">Our resorts provide lodging facilities for travelers, often including a variety of room types from standard rooms to luxury suites.Resorts typically have multiple dining options, bars, and entertainment venues to enhance the guest experience.</p>
                <h4 id="ATR">What We Need In You:</h4>
                <ul id="WWMlist">
                    <li>Proficiency in Mandarin and the local language; foreign language skills, especially English, are a plus.</li>
                    <li>Possess a good service attitude, patience, and attentiveness.</li>
                    <li>Required to interact with guests daily, answer questions, and handle complaints.</li>
                </ul>
                <h4 id="ATR">Who You Are:</h4>
                <ul id="WYAlist">
                    <li>No specific education requirement, more emphasis on practical skills and experience.</li>
                    <li>High school diploma, with relevant work experience being a plus.</li>
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
                            <li><a href="findjob_student.php">Job Search</a></li>
                            <li><a href="studentprofile(nivin)_student.php">Profile</a></li>
                            <li><a href="manageapplication_student.php">Manage Application</a></li>
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
                            <li><a href="aboutus_student.php">About Us</a></li>
                            <li><a href="contactus_student.php">Contact Us</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </footer>
    <script>
        document.getElementById("applyBtn").addEventListener("click", function() {
            window.location.href = "applyjob(GDsutera)_student.php";
        });
        document.getElementById("applynowBtn").addEventListener("click", function() {
            window.location.href = "applyjob(GDsutera)_student.php";
        });

    </script>
</body>

</html>
