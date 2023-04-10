<?php
session_start();

// Reemplaza estos valores con los detalles de tu propia base de datos
include('config.php');

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['message']) && isset($_SESSION['username'])) {
  $author = $_SESSION['username'];
  $message = $_POST['message'];

  $stmt = $conn->prepare("INSERT INTO messages (author, message) VALUES (?, ?)");
  $stmt->bind_param("ss", $author, $message);

  if ($stmt->execute()) {
    header('Location: ' . "../../content/cdp-general.php", true, 301);

    exit();
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
} else {
  echo "Invalid request";
}

$conn->close();
?>