<?php
session_start();
include 'db.php';

$user_id = $_SESSION['user_id'];
$sql = "SELECT role FROM admins WHERE id='$user_id'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

$_SESSION['role'] = $user['role']; // Store role in session
?>


<?php
include 'db.php';

// Fetch total donations
$donation_query = "SELECT COUNT(*) AS total_donations, SUM(amount) AS total_amount FROM donations";
$donation_result = $conn->query($donation_query);
$donation_data = $donation_result->fetch_assoc();
$total_donations = $donation_data['total_donations'];
$total_donation_amount = $donation_data['total_amount'];

// Fetch total prayer requests
$prayer_query = "SELECT COUNT(*) AS total_prayers FROM prayer_requests";
$prayer_result = $conn->query($prayer_query);
$prayer_data = $prayer_result->fetch_assoc();
$total_prayers = $prayer_data['total_prayers'];

// Fetch total members
$member_query = "SELECT COUNT(*) AS total_members FROM ministries";
$member_result = $conn->query($member_query);
$member_data = $member_result->fetch_assoc();
$total_members = $member_data['total_members'];

// Fetch total messages
$message_query = "SELECT COUNT(*) AS total_messages FROM contactus";
$message_result = $conn->query($message_query);
$message_data = $message_result->fetch_assoc();
$total_messages = $message_data['total_messages'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            display: flex;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #f9f9f9, #e3e3e3);
            color: #333;
            margin: 0;
            padding: 0;
        }
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            padding: 20px;
            position: fixed;
            height: 100vh;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 5px;
            transition: 0.3s;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            margin-left: 260px;
            flex-grow: 1;
            padding: 20px;
            transition: 0.3s;
        }
        .sticky-cards {
            top: 0;
            z-index: 1000;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 30px;
        }
        .card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            flex: 1;
            min-width: 250px;
            transition: transform 0.3s ease-in-out;
            cursor: pointer;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .hidden {
            display: none;
        }
        .table-container {
            overflow-x: auto;
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center; 
        }

        thead {
            background: #4a90e2;
            color: #fff;
        }

        thead th {
            padding: 12px;
            text-transform: uppercase;
        }

        tbody tr:nth-child(even) {
            background: #f2f2f2;
        }

        tbody td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        @keyframes fadeInUp {
        from {
        opacity: 0;
        transform: translateY(20px);
        }
        to {
        opacity: 1;
        transform: translateY(0);
        }
        }

        .table-container, .sticky-cards {
            animation: fadeInUp 0.6s ease-in-out;
        }

        /* Manage Admins Section */
        #admins {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        #admins h2 {
            margin-bottom: 15px;
            color: #333;
        }

        /* Admin Form */
        #admins form {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        }

        #admins input, 
        #admins select, 
        #admins button {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        #admins input, 
        #admins select {
            flex: 1;
            min-width: 150px;
        }

        #admins button {
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        #admins button:hover {
            background: #0056b3;
        }

        /* Admins Table */
        #admins table {
            width: 100%;
            border-collapse: collapse;
        }

        #admins table th, 
        #admins table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        #admins table th {
            background: #007bff;
            color: white;
        }

        #admins table td {
            background: #f9f9f9;
        }

        /* Delete Button */
        #admins table td a button {
            background: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        #admins table td a button:hover {
            background: #b02a37;
        }

    </style>
