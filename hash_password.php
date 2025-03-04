<?php
$password1 = "Winnie@2004"; // First password
$hashed_password1 = password_hash($password1, PASSWORD_BCRYPT);
echo "Hashed Password for Winnie@2004: " . $hashed_password1 . "<br>";

$password2 = "Susan@2004"; // Second password
$hashed_password2 = password_hash($password2, PASSWORD_BCRYPT);
echo "Hashed Password for Susan@2004: " . $hashed_password2 . "<br>";
?>
