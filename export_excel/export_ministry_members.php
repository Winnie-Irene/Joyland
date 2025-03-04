<?php

require_once '../db.php';

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=ministry_members.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo "Ministry Name\tTotal Members\n";

$query = "SELECT ministry, COUNT(*) AS TotalMembers FROM ministries GROUP BY ministry";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    echo $row['ministry'] . "\t" . $row['TotalMembers'] . "\n";
}

exit();
?>
