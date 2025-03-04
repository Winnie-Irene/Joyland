<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>JOYLAND CHURCH</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/all.min.css">
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
                  <li><a href="#" class="active nav-link px-3 link-dark" aria-current="page">Home</a></li>
                  <li><a href="about.php" class="nav-link px-3 link-dark">About Us</a></li>
                  <li><a href="sermons.php" class="nav-link px-3 link-dark">Sermons</a></li>
                  <li><a href="ministries.php" class="nav-link px-3 link-dark">Ministries</a></li>
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

<div class="container-fluid py-5">
    <div class="text-center">
        <h1>
          Welcome to Joyland Church – A Place to Belong, Grow, and Thrive
        </h1>
        <p style="font-size: large;">
            At Joyland Church, we believe faith is more than just knowledge—it’s about a life-changing encounter with God. Worship, prayer, and the Word are not just events on a schedule but opportunities to experience God’s presence, find purpose, and build meaningful relationships.
            <br><br>
            Whether you are stepping into church for the first time or have been walking with God for years, you are welcome here. We are a family of believers dedicated to growing in faith, serving others, and spreading the love of Jesus Christ.
        </p>
    </div>
        <h1 style="text-align: center; margin-top: 20px; margin-bottom: 20px;">
        What You Can Expect at Joyland Church
        </h1>
    <div class="row">
      <div class="col-3">
        <h5 style="text-align: center;"><b>🙏 Spirit-Filled Worship</b></h5>
       <p style="font-size: large;">
       Our worship services are vibrant, heartfelt, and centered on God. Through powerful music and passionate praise, we create an atmosphere where you can connect deeply with Him.</p> 
      </div>
      <div class="col-3">
        <h5 style="text-align: center;"><b>✝️ A Place for Spiritual Growth</b></h5>
        <p style="font-size: large;">
        We believe that faith flourishes when nurtured. That’s why we offer Bible studies, small groups, and discipleship programs to help you deepen your relationship with God and discover your spiritual gifts.</p>
      </div>
      <div class="col-3">
        <h5 style="text-align: center;"><b>🤝 A Loving and Supportive Community</b></h5>
        <p style="font-size: large;">
        Church is more than a Sunday gathering—it’s a family. At Joyland, you’ll find people who genuinely care, pray with you, and walk alongside you in every season of life.</p>
      </div>
      <div class="col-3">
        <h5 style="text-align: center;"><b>💙 A Mission Beyond the Church Walls</b></h5>
        <p style="font-size: large;">
        Our commitment to Christ extends beyond our services. Through outreach programs, community service, and missions, we strive to be the hands and feet of Jesus—bringing hope, love, and transformation to those in need.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-10">
    <h2>Why Become a Member?</h2>
    <p style="font-size: large; line-height: 2; color:black">Becoming a member of Joyland Church is an opportunity to: <br>
    ✅ Be part of a Christ-centered community – You don’t have to walk your faith journey alone. At Joyland, you will find a loving, supportive church family to walk with you through life’s highs and lows. <br>
    ✅ Grow Spiritually – Through dynamic worship, powerful sermons, Bible study groups, and discipleship programs, you will deepen your knowledge of God’s Word and strengthen your faith. <br>
    ✅ Find Purpose in Serving – God has given you gifts and talents, and He calls us to use them for His glory. Whether you feel led to serve in worship, outreach, youth ministry, or media, there’s a place for you to grow and make an impact. <br>
    ✅ Experience True Fellowship – Church is more than just a building; it’s a family. Our community is built on faith, love, and shared experiences. You’ll meet people who will encourage, uplift, and pray for you as you walk this journey together.</p>
      </div>
      <div class="col-2">
        
      </div>
    </div>
  </div>

