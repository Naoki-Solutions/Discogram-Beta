<?php
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../login.php");
    exit;
}

// // Check if the user is authorized to access the debug page
// if ($_SESSION["username"] !== "keyder") {
//     header("location: ../assets/error/error.php");
//     exit;
// }

include('../assets/php/config.php');

$usuario = $_SESSION["username"];

$resultado = mysqli_query($conn, "SELECT * FROM users WHERE username = '$usuario'");

// Extrae el resultado de la consulta
$usuario = mysqli_fetch_array($resultado);

// Verifica si la columna "admin" es false o null
if ($usuario["admin"] == false || $usuario["admin"] == null) {
    // Redirecciona al usuario a una página de acceso denegado
    header("Location: ../assets/error/error.php");
    exit;
}

?>

<?php

		// Consultar la última fila en la tabla "servers"
		$sql = "SELECT server_id FROM servers ORDER BY server_id DESC LIMIT 1";
		$resultado = $conn->query($sql);

		// Si se encontró al menos una fila, mostrar el valor de la última columna
		if ($resultado->num_rows > 0) {
			$fila = $resultado->fetch_assoc();
		} 

		// Cerrar la conexión a la base de datos
		$conn->close();
	?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/debug.css">
    <title>Discogram Beta</title>
</head>

<body>
        <div class="column-vertical">
            <img style="width:50px;" src="../assets/images/logo.png"> 
            <input placeholder="Buscar">
            <div class="some-div"><a style="color:#218de8">Discogram Beta</a></div>
            <div class="location" style="left:24rem"><a style="color:green">Home</a></div>
            <div class="version"><a id="version" style="color:yellow"></a></div>
            <div class="pixeles"><a style="color:#218de8">70 REM</a></div>
            <div class="location" style="left:78rem;top:10px;"><a style="color:white"><?php echo htmlspecialchars($_SESSION["username"]); ?></a></div>
            <div class="location" style="left:82rem;top:10px;"><a href="../assets/php/logout.php" style="color:red">Salir</a></div>
        </div>
        <div class="column">
            <a href="../main.php"><span id="icons" style="left:10px;top:1rem;"><i class="fa-solid fa-house"></i></span></a>
            <span id="icons" style="left:10px;top:3.5rem;"><i class="fa-solid fa-compass"></i></span>
            <a href="./admin/panel.php"><span id="icons" style="left:10px;top:6rem;"><i class="fa-solid fa-wrench"></i></span></a>
            <div class="circle">
                <span style="left:8px;top:7px;" id="icons"><i class="fa-solid fa-plus"></i></span>
            </div>
            <div class="circle-conf">
                <a href="settings.php"><span style="left:7px;top:7px;" id="icons"><i class="fa-solid fa-gear"></i></span></a>
            </div>
            <div class="circle-2">
            <a href="./cdp.php"><img id="images" style="top:5px;left:5px" src="../assets/images/bread.png"></a>
            </div>
            <div class="circle-3">
                <img id="images" style="top:5px;left:5px" src="../assets/images/mdev.png">
            </div>
        </div>
    
        <div class="column-2-2">
            <h4 style="top:1rem"><i class="fa-solid fa-circle-info"></i> Changelog</h4>
            <h4 style="top:3rem"><i class="fa-solid fa-coins"></i> Tienda</h4>
            <h3 style="top:6rem">Desarrollador</h3>
            <h4 style="top:8rem"><i class="fa-solid fa-lock"></i> Academia</h4>
            <h4 style="top:10rem"><i class="fa-solid fa-book"></i> Recursos</h4>
        </div>
        <div class="column-3">
            <div class="debug">
                <p style="left:10px;top:10px">Application Info</p>
                <p style="left:10px;top:50px">IP: <span>70.45.163.52</span></p>
                <p style="left:10px;top:70px">Version: <span id="version2"></span></p>
                <p style="left:10px;top:90px">Bus URL: <span>none</span></p>
                <p style="left:10px;top:110px">PHP Version: <span>8.2.0</span></p>
                <p style="left:10px;top:140px">Server Info</p>
                <p style="left:10px;top:160px">OS: <span>Ubuntu 20.04</span></p>
                <div class="line-debug"></div>
                <p style="left:22rem;top:10px">Database Info</p>
                <p style="left:22rem;top:50px">Database Type: <span>MySQL / phpMyAdmin</span></p>
                <p style="left:22rem;top:70px">Database Port: <span>3306</span></p>
                <p style="left:22rem;top:90px">Database: <span>discogram</span></p>
                <p style="left:22rem;top:110px">Tables: <span>3</span></p>
                <p style="left:22rem;top:170px">Ultimo Servidor: <?php echo $fila["server_id"]; ?></p>
                <div class="line-debug-2"></div>
                <p style="left:42rem;top:10px">Websocket Info</p>
                <p style="left:42rem;top:50px">Node Version: <span>16.19.1</span></p>
                <p style="left:42rem;top:70px">Buses: <span>1</span></p>
                <p style="left:42rem;top:140px">Buses URL's</p>
                <p style="left:42rem;top:160px"><span>none</span></p>
                <p style="left:42rem;top:180px"><span>none</span></p>
            </div>
            <div class="abajo">
            <h2>Bases de Datos</h2>
            <h3 style="margin:0;">El Culto del Pan</h3>
            <p style="margin:0;">Al hacer click en el boton, todos los mensajes en la base<br>de datos del grupo "El Culto del Pan" seran eliminados.</p>
            <br>
            <a href="../assets/php/db-reset-cdp.php"><button class="btn-db">Reiniciar DB</button></a>
</div>
        </div>
    <script src="../version.js"></script>
    <script src="https://kit.fontawesome.com/c27ee28938.js" crossorigin="anonymous"></script>
</body>

</html>

<!--        <div class="column-vertical"></div>-->
<!--            <label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>-->