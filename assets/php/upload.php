<?php
// Establecer la conexión a la base de datos
$servername = "localhost"; // Cambia esto si tu servidor de base de datos es diferente
$username = "root";
$password = "ab3135c2@";
$dbname = "discogram";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

session_start();

// Obtener los datos del archivo subido
$target_dir = "pfp/"; // Directorio donde se almacenarán las imágenes (debe tener permisos de escritura)
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Verificar si el archivo subido es una imagen
$check = getimagesize($_FILES["image"]["tmp_name"]);
if ($check === false) {
    die("El archivo seleccionado no es una imagen válida.");
}

// Mover el archivo al directorio de imágenes
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    // Actualizar la ruta de la foto de perfil en la base de datos
    $username = $_SESSION["username"]; // Obtener el nombre de usuario de la sesión actual
    $profile_picture = $target_file;

    $sql = "UPDATE users SET profile_picture='$profile_picture' WHERE username='$username'";

    if ($conn->query($sql) === true) {
        echo "La foto de perfil se ha actualizado correctamente.";
    } else {
        echo "Error al actualizar la foto de perfil: " . $conn->error;
    }
} else {
    echo "Error al subir el archivo de imagen.";
}

$conn->close();
?>
