<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InternHub - Manage Application</title>
    <link rel="stylesheet" href="css/manageapplication_company.css">
</head>

<body>
    <header>
        <div class="container">
            <img src="images/logo.png" alt="Job Seeker" class="logo">
            <nav>
                <ul>
                    <li><a href="aboutus_company.php">About Us</a></li>
                    <li><a href="findcandidate_company.php">Candidate Profiles</a></li>
                    <li><a href="manageapplication_company.php">Applications</a></li>
                    <li><a href="#">Profile</a></li>
                    <div class="dropdown">
                        <a href="#" class="dropbtn"><img src="images/profile.png" alt="Profile" class="signin-img"></a>
                        <div class="dropdown-content">
                            <a href="#">Profile</a>
                            <a href="manageapplication_company.php">Manage Application</a>
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
        <div class="filter-links">
            <a href="#" class="filter-link active" data-filter="new">New Applications</a>
            <a href="#" class="filter-link" data-filter="rejected">Rejected</a>
            <a href="#" class="filter-link" data-filter="pending">Pending</a>
            <a href="#" class="filter-link" data-filter="approved">Approved</a>
        </div>
    </div>


    <!-- Application boxes -->
       
        <!-- Application boxes related to "New" -->
        <div class="application-box new-box">
            <!-- Application box 1 -->
            <div class="application-box">
                <div class="options">
                    <div class="dropdowndot">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                    <div class="dropdown-content1">
                        <a href="#">Accept Application</a>
                        <a href="#">Pending List</a>
                        <a href="#" class="delete-application">Delete Application</a>
                    </div>
                </div>
                <div class="content">
                    <h2>Video Editor</h2>
                    <p>Sinan Teoman</p>
                    <p>Bachelors in Film Production</p>
                    <p>Tunku Abdul Rahman University of Management and Technology</p>
                    <div class="tick">&#10004;</div>
                    <div class="applied-on">Applied on 10 Apr 2024</div>
                </div>
                <div class="view-application">
                    <button>View Application</button>
                </div>
            </div>
            <!-- Application box 2 -->
            <div class="application-box">
                <div class="options">
                    <div class="dropdowndot">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                    <div class="dropdown-content1">
                        <a href="#">Accept Application</a>
                        <a href="#">Pending List</a>
                        <a href="#" class="delete-application">Delete Application</a>
                    </div>
                </div>
                <div class="content">
                    <h2>Graphics Illustrator</h2>
                    <p>Nelson Teoh</p>
                    <p>Bachelors in Graphics Design</p>
                    <p>Tunku Abdul Rahman University of Management and Technology</p>
                    <div class="tick">&#10004;</div>
                    <div class="applied-on">Applied on 10 Apr 2024</div>
                </div>
                <div class="view-application">
                    <button>View Application</button>
                </div>
            </div>
            <!-- Application box 3 -->
            <div class="application-box">
                <div class="options">
                    <div class="dropdowndot">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                    <div class="dropdown-content1">
                        <a href="#">Accept Application</a>
                        <a href="#">Pending List</a>
                        <a href="#" class="delete-application">Delete Application</a>
                    </div>
                </div>
                <div class="content">
                    <h2>Video Editor</h2>
                    <p>Muhammad Ali Kemal</p>
                    <p>Bachelors in Film Production</p>
                    <p>Tunku Abdul Rahman University of Management and Technology</p>
                    <div class="tick">&#10004;</div>
                    <div class="applied-on">Applied on 10 Apr 2024</div>
                </div>
                <div class="view-application">
                    <button>View Application</button>
                </div>
            </div>
            <!-- Application box 4 -->
            <div class="application-box">
                <div class="options">
                    <div class="dropdowndot">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                    <div class="dropdown-content1">
                        <a href="#">Accept Application</a>
                        <a href="#">Pending List</a>
                        <a href="#" class="delete-application">Delete Application</a>
                    </div>
                </div>
                <div class="content">
                    <h2>Graphics Illustrator</h2>
                    <p>Ferris Tan</p>
                    <p>Bachelors in Graphics Desisgn</p>
                    <p>Tunku Abdul Rahman University of Management and Technology</p>
                    <div class="tick">&#10004;</div>
                    <div class="applied-on">Applied on 10 Apr 2024</div>
                </div>
                <div class="view-application">
                    <button>View Application</button>
                </div>
            </div>
            <!-- Application box 5 -->
            <div class="application-box">
                <div class="options">
                    <div class="dropdowndot">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                    <div class="dropdown-content1">
                        <a href="#">Accept Application</a>
                        <a href="#">Pending List</a>
                        <a href="#" class="delete-application">Delete Application</a>
                    </div>
                </div>
                <div class="content">
                    <h2>Video Editor</h2>
                    <p>Tan Siew Kim</p>
                    <p>Bachelors in Graphics Desisgn</p>
                    <p>Tunku Abdul Rahman University of Management and Technology</p>
                    <div class="tick">&#10004;</div>
                    <div class="applied-on">Applied on 10 Apr 2024</div>
                </div>
                <div class="view-application">
                    <button>View Application</button>
                </div>
            </div>
        </div>

        <!-- Application boxes related to "Rejected" -->
        <div class="application-box rejected-box">
            <!-- "Rejected" application box  1-->
            <div class="application-box">
                <div class="content">
                    <h2>John Doe</h2>
                    <p>Job : Graphics Designer</p>
                    <p>Reason: Not a good fit for the role</p>
                    <p>Rejected Date: 20 March 2024</p>
                </div>
                <div class="view-application">
                    <button>View Application</button>
                </div>
            </div>
            <!-- "Rejected" application box  2-->
            <div class="application-box">
                <div class="content">
                    <h2>Alya Natasya</h2>
                    <p>Job : Web Designer</p>
                    <p>Reason: Not a good fit for the role</p>
                    <p>Rejected Date: 27 March 2024</p>
                </div>
                <div class="view-application">
                    <button>View Application</button>
                </div>
            </div>
            <!-- "Rejected" application box  3-->
            <div class="application-box">
                <div class="content">
                    <h2>Muhammad Khairul Nizam</h2>
                    <p>Job : Graphics Designer</p>
                    <p>Reason: Overqualified</p>
                    <p>Rejected Date: 20 March 2024</p>
                </div>
                <div class="view-application">
                    <button>View Application</button>
                </div>
            </div>
            <!-- "Rejected" application box  4-->
            <div class="application-box">
                <div class="content">
                    <h2>Tan Chen Seong</h2>
                    <p>Job : Graphics Designer</p>
                    <p>Reason: Not a good fit for the role</p>
                    <p>Rejected Date: 20 March 2024</p>
                </div>
                <div class="view-application">
                    <button>View Application</button>
                </div>
            </div>
        </div>


        <!-- Application boxes related to "Pending" -->
        <div class="application-box pending-box" style="display:none;">
            <!-- "Pending" application box 1-->
            <div class="application-box">
                <div class="content">
                    <h2>Lee Ming Jie</h2>
                    <p>Job: Web Developer</p>
                    <p>Reason: Pending review</p>
                    <p>Application Date: 25 April 2024</p>
                </div>
                <div class="view-application">
                    <button>View Application</button>
                </div>
            </div>
            <!-- "Pending" application box 2-->
            <div class="application-box">
                <div class="content">
                    <h2>Tan Hui Yin</h2>
                    <p>Job: Web Developer</p>
                    <p>Reason: Pending review</p>
                    <p>Application Date: 25 April 2024</p>
                </div>
                <div class="view-application">
                    <button>View Application</button>
                </div>
            </div>
            <!-- "Pending" application box 3-->
            <div class="application-box">
                <div class="content">
                    <h2>Nivin Thomas</h2>
                    <p>Job: Web Developer</p>
                    <p>Reason: Pending review</p>
                    <p>Application Date: 25 April 2024</p>
                </div>
                <div class="view-application">
                    <button>View Application</button>
                </div>
            </div>
        </div>


        <!-- Application boxes related to "Approved" -->
        <div class="application-box approved-box" style="display:none;">
            <!-- "Approved" application box 1-->
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
            <!-- "Approved" application box 2-->
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
        </div>
    </div>


<!-- Footer -->
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

    <!-- JavaScript to handle filter links -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var filterLinks = document.querySelectorAll(".filter-link");

            // Add click event listener to each filter link
            filterLinks.forEach(function(link) {
                link.addEventListener("click", function() {
                    // Remove 'active' class from all filter links
                    filterLinks.forEach(function(item) {
                        item.classList.remove("active");
                    });
                    // Add 'active' class to the clicked filter link
                    link.classList.add("active");

                    // Hide all application boxes except the footer
                    var applicationBoxes = document.querySelectorAll(".application-box");
                    applicationBoxes.forEach(function(box) {
                        box.style.display = "none";
                    });

                    // Show the appropriate application boxes based on the filter link clicked
                    var filter = link.getAttribute("data-filter");
                    var targetBox = document.querySelector("." + filter + "-box");
                    targetBox.style.display = "block";
                });
            });
        });
    </script>
</body>

</html>

