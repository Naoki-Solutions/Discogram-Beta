<?php
// Reemplaza estos valores con los detalles de tu propia base de datos
$servername = "localhost";
$username = "root";
$password = "ab3135c2@";
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT author, message FROM messages ORDER BY timestamp ASC";
$result = $conn->query($sql);

echo '<div class="display-msg">';

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<p><strong>" . htmlspecialchars($row["author"]) . ":</strong> " . htmlspecialchars($row["message"]) . "</p>";
  }
} else {
  echo "No messages found";
}

echo '</div>';

$conn->close();
?>