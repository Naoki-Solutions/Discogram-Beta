<?php

include('./assets/php/config.php');
session_start();
// Verificación de la conexión
if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error);
}

// Crear servidor
if(isset($_POST['crear_servidor'])) {
    $server_name = $_POST['server_name'];
    $username = $_SESSION['username']; // Nombre de usuario del usuario que crea el servidor
    $server_id = uniqid(); // Generar un ID único para el servidor

    // Insertar el servidor en la tabla de servidores
    $sql = "INSERT INTO servers (server_id, user_id, server_name) VALUES ('$server_id', '$username', '$server_name')";
    if ($conn->query($sql) === TRUE) {
        echo "El servidor se ha creado correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Crear archivo PHP
    $file_path = "./assets/php/servers/" . $server_id . ".php"; // Ruta del archivo PHP
    $template = file_get_contents("./assets/php/components/plantilla.php"); // Contenido de la plantilla PHP
    file_put_contents($file_path, $template); // Crear el archivo PHP
}

// Mostrar servidores en la página principal
$sql = "SELECT * FROM servers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["server_id"]. " - Nombre del servidor: " . $row["server_name"]. "<br>";
    }
} else {
    echo "No se han encontrado servidores.";
}

$conn->close();
?>
