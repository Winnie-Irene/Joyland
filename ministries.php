<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>JOYLAND CHURCH</title>
  
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/all.min.css">

<style>
   /* Global Styling */
body {
    background: linear-gradient(135deg, #f0f4f8, #e0e7ff); 
}

/* Ministries Section */
.ministries {
    width: 100%;
    max-width: 2000px;
    text-align: center;
    padding: 50px 20px;
}

.intro-text {
    font-size: 1.2rem;
    color: #555;
    max-width: 700px;
    margin: 0 auto 40px;
    line-height: 1.6;
}

/* Grid Layout */
.grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); 
    gap: 25px;
    padding: 10px;
}

/* Ministry Cards */
.ministry-card {
    height: 300px;
    background: #fff;
    padding: 25px;
    border-radius: 20px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
    transition: all 0.3s ease-in-out;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center; 
    align-items: center;
    position: relative;
    overflow: hidden;
}

/* Icon Styling */
.ministry-card i {
    font-size: 2.8rem;
    color: white;
    padding: 15px;
    border-radius: 50%;
    margin-bottom: 15px;
    position: relative;
    z-index: 2;
}

/* Card Content */
.ministry-card h3 {
    font-size: 1.6rem;
    color: #333;
    margin-bottom: 10px;
    font-weight: 600;
    position: relative;
    z-index: 2;
}

.ministry-card p {
    font-size: 1rem;
    color: #555;
    line-height: 1.5;
    padding: 0 10px;
    position: relative;
    z-index: 2;
}

/* Hover Effect */
.ministry-card:hover {
    background: rgba(0, 0, 0, 0.7); /* Darkens background */
    transform: translateY(-7px);
}

.ministry-card:hover i {
    background: black;
    color: grey;
}

.ministry-card button {
    position: relative;
    z-index: 2;
}

.ministry-card div {
    pointer-events: none;
}

.ministry-card:hover h3,
.ministry-card:hover p {
    color: white;
}

@media (max-width: 768px) {
    .grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 480px) {
    .grid {
        grid-template-columns: 1fr;
    }
}

</style>

