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

echo '<div class="display-msg" id="display-msg">';
echo '<label>';

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    switch($row["author"]) {
      case "keyder":
        $color = "#218de8";
        break;
      case "pina":
        $color = "#fe0000";
        break;
      default:
        $color = "#848688";
        break;
    }
    $message = htmlspecialchars($row["message"]);
    if (preg_match('/^\*\*(.*)\*\*$/', $message, $matches)) {
        $message = '<b>' . $matches[1] . '</b>';
    }

    echo "<p><strong><img id=\"noimg\" src=\"../assets/images/noimg.png\">" . htmlspecialchars($row["author"]). ":<br></strong><span style=\"color:$color;\"> " . $message . "</span></p>";
  }
} else {
  echo "<p>No messages found</p>";
}

echo '</label>';
echo '</div>';
echo "<script>var elem = document.getElementById('display-msg'); elem.scrollTop = elem.scrollHeight;</script>";
$conn->close();
?>