<div class="container-fluid vh-50 d-flex align-items-center" 
     style="background: linear-gradient(135deg, rgba(200,200,200,0.4), rgba(100,100,100,0.3)); 
            backdrop-filter: blur(5px);">

    <div class="row w-100 align-items-center">
        
        <div class="col-md-6 p-0">
            <img src="images/Prayer_request.png" class="img-fluid w-100 h-100 object-fit-cover rounded shadow" alt="Prayer Requests">
        </div>

        <div class="col-md-6 p-5 d-flex flex-column justify-content-center">
            <h1> 
              Prayer Requests – You Are Not Alone
            </h1>
            <p style="font-size: large; line-height: 2;">
            At Joyland Church, we believe in the power of prayer. No matter what you're facing—whether it's a moment of sorrow, a season of uncertainty, or a time of celebration—God hears you, and we are here to pray with you. <br>
            No request is too big or too small. Some people reach out when they are grieving the loss of a loved one, while others seek prayer for everyday concerns like work, family, or even misplaced keys! Whatever is on your heart, God cares, and so do we.
            </p>
            <h2>
            Why We Pray 
            </h2>
            <p style="font-size: large; line-height: 2;">
            Prayer is more than just words—it’s a powerful connection with God that brings peace, comfort, and divine intervention. Through prayer, we surrender our worries, strengthen our faith, and open the door for God’s miraculous works in our lives. <br>
            📖 "Do not be anxious about anything, but in every situation, by prayer and petition, with thanksgiving, present your requests to God." – Philippians 4:6 <br> 
            Even if you don’t know what to pray for, our prayer team is here for you. We will stand in faith on your behalf, lifting up your requests to God and believing for His guidance, healing, and provision in your life. <br>
            </p>

            <a href="#" data-bs-toggle="modal" data-bs-target="#prayerRequestModal"
                style="display: inline-block; background-color: #ff6600; color: #fff; 
                padding: 14px 24px; border-radius: 50px; font-weight: bold; 
                text-decoration: none; font-size: 1.3rem; width: fit-content;">
                MAKE YOUR REQUEST 
            </a>
        </div>

    </div>
</div>

<div> 
  <h1 style="text-align: center;">
    <b>Service Times</b>
  </h1>
  <div class="row" style="text-align: center; margin-bottom: 30px;">
    <div class="col-4">
      <img src="images/clock_icon.jpg" alt="Worship Icon" style="width: 50px; height: 50px; margin-bottom: 10px;">
      <h2>Worship</h2>
      <p>9:00 AM & 11:00 AM</p>
    </div>
    <div class="col-4">
      <img src="images/cross_icon.webp" alt="Midweek Service Icon" style="width: 50px; height: 50px; margin-bottom: 10px;">
      <h2>Midweek Service</h2>
      <p>Wednesdays at 6:30 PM</p>
    </div>
    <div class="col-4">
      <img src="images/bible_icon.jpg" alt="Bible Study Icon" style="width: 50px; height: 50px; margin-bottom: 10px;">
      <h2>Bible Study Groups</h2>
      <p>Fridays at 7:00 PM</p>
    </div>
  </div>
</div>

