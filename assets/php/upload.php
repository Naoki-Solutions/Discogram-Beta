<?php
session_start();
$username = $_SESSION["username"];

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

$image_url = "./uploads/" . $target_file;

// Conexión a la base de datos
$conn = mysqli_connect("localhost", "root", "ab3135c2@", "login");

// Verificar conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Actualizar registro de usuario con la ruta de la imagen
$sql = "UPDATE users SET image_url='$image_url' WHERE username='$username'";
if (mysqli_query($conn, $sql)) {
    echo "Imagen de perfil actualizada exitosamente.";
} else {
    echo "Error al actualizar la imagen de perfil: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
