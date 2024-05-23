<?php
include_once "connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the edited company overview from the form
    $companyOverview = $_POST['companyOverview'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update the company overview in the database
    $sql = "UPDATE company_table SET company_overview='$companyOverview' WHERE company_id=1";
    if ($conn->query($sql) === TRUE) {
        echo "Company overview updated successfully";
    } else {
        echo "Error updating company overview: " . $conn->error;
    }

    $conn->close();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InternHub - Boomedia</title>
    <link rel="stylesheet" href="css/companyprofile(boomedia)_company.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <header>
        <div class="container">
            <a href="aboutus_company.php">
                <img src="images/logo.png" alt="Job Seeker" class="logo">
            </a>
            <nav>
                <ul>
                    <li><a href="aboutus_company.php">About Us</a></li>
                    <li><a href="findcandidate_company.php">Candidate Profiles</a></li>
                    <li><a href="manageapplication_company.php">Applications</a></li>
                    <li><a href="companyprofile(boomedia)_company.php">Profile</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropbtn"><img src="images/profile.png" alt="Profile" class="signin-img"></a>
                        <div class="dropdown-content">
                            <a href="companyprofile(boomedia)_company.php">Profile</a>
                            <a href="manageapplication_company.php">Manage Application</a>
                            <a href="settings_company.php">Settings</a>
                            <hr>
                            <a href="index.php" class="signout">Sign Out</a>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <div id="Background">
        <img id="Buzzbackground" src="images/boomediacoverpic.jpg" width="100%" height="60%">
        <img id="Buzz" src="images/boomedia.png" width="300px" height="300px">
    </div>

    <section id="scrollToSection" class="hero">
        <section id="LogoandBf" class="three-column-section">
            <div class="company-header">
                <h1 id="BF">Boomedia Sdn Bhd</h1>
                <a href="editprofile(boomedia)_company.php" class="edit-profile-btn"><button>Edit Profile</button></a>
            </div>
        </section>
        <p id="KM">Kuala Lumpur, Malaysia</p>
        <h3 id="CO">Company overview <i id="editIcon" class="fas fa-pencil-alt"></i></h3>

        <p id="ICP">Industry: Entertainment and Publishing
            <br>Company size: 1-10 employees
            <br>Primary location: 3 Jalan PJS 11/11 Bandar Sunway Petaling Jaya 46150
        </p>
        <button id="saveButton">Save</button>

        <div class="content">
            <h3>Who We Are</h3>
            <p>Branding is a huge part of how your business is perceived by potential clients. It must deliver your message clearly, connect with your target audience, motivate a potential buyer and maintain client loyalty. At every point of contact with the public, your branding must be strong, recognisable and clear. Branding appears everywhere from business cards, letterheads, invoices, compliment slips, vouchers, price lists, brochures, reports, flyers, leaflets, adverts – online and press, websites, vehicles, signage, vehicles, promotional gifts….the list is endless but it all has one aim – to promote your business and motivate potential consumers to contact you.</p>
            <section id="production" class="two-column-section">
                <div id="proone">
                    <img src="images/Buzzworks-Production-1.webp" width="100%" alt="production">
                </div>
                <div id="protwo">
                    <img src="images/Buzzworks-Production-2.webp" width="100%" alt="production">
                </div>
            </section>
            <section id="production" class="two-column-section">
                <div id="prothree">
                    <img src="images/Buzzworks-Production-3.webp" width="100%" alt="production">
                </div>
                <div id="profour">
                    <img src="images/Buzzworks-Production-4..jfif" width="100%" alt="production">
                </div>
            </section>
        </div>
        <div class="scroll-down-button">
            <a href="#scrollToSection">
                <i class="fas fa-chevron-down"></i>
            </a>
        </div>
    </section>
    
    <h4 id="AJ">Available Jobs</h4>
    <section id="tcs" class="two-column-section">
        <div id="ContentCreater">
            <h2>Creative Illustrator</h2>
            <p>A content creator is someone who creates entertaining or educational material to be expressed through any medium or channel.</p>
            <a href="viewjob(SMMboomedia)_student.php"><button>Apply</button></a>
        </div>
        <div id="WildlifePresenter">
            <h2>Graphics Designer</h2>
            <p>Wildlife presenters are confident speakers, comfortable speaking to the public, in front of the camera and have a sense of charisma.</p>
            <a href="viewjob(SMMboomedia)_student.php"><button>Apply</button></a>
        </div>
    </section>

    <section id="tcs" class="two-column-section">
        <div id="Illustrator">
            <h2>Illustrator</h2>
            <p id="tocreate">To create, design, concepts for attractions, stories, props, special functions that meets objectives of an international standard family theme park.</p>
            <a href="viewjob(SMMboomedia)_student.php"><button>Apply</button></a>
        </div>
        <div id="PerformerEntertainer">
            <h2>Social Media Manager</h2>
            <p id="provide">To provide in-park entertainment for all guests.</p>
            <a href="viewjob(SMMboomedia)_student.php"><button>Apply</button></a>
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
        // Function to handle clicking on the edit icon
        document.getElementById("editIcon").addEventListener("click", function() {
            console.log("Edit icon clicked");
            var companyOverview = document.getElementById("ICP");
            var companyOverviewText = companyOverview.innerHTML;
            var companyOverviewTextarea = document.createElement("textarea");
            companyOverviewTextarea.value = companyOverviewText;
            companyOverview.parentNode.replaceChild(companyOverviewTextarea, companyOverview);
        });

        // Function to handle clicking on the save button
        document.getElementById("saveButton").addEventListener("click", function() {
            console.log("Save button clicked");
            var companyOverviewTextarea = document.querySelector("#ICP textarea");
            var companyOverviewText = companyOverviewTextarea.value;
            var companyOverview = document.getElementById("ICP");
            companyOverview.innerHTML = companyOverviewText; // Update the existing <p> element with the edited text
            companyOverviewTextarea.parentNode.replaceChild(companyOverview, companyOverviewTextarea);

            // Send the updated company overview to the server
            var xhr = new XMLHttpRequest();
            xhr.open("POST", window.location.href, true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        console.log(xhr.responseText);
                        // Check if the response indicates successful update
                        if (xhr.responseText.trim() === "Company overview updated successfully") {
                            var updatedOverview = document.createElement("p");
                            updatedOverview.innerHTML = companyOverviewText;
                            companyOverview.parentNode.replaceChild(updatedOverview, companyOverview);
                        } else {
                            // Display an error message
                            alert("Error updating company overview. Please try again.");
                        }
                    } else {
                        // Display an error message
                        alert("Error: " + xhr.status);
                    }
                }
            };
            var params = "companyOverview=" + encodeURIComponent(companyOverviewText);
            xhr.send(params);
        });

    </script>
</body>
</html>