<div class="row floating-img" style="height: 900px; background-image: url(images/Purpose.png); background-repeat: no-repeat; background-position: center; background-size: cover; text-align:center">
  <h1>Experience what God can do through you</h1>
  <p style="font-size: large; line-height: 2; color:black">
  At Joyland Church, we believe that every person is created with a unique purpose and that God works through each of us in incredible ways. Being part of a church is not just about attending services—it’s about belonging to a spiritual family, growing in faith, and discovering how God can use you to make a difference.
  The Christian journey is one of faith, fellowship, and service. Whether you are new to church or have been walking with God for years, you have a place here. Joyland Church is a home where you can deepen your relationship with Christ, build meaningful connections, and use your God-given gifts to impact lives.
  </p>
  <h2>Discover Your Ministry</h2>
  <p style="font-size: large; line-height: 2; color:black">At Joyland Church, we believe that everyone has a role to play in God’s kingdom. Our ministries are diverse, growing, and designed to help you serve in a way that aligns with your passion and calling. No matter your skill, background, or experience, there’s a place for you in the body of Christ. Some of the ministries you can be a part of include: <br>
    <ol style="font-size: large; line-height: 2; color:black">
      <li>Children's Ministry: A fun, safe environment where kids learn about Jesus through Bible stories, activities, and songs. Our dedicated volunteers are passionate about nurturing young hearts for Christ, fostering a love for God from an early age.</li>
      <li>Youth Ministry: Empowering young people to live out their faith boldly. Through engaging lessons, mentorship, and fun activities, we help teens navigate the challenges of life with a Christ-centered perspective.</li>
      <li>Worship Ministry: Leading the church in heartfelt praise and worship. Our worship team is committed to creating an atmosphere where people can encounter God's presence through music, art, and creative expression.</li>
      <li>Outreach Ministry: Serving our community with love and compassion. We believe in being the hands and feet of Jesus, reaching out to those in need through various outreach programs, mission projects, and partnerships with local organizations.</li>
      <li>Women's Ministry: Encouraging women to grow spiritually, build meaningful relationships, and discover their unique purpose in Christ through Bible studies, retreats, and fellowship events.</li>
      <li>Men's Ministry: Supporting men in their faith journey, fostering leadership, accountability, and spiritual growth through discipleship groups, prayer meetings, and service projects.</li>
      <li>Widows & Widowers Ministry: Offering comfort, support, and fellowship to those who have lost their spouses. Through grief counseling, prayer gatherings, and community-building activities, we provide a safe space where healing and spiritual renewal can take place.</li>
      <li>Prayer Ministry: A dedicated team committed to intercessory prayer, supporting the church community through regular prayer meetings and special prayer events.</li>
    </ol>
  </p>
  <h2>Take the Next Step – Join the Joyland Family!</h2>
  <p style="font-size: large; line-height: 2; color:black">If you’re ready to take the next step in your faith journey, we invite you to register as a member of Joyland Church. When you sign up, someone from our team will personally connect with you, help you find your place, and walk with you as you begin this incredible journey of faith, service, and community. Come as you are and experience the joy of being part of something bigger than yourself. Together, we are the Church. Together, we can make a difference!</p>
  <a href="ministries.php"> Our Ministries </a> 
</div>
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
                    <li><a href="#" class="text-white text-decoration-none">Home</a></li>
                    <li><a href="about.php" class="text-white text-decoration-none">About Us</a></li>
                    <li><a href="sermons.php" class="text-white text-decoration-none">Sermons</a></li>
                    <li><a href="ministries.php" class="text-white text-decoration-none">Ministries</a></li>
                    <li><a href="announcements.php" class="text-white text-decoration-none">Announcements</a></li>
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
 

<!-- Prayer Request Modal -->
<div class="modal fade" id="prayerRequestModal" tabindex="-1" aria-labelledby="prayerRequestLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="prayerRequestLabel">Submit a Prayer Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Bootstrap Alert (Initially Hidden) -->
                <div id="prayerAlert" class="alert alert-success d-none" role="alert">
                    Your prayer request has been submitted successfully!
                </div>

                <!-- Prayer Request Form -->
                <form action="store_prayer.php" method="post" id="prayerRequestForm">
                    <div class="mb-3">
                        <label for="name" class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email (Optional)</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="prayer" class="form-label">Prayer Request</label>
                        <textarea class="form-control" id="prayer" name="prayer" rows="4" required></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-dark">Submit Request</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- AJAX Script to Submit Form -->
<script>
document.getElementById("prayerRequestForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent page reload

    var formData = new FormData(this);

    fetch("store_prayer.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text()) 
    .then(data => {
        if (data.trim() === "success") {
            // Show Bootstrap alert
            let alertDiv = document.getElementById("prayerAlert");
            alertDiv.classList.remove("d-none");

            // Clear form fields
            document.getElementById("prayerRequestForm").reset();

            // Hide the alert and close the modal after 3 seconds
            setTimeout(() => {
                alertDiv.classList.add("d-none");
                var modal = bootstrap.Modal.getInstance(document.getElementById('prayerRequestModal'));
                modal.hide();
            }, 3000);
        }
    })
    .catch(error => console.error("Error:", error));
});
</script>



<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>