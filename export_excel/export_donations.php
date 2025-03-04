<?php

require_once '../db.php';

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=donations_report.xls");

$result = mysqli_query($conn, "SELECT * FROM donations");
echo "Donor Name\tAmount\tDate\n";
while ($row = mysqli_fetch_assoc($result)) {
    echo "{$row['name']}\t{$row['amount']}\t{$row['donation_date']}\n";
}
exit();
?>
