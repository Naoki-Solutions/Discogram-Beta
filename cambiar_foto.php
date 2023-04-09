<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "ab3135c2@";
$dbname = "login";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Consulta SQL para obtener la imagen de perfil actual
$sql = "SELECT foto FROM users WHERE id = 1"; // Reemplaza '1' por el ID del usuario actual
$result = mysqli_query($conn, $sql);

// Verificar si se encontró la imagen
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $imagePath = $row['foto'];
    $imageType = mime_content_type($imagePath); // Obtener el tipo MIME de la imagen

    // Imprimir la imagen en el documento HTML
    echo '<img src="'.$imagePath.'" alt="Foto de perfil">';
} else {
    // Si no se encontró la imagen, mostrar una imagen por defecto
    echo '<img src="default.jpg" alt="Foto de perfil">';
}

mysqli_close($conn);
?>
