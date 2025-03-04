<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>JOYLAND CHURCH</title>
    <!-- Local Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <script src="js/sweetalert2.min.js"></script>
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
                  <li><a href="ministries.php" class="nav-link px-3 link-dark">Ministries</a></li>
                  <li><a href="announcements.php" class="nav-link px-3 link-dark">Announcements</a></li>
                  <li><a href="#" class="active nav-link px-3 link-dark" aria-current="page">Contact Us</a></li>
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
  
<p style="line-height: 1.8; font-family: 'Arial', sans-serif; font-size: 1.2rem; text-align: center; color: #444; margin-bottom: 20px; margin-top: 30px">
  We'd love to hear from you! Whether you have questions, prayer requests, or want to learn more about our church, feel free to reach out.
</p>
<ul class="list-unstyled" style="text-align: center; padding: 0; margin: 20px 0; font-size: 1.1rem; color: #555;">
  <li style="margin-bottom: 10px;">Address: Kiria-ini, Murang’a</li>
  <li style="margin-bottom: 10px;">Phone: +254 794 720 311</li>
  <li style="margin-bottom: 10px;">Email: irene.wanjiru.winnie@gmail.com</li>
</ul>

<p style="line-height: 1.8; font-family: 'Arial', sans-serif; font-size: 1.2rem; text-align: center; color: #444; margin-top: 20px;">
  Or fill out our contact form, and we'll get back to you soon. We also welcome you to visit us in person and experience the warmth of our church family firsthand. Our doors are always open, and we look forward to meeting you!
</p>

<div class="row" style="margin-top: 40px;">
  <div class="col-4" style="text-align: center;">
    <img src="images/Contact.png" alt="Contact Us" style="max-width: 100%; height: auto;">
  </div>
  <div class="col-8">
    <section id="contact">
        <h2 style="text-align: center; font-size: 2rem; color: #333;">Contact Us</h2>
       
        <!-- Bootstrap Alert (Hidden Initially) -->
        <div id="contactAlert" class="alert d-none" role="alert"></div>
        
        <!-- Contact Form -->
        <form action="process_contact.php" method="post" id="contactForm" style="padding: 20px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9; margin-right: 30px;">
            <div class="mb-3">
                <label for="firstName" class="form-label" style="font-weight: bold;">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter your first name" required>
            </div>

            <div class="mb-3">
                <label for="lastName" class="form-label" style="font-weight: bold;">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter your last name" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label" style="font-weight: bold;">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label" style="font-weight: bold;">Phone Number (Optional)</label>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="e.g.: +254 712 345 678">
            </div>

            <div class="mb-3">
                <label for="message" class="form-label" style="font-weight: bold;">Message</label>
                <textarea class="form-control" id="message" name="message" placeholder="Share your thoughts with us" rows="3" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary" style="background-color: #007bff;">Submit</button>
        </form>
    </section>
</div>
</div>

<!-- AJAX Script to Handle Form Submission -->
<script>
document.getElementById("contactForm").addEventListener("submit", function(event) {
    event.preventDefault(); 

    var formData = new FormData(this);

    fetch("process_contact.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        let alertDiv = document.getElementById("contactAlert");

        if (data.trim() === "success") {
            // Show success message
            alertDiv.className = "alert alert-success";
            alertDiv.innerHTML = "Message sent successfully!";
            alertDiv.classList.remove("d-none");

            // Clear form fields
            document.getElementById("contactForm").reset();

            setTimeout(() => {
                    alertDiv.style.display = "none";
                }, 3000);

        } else {
            // Show error message
            alertDiv.className = "alert alert-danger";
            alertDiv.innerHTML = "There was an error processing your message. Please try again.";
            alertDiv.classList.remove("d-none");
            
            setTimeout(() => {
                    alertDiv.style.display = "none";
                }, 3000);
        }
    })
    .catch(error => console.error("Error:", error));
});
</script>

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
                    <li><a href="ministries.php" class="text-white text-decoration-none">Ministries</a></li>
                    <li><a href="announcements.php" class="text-white text-decoration-none">Announcements</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Contact Us</a></li>
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
</body>
</html>