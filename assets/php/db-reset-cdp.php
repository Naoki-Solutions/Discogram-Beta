<?php
$servername = "localhost";
$username = "root";
$password = "ab3135c2@";
$dbname = "discogram";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("TRUNCATE TABLE messages;");

header("location: ../../login.php");
exit;
?>