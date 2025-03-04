<?php

require_once '../db.php';

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=messages_report.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo "First Name\tLast Name\tMessage\tDate\n";

$query = "SELECT FirstName, LastName, Message, Message_Date FROM contactus";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {

    $shortMessage = substr($row['Message'], 0, 50) ;
    
    echo $row['FirstName'] . "\t" . $row['LastName'] . "\t" . $shortMessage . "\t" . $row['Message_Date'] . "\n";
}

exit();
?>
