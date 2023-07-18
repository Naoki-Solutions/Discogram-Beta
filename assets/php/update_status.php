<?php
session_start();

// Obtener el nuevo estado del usuario
$newStatus = $_POST["newStatus"];

// Actualizar el estado en la base de datos
require_once "config.php"; // Reemplaza "config.php" con el archivo que contiene la conexión a tu base de datos

$user_id = $_SESSION["id"];

$stmt = $conn->prepare("UPDATE users SET status = ? WHERE id = ?");
$stmt->bind_param("si", $newStatus, $user_id);
$stmt->execute();
$stmt->close();

// Devolver una respuesta (opcional)
// echo "OK";
?>
