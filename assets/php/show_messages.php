<?php
include('config.php');

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT author, message, timestamp FROM messages ORDER BY timestamp ASC";
$result = $conn->query($sql);

echo '<div class="display-msg" id="display-msg">';
echo '<label>';

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $message = htmlspecialchars($row["message"]);
    $timestamp = strtotime($row["timestamp"]);

    // Markdown

    // Reemplazar cualquier texto entre dos pares de asteriscos con una etiqueta de negrita
    $message = preg_replace('/\*\*(.*?)\*\*/', '<b>$1</b>', $message);
    // Reemplazar cualquier texto entre dos acentos graves con un fondo oscuro
    $message = preg_replace('/`([^`]*)`/', '<span style="background-color: #1c2025; padding: 2px 4px; border-radius: 3px;">$1</span>', $message);
    // Convertir URLs en enlaces clicables
    $message = preg_replace('/(https?:\/\/[^\s]+)/', '<a href="$1" style="color: #2272d1;">$1</a>', $message);
    if (substr($message, 0, 2) == "||" && substr($message, -2) == "||") {
      // Sombrear/tapar el texto y añadir un evento onclick para mostrarlo
      $message = '<span style="background-color: #1e1f22; color: #1e1f22; padding: 2px 4px; border-radius: 3px; cursor: pointer;" onclick="this.style.backgroundColor=\'black\'; this.style.color=\'white\';">' . substr($message, 2, -2) . '</span>';
    } else {
      // Si el mensaje no empieza y termina por "||", mostrarlo normalmente
      $message = '<span>' . $message . '</span>';
    }

    // Fin del Markdown

    // Verificar si el mensaje es de hoy
    $isToday = date('Y-m-d', $timestamp) === date('Y-m-d');

    // Formatear la fecha y hora según si es de hoy o no
    if ($isToday) {
      $formattedTimestamp = 'hoy a las <span style="font-size: 12px;">' . date('H:i', $timestamp) . '</span>';
    } else {
      $formattedTimestamp = '<span style="font-size: 12px;">' . date('Y-m-d H:i', $timestamp) . '</span>';
    }

    $author = htmlspecialchars($row["author"]);

    // Mostrar nombre, fecha y mensaje
    echo "<p><strong style=\"font-weight: normal;\">{$author} - <span style=\"font-size: 12px;\">{$formattedTimestamp}</span>:<br></strong><span>{$message}</span></p>";
  }

} else {
  echo "<p>No messages found</p>";
}

echo '</label>';
echo '</div>';
echo "<script>var elem = document.getElementById('display-msg'); elem.scrollTop = elem.scrollHeight;</script>";
$conn->close();
?>
