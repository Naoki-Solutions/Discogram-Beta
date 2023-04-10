<?php
include('config.php');

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("TRUNCATE TABLE messages;");

header("location: ../../login.php");
exit;
?>