</head>
<body>
    <!-- Sidebar Menu -->
    <div class="sidebar">
    
    <?php
    $role = $_SESSION['role']; // Get user role from session

    // Super Admin & Admin: Full Access
    if ($role == 'Super Admin' || $role == 'Admin') {
        echo '<a href="#" class="menu-item" data-section="dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a>';
        echo '<a href="#" class="menu-item" data-section="admins"><i class="fas fa-users"></i> Manage Admins</a>';
        echo '<a href="#" class="menu-item" data-section="donations"><i class="fas fa-donate"></i> Donations</a>';
        echo '<a href="#" class="menu-item" data-section="prayers"><i class="fas fa-pray"></i> Prayer Requests</a>';
        echo '<a href="#" class="menu-item" data-section="members"><i class="fas fa-users"></i> Ministry Members</a>';
        echo '<a href="#" class="menu-item" data-section="messages"><i class="fas fa-envelope"></i> Messages</a>';
        echo '<a href="#" class="menu-item" data-section="announcements"><i class="fas fa-bullhorn"></i> Announcements</a>';
        echo '<a href="#" class="menu-item" data-section="sermons"><i class="fas fa-book"></i> Sermons</a>';
        echo '<a href="reports.php"><i class="fas fa-book"></i> Reports</a>';
        echo '<hr>' ;
        echo '<a href="#"><i class="fas fa-cog"></i> Settings</a>';
        echo '<a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>';
    }

    // Secretary: Messages & Announcements
    if ($role == 'Secretary') {
        echo '<a href="#" class="menu-item" data-section="dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a>';
        echo '<a href="#" class="menu-item" data-section="messages"><i class="fas fa-envelope"></i> Messages</a>';
        echo '<a href="#" class="menu-item" data-section="announcements"><i class="fas fa-bullhorn"></i> Announcements</a>';
        echo '<a href="#" class="menu-item" data-section="reports"><i class="fas fa-book"></i> Reports</a>';
        echo '<hr>' ;
        echo '<a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>';
    }

    // Treasurer: Donations Only
    if ($role == 'Treasurer') {
        echo '<a href="#" class="menu-item" data-section="dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a>';
        echo '<a href="#" class="menu-item" data-section="donations"><i class="fas fa-donate"></i> Donations</a>';
        echo '<a href="#" class="menu-item" data-section="reports"><i class="fas fa-book"></i> Reports</a>';
        echo '<hr>' ;
        echo '<a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>';
    }

    // Ministry Leader: Ministry Members Only
    if ($role == 'Ministry Leader') {
        echo '<a href="#" class="menu-item" data-section="dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a>';
        echo '<a href="#" class="menu-item" data-section="members"><i class="fas fa-users"></i> Ministry Members</a>';
        echo '<a href="#" class="menu-item" data-section="reports"><i class="fas fa-book"></i> Reports</a>';
        echo '<hr>' ;
        echo '<a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>';
    }
    ?>
    
    </div>
    
    <div class="content">
        <!-- Dashboard -->
        <div id="dashboard" class="section">
        <div class="sticky-cards">
            <div class="row">
                <div class="col-md-3">
                  <div class="card bg-primary text-white p-3">
                    <h5>Donations</h5>
                    <p>Total Amount: Ksh. <strong><?php echo number_format($total_donation_amount, 2); ?></strong></p>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card bg-success text-white p-3">
                    <h5>Prayer Requests</h5>
                    <p><span id="prayer-count"><?php echo $total_prayers; ?></span> prayer requests</p>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card bg-warning text-white p-3">
                    <h5>Ministry Members</h5>
                    <p><span id="member-count"><?php echo $total_members; ?></span> ministry registrations</p>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card bg-info text-white p-3">
                    <h5>Messages</h5>
                    <p><span id="message-count"><?php echo $total_messages; ?></span> messages received</p>
                  </div>
                </div>
                <div class="col-md-3 mt-3">
                    <div class="card bg-secondary text-white p-3">
                        <h5>Announcements</h5>
                        <p>Post and manage announcements</p>
                    </div>
                </div>
                <div class="col-md-3 mt-3">
                    <div class="card bg-danger text-white p-3">
                        <h5>Sermons</h5>
                        <p>Upload and manage sermons</p>
                    </div>
                </div>
            </div>
        </div>
            <h2>Welcome to the Admin Dashboard</h2>
    </div>

    <!-- Manage Admins -->
    <div id="admins" class="section hidden mt-4">
    <h2>Manage Admins</h2>

    <!-- Form to Add Admin -->
    <form method="POST" action="">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <select name="role" required>
            <option value="Admin">Admin</option>
            <option value="Secretary">Secretary</option>
            <option value="Ministry Leader">Ministry Leader</option>
            <option value="Treasurer">Treasurer</option>
        </select>
        <button type="submit" name="add_admin">Add Admin</button>
    </form>

    <!-- Admins Table -->
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        <?php
        include 'db.php';
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_admin'])) {
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $role = mysqli_real_escape_string($conn, $_POST['role']);

            $sql = "INSERT INTO admins (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')";
            mysqli_query($conn, $sql);
            echo "<script>alert('Admin added successfully!'); window.location.href='dashboard.php';</script>";
        }

        if (isset($_GET['delete'])) {
            $admin_id = intval($_GET['delete']);
            mysqli_query($conn, "DELETE FROM admins WHERE id = $admin_id");
            echo "<script>alert('Admin deleted successfully!'); window.location.href='dashboard.php';</script>";
        }

        $admins = mysqli_query($conn, "SELECT * FROM admins");
        while ($row = mysqli_fetch_assoc($admins)) { ?>
            <tr>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['role']); ?></td>
                <td>
                    <a href="dashboard.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?');">
                        <button>Delete</button>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>
    </div>

        <!-- Donations-->
        <div id="donations" class="section hidden mt-4">
            <div class="col-md-3">
                  <div class="card bg-primary text-white p-3">
                    <h5>Donations</h5>
                    <p>Total Amount: Ksh. <strong><?php echo number_format($total_donation_amount, 2); ?></strong></p>
                  </div>
            </div>
            <h3 style="margin-top: 30px;">Donations</h3>
            <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'db.php';

            $sql = "SELECT id, name, amount, donation_date FROM donations ORDER BY donation_date DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>Ksh. {$row['amount']}</td>
                            <td>{$row['donation_date']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4' class='text-center'>No donations found</td></tr>";
            }
            ?>
        </tbody>
            </table>
        </div>
        
        <!-- Prayer Requests-->
        <div id="prayers" class="section hidden mt-4">
            <div class="col-md-3">
                  <div class="card bg-success text-white p-3">
                    <h5>Prayer Requests</h5>
                    <p><span id="prayer-count"><?php echo $total_prayers; ?></span> prayer requests</p>
                  </div>
            </div>
            <h3 style="margin-top: 30px;">Prayer Requests</h3>
            <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Prayer Request</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'db.php';

            $sql = "SELECT id, name, prayer, created_at FROM prayer_requests ORDER BY id DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['prayer']}</td>
                            <td>{$row['created_at']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4' class='text-center'>No requests found</td></tr>";
            }
            ?>
        </tbody>
            </table>
        </div>

        <!-- Ministry Members-->
        <div id="members" class="section hidden mt-4">
            <div class="col-md-3">
                  <div class="card bg-warning text-white p-3">
                    <h5>Ministry Members</h5>
                    <p><span id="member-count"><?php echo $total_members; ?></span> ministry registrations</p>
                  </div>
            </div>
            <h3 style="margin-top: 30px;">Ministry Members</h3>
            <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Ministry</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
           <?php
            include 'db.php';

            $sql = "SELECT id, name, ministry, registered_at FROM ministries ORDER BY id DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['ministry']}</td>
                            <td>{$row['registered_at']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4' class='text-center'>No requests found</td></tr>";
            }
            ?> 
        </tbody>
            </table>
        </div>
        
        <!-- Messages section -->
        <div id="messages" class="section hidden mt-4">
            <div class="col-md-3">
                  <div class="card bg-info text-white p-3">
                    <h5>Messages</h5>
                    <p><span id="message-count"><?php echo $total_messages; ?></span> messages received</p>
                  </div>
            </div>    
            <h3 style="margin-top: 30px;">Messages</h3>
            <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Message</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'db.php';

            $sql = "SELECT MessageID, FirstName, LastName, Message, Message_Date FROM contactus ORDER BY MessageID DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['MessageID']}</td>
                            <td>{$row['FirstName']}</td>
                            <td>{$row['LastName']}</td>
                            <td>{$row['Message']}</td>
                            <td>{$row['Message_Date']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4' class='text-center'>No requests found</td></tr>";
            }
            ?>
        </tbody>
            </table>
        </div>

        <!-- Announcements section -->
        <div id="announcements" class="section hidden">
            <div class="col-md-3 mt-3">
                <div class="card bg-secondary text-white p-3">
                        <h5>Announcements</h5>
                        <p>Post and manage announcements</p>
                </div>
        </div>
    <!-- Bootstrap Alert for Notifications -->
    <div id="alertBox" class="alert" style="display: none;"></div>

    <!-- Fetch all announcements -->
    <?php
    $query = "SELECT * FROM announcements ORDER BY created_at DESC";
    $result = mysqli_query($conn, $query);
    ?>

    <!-- List Announcements -->
    <h2 class="text-center mb-4" style="margin-top: 50px;">Previous Announcements</h2>
    <table class="table table-bordered bg-light shadow-sm">
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Posted On</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr data-id="<?= $row['id'] ?>">
                    <td contenteditable="false" class="editable title"><?= htmlspecialchars($row['title']); ?></td>
                    <td contenteditable="false" class="editable content"><?= htmlspecialchars($row['content']); ?></td>
                    <td><?= date("F j, Y", strtotime($row['created_at'])); ?></td>
                    <td>
                        <button class="btn btn-warning btn-sm edit-btn">Edit</button>
                        <button class="btn btn-success btn-sm save-btn" style="display: none;">Save</button>
                        <button class="btn btn-danger btn-sm delete-btn" data-id="<?= $row['id']; ?>">Delete</button>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <!-- Add Announcements -->
    <h2 class="text-center mb-4" style="margin-top: 50px;">Post a New Announcement</h2>
    <form id="announcementForm" class="p-4 bg-light rounded shadow-sm">
        <div class="mb-3">
            <label for="title" class="form-label">Announcement Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter announcement title" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Announcement Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" placeholder="Write the announcement here..." required></textarea>
        </div>

        <button type="submit" class="btn btn-primary w-100">Post Announcement</button>
    </form>
    </div>

