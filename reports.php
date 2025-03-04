<?php
session_start();
include 'db.php';

// Check if user is logged in
if (!isset($_SESSION['role'])) {
    header("Location: login.php");
    exit();
}

$role = $_SESSION['role'];

// Fetch data based on role
$donations = ($role == 'Super Admin' || $role == 'Admin' || $role == 'Treasurer') ? mysqli_query($conn, "SELECT * FROM donations ORDER BY donation_date DESC") : [];
$members = ($role == 'Super Admin' || $role == 'Admin' || $role == 'Ministry Leader') ? mysqli_query($conn, "SELECT * FROM ministries ORDER BY registered_at DESC") : [];
$messages = ($role == 'Super Admin' || $role == 'Admin' || $role == 'Secretary') ? mysqli_query($conn, "SELECT * FROM contactus ORDER BY Message_Date DESC") : [];
$prayer_requests = ($role == 'Super Admin' || $role == 'Admin' || $role == 'Secretary') ? mysqli_query($conn, "SELECT * FROM prayer_requests ORDER BY created_at DESC") : [];
$ministry_members = ($role == 'Super Admin' || $role == 'Admin' || $role == 'Ministry Leader') ? mysqli_query($conn, "SELECT ministry, COUNT(*) AS TotalMembers FROM ministries GROUP BY ministry") : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <link rel="stylesheet" href="custom.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        section {
            background: #fff;
            padding: 20px;
            margin: 20px auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 900px;
        }
        h3 {
            color: #444;
            border-bottom: 2px solid #007bff;
            padding-bottom: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background: #007bff;
            color: white;
        }
        button {
            background: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Reports</h2>
    
    <?php if ($role == 'Super Admin' || $role == 'Admin' || $role == 'Treasurer') { ?>
        <section>
            <h3>Donations Report</h3>
            <table>
                <tr><th>Donor</th><th>Amount</th><th>Date</th></tr>
                <?php while ($row = mysqli_fetch_assoc($donations)) { ?>
                    <tr><td><?php echo $row['name']; ?></td><td>KES <?php echo number_format($row['amount'], 2); ?></td><td><?php echo $row['donation_date']; ?></td></tr>
                <?php } ?>
            </table>
            <button onclick="window.location.href='export_pdfs/export_donations.php'">Export to PDF</button>
            <button onclick="window.location.href='export_excel/export_donations.php'">Export to Excel</button>
        </section>
    <?php } ?>

    <?php if ($role == 'Super Admin' || $role == 'Admin' || $role == 'Ministry Leader') { ?>
        <section>
            <h3>Ministry Registration Report</h3>
            <table>
                <tr><th>Name</th><th>Ministry</th><th>Registration Date</th></tr>
                <?php while ($row = mysqli_fetch_assoc($members)) { ?>
                    <tr><td><?php echo $row['name']; ?></td><td><?php echo $row['ministry']; ?></td><td><?php echo $row['registered_at']; ?></td></tr>
                <?php } ?>
            </table>
            <button onclick="window.location.href='export_pdfs/export_ministries.php'">Export to PDF</button>
            <button onclick="window.location.href='export_excel/export_ministries.php'">Export to Excel</button>
            <h3>Ministry Members Report</h3>
            <table>
                <tr><th>Ministry Name</th><th>Total Members</th></tr>
                <?php while ($row = mysqli_fetch_assoc($ministry_members)) { ?>
                    <tr><td><?php echo $row['ministry']; ?></td><td><?php echo $row['TotalMembers']; ?></td></tr>
                <?php } ?>
            </table>
            <button onclick="window.location.href='export_pdfs/export_ministry_members.php'">Export to PDF</button>
            <button onclick="window.location.href='export_excel/export_ministry_members.php'">Export to Excel</button>
        </section>
    <?php } ?>

    <?php if ($role == 'Super Admin' || $role == 'Admin' || $role == 'Secretary') { ?>
        <section>
            <h3>Messages Report</h3>
            <table>
                <tr><th>First Name</th><th>Last Name</th><th>Message</th><th>Date</th></tr>
                <?php while ($row = mysqli_fetch_assoc($messages)) { ?>
                    <tr><td><?php echo $row['FirstName']; ?></td><td><?php echo $row['LastName']; ?></td><td><?php echo substr($row['Message'], 0, 50) . '...'; ?></td><td><?php echo $row['Message_Date']; ?></td></tr>
                <?php } ?>
            </table>
            <button onclick="window.location.href='export_pdfs/export_messages.php'">Export to PDF</button>
            <button onclick="window.location.href='export_excel/export_messages.php'">Export to Excel</button>
    </section>
    <?php } ?>

    <?php if ($role == 'Super Admin' || $role == 'Admin' || $role == 'Secretary') { ?>
        <section>
            <h3>Prayer Requests Report</h3>
            <table>
                <tr><th>Name</th><th>Request</th><th>Date</th></tr>
                <?php while ($row = mysqli_fetch_assoc($prayer_requests)) { ?>
                    <tr><td><?php echo $row['name']; ?></td><td><?php echo substr($row['prayer'], 0, 50) . '...'; ?></td><td><?php echo $row['created_at']; ?></td></tr>
                <?php } ?>
            </table>
            <button onclick="window.location.href='export_pdfs/export_prayers.php'">Export to PDF</button>
            <button onclick="window.location.href='export_excel/export_prayers.php'">Export to Excel</button>
        </section>
    <?php } ?>

    <script>
    function exportToPDF(section) {
        window.location.href = 'export_pdf.php?section=' + section;
    }
    function exportToExcel(section) {
        window.location.href = 'export_excel.php?section=' + section;
    }
    </script>
</body>
</html>