</head>
<body>
    <header>
            <!-- 🔹 Top Bar -->
            <div class="px-3 py-2 border-bottom bg-light text-black">
              <div class="container-fluid d-flex flex-wrap align-items-center justify-content-between">
                <!-- Logo -->
                <a href="/" class="d-flex align-items-center mb-2 mb-md-0 text-dark text-decoration-none">
                  <img src="images/joyland_logo.png" alt="Logo" width="50" height="50"> 
                  <span class="fs-5 text-dark fw-bold me-3">JOYLAND CHURCH</span>
                </a>
          
                <!-- Navigation Links -->
                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                  <li><a href="index.php" class="nav-link px-3 link-dark">Home</a></li>
                  <li><a href="about.php" class="nav-link px-3 link-dark">About Us</a></li>
                  <li><a href="sermons.php" class="nav-link px-3 link-dark">Sermons</a></li>
                  <li><a href="#" class="active nav-link px-3 link-dark" aria-current="page">Ministries</a></li>
                  <li><a href="announcements.php" class="nav-link px-3 link-dark">Announcements</a></li>
                  <li><a href="contact.php" class="nav-link px-3 link-dark">Contact Us</a></li>
                </ul>
          
              </div>
            </div>
          
    </header>

    <main>
         <!-- Carousel -->
    <div id="joylandCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/worship.jpg" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption d-none d-md-block">
                <h2 style="color: white; font-size: xx-large; font-family: Arial, Helvetica, sans-serif;"><b>Psalm 46:10</b></h2>
                <p style="color: white; font-size: xx-large; font-family: Arial, Helvetica, sans-serif;">"Be still, and know that I am God." <br> Experience faith, love, and community with us.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/adoration.jpg" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption">
                    <h2 style="color: white; font-size: xx-large; font-family: Arial, Helvetica, sans-serif;"><b>Acts 20:28</b></h2>
                    <p style="color: white; font-size: xx-large; font-family: Arial, Helvetica, sans-serif;">“Pay careful attention to yourselves and to all the flock, in which the Holy Spirit has made <br> you overseers, to care for the church of God, which he obtained with his own blood.” <br>Engage in uplifting worship and inspiring sermons.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/adore.jpg" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption d-none d-md-block">
                    <h2 style="color: white; font-size: xx-large; font-family: Arial, Helvetica, sans-serif;"><b>Leviticus 19:34</b></h2>
                    <p style="color: white; font-size: xx-large; font-family: Arial, Helvetica, sans-serif;">“You shall treat the stranger who sojourns with you as the native among you, and you shall love him as yourself,<br> for you were strangers in the land of Egypt: I am the Lord your God.” <br>Find your spiritual home at Joyland Church.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#joylandCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#joylandCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    
    <section class="ministries">
        <h2>Our Ministries</h2>
        <p class="intro-text">Our ministries are designed to help you grow in faith and connect with others. No matter your age or stage in life, there's a place for you to belong and serve.</p>
        
        <div class="grid">
            <div class="ministry-card" style="position: relative; background-image: url('images/Children.png'); background-repeat: no-repeat; background-size: cover; border-radius: 15px; padding: 20px; text-align: center; overflow: hidden;">
                <!-- Overlay div inside -->
                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);"></div>
            
                <!-- Content (placed after overlay so it's on top) -->
                <i class="fas fa-child"></i>
                <h3 style="position: relative; color: white; z-index: 1;">Children's Ministry</h3>
                <p style="position: relative; color: white; z-index: 1;"> A fun, safe environment where kids learn about Jesus through Bible stories, activities, and songs. Our dedicated volunteers are passionate about nurturing young hearts for Christ, fostering a love for God from an early age.</p>
                <button class="btn btn-light text-black" data-bs-toggle="modal" data-bs-target="#ministryModal">Register</button>
            </div>
            

            <div class="ministry-card" style="position: relative; background-image: url('images/Youth.png'); background-repeat: no-repeat; background-size: cover; border-radius: 15px; padding: 20px; text-align: center; overflow: hidden;">
                <!-- Overlay div inside -->
                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 1;"></div>
            
                <!-- Content (placed after overlay so it's on top) -->
                <i class="fas fa-users"></i>
                <h3 style="position: relative; color: white; z-index: 1;">Youth Ministry</h3>
                <p style="position: relative; color: white; z-index: 1;">Empowering young people to live out their faith boldly. Through engaging lessons, mentorship, and fun activities, we help teens navigate the challenges of life with a Christ-centered perspective.</p>
                <button class="btn btn-light text-black" data-bs-toggle="modal" data-bs-target="#ministryModal">Register</button>
            </div>

            <div class="ministry-card" style="position: relative; background-image: url('images/Worship.png'); background-repeat: no-repeat; background-size: cover; border-radius: 15px; padding: 20px; text-align: center; overflow: hidden;">
                <!-- Overlay div inside -->
                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);"></div>
            
                <!-- Content (placed after overlay so it's on top) -->
                <i class="fas fa-music"></i>
                <h3 style="position: relative; color: white; z-index: 1;">Worship Ministry</h3>
                <p style="position: relative; color: white; z-index: 1;">Leading the church in heartfelt praise and worship. Our worship team is committed to creating an atmosphere where people can encounter God's presence through music, art, and creative expression.</p>
                <button class="btn btn-light text-black" data-bs-toggle="modal" data-bs-target="#ministryModal">Register</button>
            </div>

            <div class="ministry-card" style="position: relative; background-image: url('images/Outreach.png'); background-repeat: no-repeat; background-size: cover; border-radius: 15px; padding: 20px; text-align: center; overflow: hidden;">
                <!-- Overlay div inside -->
                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);"></div>
            
                <!-- Content (placed after overlay so it's on top) -->
                <i class="fas fa-hands-helping"></i>
                <h3 style="position: relative; color: white; z-index: 1;">Outreach Ministry</h3>
                <p style="position: relative; color: white; z-index: 1;">Serving our community with love and compassion. We believe in being the hands and feet of Jesus, reaching out to those in need through various outreach programs, mission projects, and partnerships with local organizations.</p>
                <button class="btn btn-light text-black" data-bs-toggle="modal" data-bs-target="#ministryModal">Register</button>
            </div>

            <div class="ministry-card" style="position: relative; background-image: url('images/Women.png'); background-repeat: no-repeat; background-size: cover; border-radius: 15px; padding: 20px; text-align: center; overflow: hidden;">
                <!-- Overlay div inside -->
                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);"></div>
            
                <!-- Content (placed after overlay so it's on top) -->
                <i class="fas fa-female"></i>
                <h3 style="position: relative; color: white; z-index: 1;">Women's Ministry</h3>
                <p style="position: relative; color: white; z-index: 1;">Encouraging women to grow spiritually, build meaningful relationships, and discover their unique purpose in Christ through Bible studies, retreats, and fellowship events.</p>
                <button class="btn btn-light text-black" data-bs-toggle="modal" data-bs-target="#ministryModal">Register</button>
            </div>

            <div class="ministry-card" style="position: relative; background-image: url('images/Men.png'); background-repeat: no-repeat; background-size: cover; border-radius: 15px; padding: 20px; text-align: center; overflow: hidden;">
                <!-- Overlay div inside -->
                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);"></div>
            
                <!-- Content (placed after overlay so it's on top) -->
                <i class="fas fa-male"></i>
                <h3 style="position: relative; color: white; z-index: 1;">Men's Ministry</h3>
                <p style="position: relative; color: white; z-index: 1;">Supporting men in their faith journey, fostering leadership, accountability, and spiritual growth through discipleship groups, prayer meetings, and service projects.</p>
                <button class="btn btn-light text-black" data-bs-toggle="modal" data-bs-target="#ministryModal">Register</button>
            </div>

            <div class="ministry-card" style="position: relative; background-image: url('images/Widowed.png'); background-repeat: no-repeat; background-size: cover; border-radius: 15px; padding: 20px; text-align: center; overflow: hidden;">
                <!-- Overlay div inside -->
                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);"></div>
            
                <!-- Content (placed after overlay so it's on top) -->
                <i class="fas fa-user-friends"></i>
                <h3 style="position: relative; color: white; z-index: 1;">Widows & Widowers Ministry</h3>
                <p style="position: relative; color: white; z-index: 1;"> Offering comfort, support, and fellowship to those who have lost their spouses. Through grief counseling, prayer gatherings, and community-building activities, we provide a safe space where healing and spiritual renewal can take place.</p>
                <button class="btn btn-light text-black" id="donateBtn" data-bs-toggle="modal" data-bs-target="#ministryModal">Register</button>
            </div>

            <div class="ministry-card" style="position: relative; background-image: url('images/Prayer_ministry.png'); background-repeat: no-repeat; background-size: cover; border-radius: 15px; padding: 20px; text-align: center; overflow: hidden;">
                <!-- Overlay div inside -->
                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);"></div>
            
                <!-- Content (placed after overlay so it's on top) -->
                <i class="fas fa-praying-hands"></i>
                <h3 style="position: relative; color: white; z-index: 1;">Prayer Ministry</h3>
                <p style="position: relative; color: white; z-index: 1;">A dedicated team committed to intercessory prayer, supporting the church community through regular prayer meetings and special prayer events.</p>
                <button class="btn btn-light text-black" id="donateBtn" data-bs-toggle="modal" data-bs-target="#ministryModal">Register</button>
            </div>
        </div>
    </section>

    </main>

    <footer>
        <div class="px-3 py-2 border-bottom bg-dark text-light">
            <div class="row">
              <div class="col-4" style="text-align: left;">
                <h5>Contact Us</h5>
                    <p>Email: <a href="mailto:irene.wanjiru.winnie@gmail.com" class="text-white text-decoration-none">irene.wanjiru.winnie@gmail.com</a></p>
                    <p>Phone: +254 794 720 311</p>
              </div>
              <div class="col-4" style="text-align: center;">
                <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.php" class="text-white text-decoration-none">Home</a></li>
                        <li><a href="about.php" class="text-white text-decoration-none">About Us</a></li>
                        <li><a href="sermons.php" class="text-white text-decoration-none">Sermons</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Ministries</a></li>
                        <li><a href="contact.php" class="text-white text-decoration-none">Contact Us</a></li>
                    </ul>
              </div>
              <div class="col-4" style="text-align: right;">
                <p style="text-align: right;">Follow Us</p>
                <div>
                    <a href="https://www.facebook.com" target="_blank" class="text-white me-3">
                        <i class="fab fa-facebook fa-2x"></i>
                    </a>
                    <a href="https://www.twitter.com" target="_blank" class="text-white me-3">
                        <i class="fab fa-twitter fa-2x"></i>
                    </a>
                    <a href="https://www.instagram.com" target="_blank" class="text-white me-3">
                        <i class="fab fa-instagram fa-2x"></i>
                    </a>
                    <a href="https://www.youtube.com" target="_blank" class="text-white">
                        <i class="fab fa-youtube fa-2x"></i>
                    </a>
              </div>
            </div>
          <div class="text-center mt-3">
              <p>&copy; 2025 Joyland Church. All rights reserved.</p>
          </div>
          </div>
    </footer>
    
<!-- Ministry Registration Modal -->
<div class="modal fade" id="ministryModal" tabindex="-1" aria-labelledby="ministryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="ministryModalLabel">Join a Ministry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Bootstrap Alert -->
                <div id="ministryAlert" class="alert d-none" role="alert"></div>

                <form id="ministryForm">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="ministry" class="form-label">Select Ministry</label>
                        <select class="form-control" id="ministry" name="ministry" required>
                            <option value="Children's Ministry">Children's Ministry</option>
                            <option value="Youth Ministry">Youth Ministry</option>
                            <option value="Worship Ministry">Worship Ministry</option>
                            <option value="Outreach Ministry">Outreach Ministry</option>
                            <option value="Women's Ministry">Women's Ministry</option>
                            <option value="Men's Ministry">Men's Ministry</option>
                            <option value="Widows & Widowers Ministry">Widows & Widowers Ministry</option>
                            <option value="Prayer Ministry">Prayer Ministry</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- jQuery & AJAX Script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    $("#ministryForm").submit(function (event) {
        event.preventDefault(); // Prevent form from refreshing page

        $.ajax({
            url: "register_ministry.php",
            type: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function (response) {
                let alertBox = $("#ministryAlert");

                if (response.status === "success") {
                    alertBox.removeClass("d-none alert-danger").addClass("alert-success").text(response.message);
                    $("#ministryForm")[0].reset(); // Reset form on success
                } else {
                    alertBox.removeClass("d-none alert-success").addClass("alert-danger").text(response.message);
                }
            },
            error: function () {
                $("#ministryAlert").removeClass("d-none alert-success").addClass("alert-danger").text("An error occurred.");
            }
        });
    });
});
</script>