<!-- Sermons Section -->
<div id="sermons" class="section hidden"> 
        <div class="col-md-3 mt-3">
                <div class="card bg-danger text-white p-3">
                        <h5>Sermons</h5>
                        <p>Upload and manage sermons</p>
                </div>
            </div>           
    <!-- Display Bootstrap Alert if set -->
    <?php
    if (isset($_SESSION['alert'])) {
        list($alert_type, $alert_message) = $_SESSION['alert'];
        echo "<div class='alert alert-$alert_type alert-dismissible fade show' role='alert'>
                $alert_message
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
        unset($_SESSION['alert']); // Clear alert after displaying
    }
    ?>

    <!-- Fetch all sermons -->
    <?php
    $query = "SELECT * FROM sermons ORDER BY created_at DESC";
    $result = mysqli_query($conn, $query);
    ?>
    
    <!-- List Sermons -->
    <h2 class="text-center mb-4" style="margin-top: 50px;">Sermons</h2>
    <table class="table table-bordered bg-light shadow-sm">
        <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Preacher</th>
            <th>Date</th>
            <th>File</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr data-id="<?= $row['id'] ?>">
                <td class="title"><?= htmlspecialchars($row['title']); ?></td>
                <td class="description"><?= htmlspecialchars($row['description']); ?></td>
                <td class="preacher"><?= htmlspecialchars($row['preacher']); ?></td>
                <td class="date"><?= htmlspecialchars($row['date']); ?></td>
                <td class="file">
                    <?php if (!empty($row['file_path'])): ?>
                        <a href="<?= htmlspecialchars($row['file_path']); ?>" target="_blank">Download</a>
                    <?php else: ?>
                        No file
                    <?php endif; ?>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

    <!-- Upload Sermons -->
    <div class="sermons_card shadow-lg p-4">
        <h3 class="text-center mb-4">Upload Sermon</h3>
        <form action="upload_sermon.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Sermon Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="preacher" class="form-label">Preacher</label>
                <input type="text" class="form-control" id="preacher" name="preacher" required>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Sermon Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="sermon_file" class="form-label">Upload Sermon</label>
                <input type="file" class="form-control" id="sermon_file" name="sermon_file">
            </div>

            <button type="submit" class="btn btn-primary w-100">Upload Sermon</button>
        </form>
    </div>

