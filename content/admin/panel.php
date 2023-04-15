<?php
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../../login.php");
    exit;
}

include('../../assets/php/config.php');

$usuario = $_SESSION["username"];

$resultado = mysqli_query($conn, "SELECT * FROM users WHERE username = '$usuario'");

// Extrae el resultado de la consulta
$usuario = mysqli_fetch_array($resultado);

// Verifica si la columna "admin" es false o null
if ($usuario["admin"] == false || $usuario["admin"] == null) {
    // Redirecciona al usuario a una página de acceso denegado
    header("Location: ../../assets/error/error.php");
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
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/debug.css">
    <title>Discogram Beta</title>
</head>

<body>
        <div class="column-vertical">
            <img style="width:50px;" src="../../assets/images/logo.png"> 
            <input placeholder="Buscar">
            <div class="some-div"><a style="color:#218de8">Discogram Beta</a></div>
            <div class="location" style="left:24rem"><a style="color:green">Panel</a></div>
            <div class="version"><a id="version" style="color:yellow"></a></div>
            <div class="pixeles"><a style="color:#218de8">70 REM</a></div>
            <div class="location" style="left:78rem;top:10px;"><a style="color:white"><?php echo htmlspecialchars($_SESSION["username"]); ?></a></div>
            <div class="location" style="left:82rem;top:10px;"><a href="../../assets/php/logout.php" style="color:red">Salir</a></div>
        </div>
        <div class="column">
            <a href="../../main.php"><span id="icons" style="left:10px;top:1rem;"><i class="fa-solid fa-house"></i></span></a>
            <span id="icons" style="left:10px;top:3.5rem;"><i class="fa-solid fa-compass"></i></span>
            <a href="./panel.php"><span id="icons" style="left:10px;top:6rem;"><i class="fa-solid fa-wrench"></i></span></a>
            <div class="circle">
                <span style="left:8px;top:7px;" id="icons"><i class="fa-solid fa-plus"></i></span>
            </div>
            <div class="circle-conf">
                <a href="settings.php"><span style="left:7px;top:7px;" id="icons"><i class="fa-solid fa-gear"></i></span></a>
            </div>
            <div class="circle-2">
            <a href="./cdp.php"><img id="images" style="top:5px;left:5px" src="../../assets/images/bread.png"></a>
            </div>
            <div class="circle-3">
                <img id="images" style="top:5px;left:5px" src="../../assets/images/mdev.png">
            </div>
        </div>
<div class="column-2-2">

<a href="./panel-users.php"><h4 style="top:1rem"><i class="fa-solid fa-user"></i> Users Settings</h4></a>
            <a href="./panel-databases.php"><h4 style="top:3rem"><i class="fa-solid fa-database"></i> Database Settings</h4></a>
            <h4 style="top:5rem"><i class="fa-solid fa-coins"></i> Tienda</h4>
            <h3 style="top:7rem">Desarrollador</h3>
            <h4 style="top:9rem"><i class="fa-solid fa-lock"></i> Academia</h4>
            <h4 style="top:11rem"><i class="fa-solid fa-book"></i> Recursos</h4>

</div>
        <div class="column-3">
            <h2 style="padding-left:15px;">Admin Panel</h2>
            <p style="padding-left:15px;">Logged in as: <?php echo htmlspecialchars($_SESSION["username"]); ?><br>Admin: <span style="color:green">true</span><br>Fecha: <?php echo date("Y/d/m"); ?></p>
        </div>
    <script src="../../version.js"></script>
    <script src="https://kit.fontawesome.com/c27ee28938.js" crossorigin="anonymous"></script>
</body>

</html>

<!--        <div class="column-vertical"></div>-->
<!--            <label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>-->