<?php
// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Conexión a la base de datos
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "discogram";
    
    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);
    if ($conn->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
    }
    session_start();
    ini_set('display_errors', 1);
error_reporting(E_ALL);

    // Verificar que se haya subido la imagen correctamente
    if ($_FILES["profile_picture"]["error"] === UPLOAD_ERR_OK) {
        // Obtener información del archivo
        $file_name = $_FILES["profile_picture"]["name"];
        $file_tmp_name = $_FILES["profile_picture"]["tmp_name"];
        $file_size = $_FILES["profile_picture"]["size"];
        $file_type = $_FILES["profile_picture"]["type"];
        
        // Leer el contenido del archivo
        $profile_picture_data = file_get_contents($file_tmp_name);
        
        // Obtener el nombre de usuario del formulario o desde alguna variable (dependiendo de tu implementación)
        $username = $_SESSION["username"];
        var_dump($username); // Verificar el nombre de usuario

        // Mostrar binario
        // $profile_picture_data = file_get_contents($file_tmp_name);
        // var_dump($profile_picture_data); // Verificar el contenido binario de la imagen

        
        // Verificar si el usuario ya existe en la tabla "users"
        $sql_user_exists = "SELECT id FROM users WHERE username = ?";
        $stmt_user_exists = $conn->prepare($sql_user_exists);
        $stmt_user_exists->bind_param("s", $username);
        $stmt_user_exists->execute();
        $stmt_user_exists->store_result();
        
        if ($stmt_user_exists->num_rows > 0) {
            // Si el usuario existe, realizar una operación de actualización para cambiar la foto de perfil
            $sql_update_profile_picture = "UPDATE users SET profile_picture = ? WHERE username = ?";
            $stmt_update_profile_picture = $conn->prepare($sql_update_profile_picture);
            $stmt_update_profile_picture->bind_param("ss", $profile_picture_data, $username);
        
            // Agregar mensajes de depuración
            // echo "SQL UPDATE: $sql_update_profile_picture<br>";
            // echo "Username: $username<br>";
            // echo "Profile Picture Data Length: " . strlen($profile_picture_data) . " bytes<br>";
            
            // Intenta ejecutar la consulta
            if ($stmt_update_profile_picture->execute()) {
                header("Location: " . $_SERVER['HTTP_REFERER']);
                exit;
            } else {
                echo "Error al actualizar la foto de perfil: " . $stmt_update_profile_picture->error;
                echo "<br>Error al ejecutar la consulta: " . $conn->error;
            }
        
            $stmt_update_profile_picture->close();
        } else {
            echo "Usuario no encontrado en la base de datos.";
        }
        
        $stmt_user_exists->close();
        
    } else {
        echo "Error al subir la foto de perfil: ";
        switch ($_FILES["profile_picture"]["error"]) {
            case UPLOAD_ERR_INI_SIZE:
                echo "El tamaño del archivo excede la directiva 'upload_max_filesize' en php.ini.";
                break;
            case UPLOAD_ERR_FORM_SIZE:
                echo "El tamaño del archivo excede el límite especificado en el formulario.";
                break;
            case UPLOAD_ERR_PARTIAL:
                echo "El archivo no se subió completamente.";
                break;
            case UPLOAD_ERR_NO_FILE:
                echo "No se seleccionó ningún archivo para subir.";
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                echo "Falta una carpeta temporal. Intente nuevamente más tarde.";
                break;
            case UPLOAD_ERR_CANT_WRITE:
                echo "Error al escribir el archivo en el disco. Intente nuevamente más tarde.";
                break;
            case UPLOAD_ERR_EXTENSION:
                echo "Una extensión de PHP detuvo la subida del archivo.";
                break;
            default:
                echo "Error desconocido al subir el archivo.";
                break;
        }
    }
    
    $conn->close();
}
?>