</div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
    const alertBox = document.getElementById("alertBox");

    function showAlert(message, type) {
        alertBox.innerHTML = message;
        alertBox.className = `alert alert-${type}`;
        alertBox.style.display = "block";
        setTimeout(() => { alertBox.style.display = "none"; }, 5000);
    }

    document.getElementById("announcementForm").addEventListener("submit", function (event) {
    event.preventDefault();
    const formData = new FormData(this);

    fetch("add_announcement.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        data = data.trim().toLowerCase(); 
        if (data === "success") {
            showAlert("Announcement posted successfully!", "success");
            setTimeout(() => { location.reload(); }, 2000);
        } else {
            showAlert(data.replace("error: ", ""), "danger");
        }
    })
    .catch(error => {
        console.error("Fetch Error:", error);
        showAlert("Network error. Please try again.", "danger");
    });
});

    // Handle Edit Button Click
    document.querySelectorAll(".edit-btn").forEach(button => {
        button.addEventListener("click", function () {
            const row = this.closest("tr");
            row.querySelector(".title").contentEditable = "true";
            row.querySelector(".content").contentEditable = "true";
            row.querySelector(".save-btn").style.display = "inline-block";
            this.style.display = "none";
        });
    });

    // Handle Save Button Click (Update Announcement)
    document.querySelectorAll(".save-btn").forEach(button => {
        button.addEventListener("click", function () {
            const row = this.closest("tr");
            const id = row.dataset.id;
            const title = row.querySelector(".title").innerText;
            const content = row.querySelector(".content").innerText;

            fetch("manage_announcements.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: `id=${id}&title=${encodeURIComponent(title)}&content=${encodeURIComponent(content)}`
            })
            .then(response => response.text())
            .then(data => {
                if (data.trim().toLowerCase() === "success") {
                    showAlert("Announcement updated successfully!", "success");
                    row.querySelector(".edit-btn").style.display = "inline-block";
                    row.querySelector(".save-btn").style.display = "none";
                    row.querySelector(".title").contentEditable = "false";
                    row.querySelector(".content").contentEditable = "false";
                } else {
                    showAlert("Error updating announcement.", "danger");
                }
            });
        });
    });

    // Handle Delete Button Click
    document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click', function (event) {
        event.preventDefault();
        let id = this.dataset.id;

        if (confirm("Are you sure you want to delete this announcement?")) {
            fetch(`delete_announcement.php?delete=${id}`)
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    showAlert("Announcement deleted successfully!", "success");
                    this.closest('tr').remove();
                } else {
                    showAlert(data.message, "danger");
                }
            })
            .catch(error => console.error("Error:", error));
        }
    });
});

});

</script>

    <script>
    $(document).ready(function () {
        $(".menu-item").click(function (e) {
            e.preventDefault();

            var section = $(this).data("section");

            $(".section").hide();  
            $("#" + section).show(); 
        });
    });
    </script>

</body>
</html>
