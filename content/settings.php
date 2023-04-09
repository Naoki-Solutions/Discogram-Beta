<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/switches.css">
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
            <span id="icons" style="left:10px;top:6rem;"><i class="fa-solid fa-wrench"></i></span>
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
            <h4 style="top:1rem"><i class="fa-solid fa-circle-info"></i> Ajustes de Cuenta</h4>
            <h4 style="top:3rem"><i class="fa-solid fa-money-bill"></i> Facturacion</h4>
            <h4 style="top:5rem"><i class="fa-solid fa-image"></i> Apariencia</h4>
            <h4 style="top:7rem"><i class="fa-solid fa-book"></i> Recursos</h4>
            <h4 style="top:9rem"><i class="fa-solid fa-wrench"></i> Herramientas</h4>
            <h4 style="top:15rem"><i class="fa-solid fa-bug"></i> App Info</h4>
            <h4 style="top:17rem"><i class="fa-solid fa-terminal"></i> Desarrolladores</h4>
            <h4 style="top:19rem"><i class="fa-solid fa-book"></i> Terminos de Servicio</h4>
            <h4 style="top:21rem"><i class="fa-solid fa-book"></i> Politica de Privacidad</h4>
        </div>
        <div class="column-3">
            <h2 style="padding-left:15px;padding-top:10px;">Ajustes / Settings</h2>
            <br>
            <h3 style="padding-left:15px;margin:1px;">Debug Panel</h3>
            <p style="padding-left:15px;">Aqui, podras observar el panel de depuracion de Discogram.<br>Podras encontrar informacion del Back-End.</p>
            <a href="debug.php"><button class="btn-debug" style="left:15px">Ir al Panel de Depuracion</button></a>
            <br>
            <br>
            <br>
            <h3 style="padding-left:15px;margin:1px;">Cambiar foto de perfil (pfp)</h3>
            <p style="padding-left:15px;">Aqui, podras cambiar tu foto de perfil.<br>La imagen que subas no puede violar nuestros Terminos y Condiciones</p>
            <input style="left:8.5rem;" id="btn-input" type="file" name="nueva_imagen"><br><br>
		    <input style="top:21.7rem;left:1rem;" id="btn-input" type="submit" value="Guardar cambios">
            <br>
            <br>
            <br>
            <h3 style="padding-left:15px;margin:0">Cerrar Sesion</h3>
            <p style="padding-left:15px;">Aqui podras cerrar la sesion y salir de tu cuenta.</p>
            <a href="../assets/php/logout.php"><button class="btn-debug" style="left:15px">Cerrar Sesion</button></a>
            <h2 style="color:red;padding-left:15px;padding-top:50px;margin:0">Zona de Peligro</h2>
            <p style="position:absolute;left:55rem;top:34rem;">Coded with ❣️ by Keyder<br> Copyright (c) 2023 NeticsSH<br>Version <span id="version2"></span></p>
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