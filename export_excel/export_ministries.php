<?php

require_once '../db.php';

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=ministry_registration.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo "Name\tMinistry\tRegistration Date\n";

$query = "SELECT name, ministry, registered_at FROM ministries";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    echo $row['name'] . "\t" . $row['ministry'] . "\t" . $row['registered_at'] . "\n";
}

exit();
?>
