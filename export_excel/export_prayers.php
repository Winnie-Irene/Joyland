<?php

require_once '../db.php';

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=prayer_requests_report.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo "Name\tRequest\tDate\n";

$query = "SELECT name, prayer, created_at FROM prayer_requests";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
   
    $shortPrayer = substr($row['prayer'], 0, 50) . '...';
    
    echo $row['name'] . "\t" . $shortPrayer . "\t" . $row['created_at'] . "\n";
}

exit();
?>