<!-- Sticky Donation Button -->
<a href="#" class="donation-button" data-bs-toggle="modal" data-bs-target="#donationModal">
    Donate
</a>

<!-- Donation Modal -->
<div class="modal fade" id="donationModal" tabindex="-1" aria-labelledby="donationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="donationModalLabel">Make a Donation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Bootstrap Alert (Hidden Initially) -->
                <div id="donationAlert" class="alert d-none" role="alert"></div>

                <!-- Donation Form -->
                <form action="process_donation.php" method="post" id="donationForm">
                    <div class="mb-3">
                        <label for="name" class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email (Optional)</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Donation Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-dark">Donate Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- AJAX Script to Handle Form Submission -->
<script>
document.getElementById("donationForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent page reload

    var formData = new FormData(this);

    fetch("process_donation.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        let alertDiv = document.getElementById("donationAlert");

        if (data.trim() === "success") {
            // Show success message
            alertDiv.className = "alert alert-success";
            alertDiv.innerHTML = "Thank you for your donation!";
            alertDiv.classList.remove("d-none");

            // Clear form fields
            document.getElementById("donationForm").reset();

            // Hide alert and close modal after 3 seconds
            setTimeout(() => {
                alertDiv.classList.add("d-none");
                var modal = bootstrap.Modal.getInstance(document.getElementById('donationModal'));
                modal.hide();
            }, 3000);
        } else {
            // Show error message
            alertDiv.className = "alert alert-danger";
            alertDiv.innerHTML = "There was an error processing your donation. Please try again.";
            alertDiv.classList.remove("d-none");
        }
    })
    .catch(error => console.error("Error:", error));
});
</script>

<!-- CSS for Sticky Button -->
<style>
    .donation-button {
        position: fixed;
        bottom: 300px;
        right: 20px;
        background-color: black;
        color: white;
        padding: 12px 20px;
        border-radius: 50px;
        font-weight: bold;
        text-decoration: none;
        font-size: 1.2rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: background 0.3s ease-in-out;
    }

    .donation-button:hover {
        background-color: black;
    }
</style>

    <script src="js/bootstrap.bundle.min.js"></script>

    <script>
    document.getElementById("donateBtn").addEventListener("click", function () {
    var modal = new bootstrap.Modal(document.getElementById("ministryModal"));
    modal.show();
    });
    </script>

    </body>
    </html>