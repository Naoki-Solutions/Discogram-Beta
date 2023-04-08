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
echo '<label>';

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $color = $row["author"] === "keyder" ? "#218de8" : "#848688";
    echo "<p><strong>" . htmlspecialchars($row["author"]). ":<br></strong><span style=\"color:$color;\"> " . htmlspecialchars($row["message"]) . "</span></p>";
  }
} else {
  echo "<p>No messages found</p>";
}

echo '</label>';
echo '</div>';

$conn->close();
?>
