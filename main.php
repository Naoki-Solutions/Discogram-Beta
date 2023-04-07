<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Discogram Beta</title>
</head>

<body>
        <div class="column-vertical">
            <img style="width:50px;" src="./assets/images/logo.png">
            <input placeholder="Buscar">
            <div class="some-div"><a style="color:#218de8">Discogram Beta</a></div>
            <div class="location" style="left:24rem"><a style="color:green">Home</a></div>
            <div class="version"><a id="version" style="color:yellow"></a></div>
            <div class="pixeles"><a style="color:#218de8">70 REM</a></div>
            <div class="location" style="left:78rem;top:10px;"><a style="color:white"><?php echo htmlspecialchars($_SESSION["username"]); ?></a></div>
            <div class="location" style="left:82rem;top:10px;"><a href="./assets/php/logout.php" style="color:red">Salir</a></div>
        </div>
        <div class="column">
            <a href="main.php"><span id="icons" style="left:10px;top:1rem;"><i class="fa-solid fa-house"></i></span></a>
            <span id="icons" style="left:10px;top:3.5rem;"><i class="fa-solid fa-compass"></i></span>
            <span id="icons" style="left:10px;top:6rem;"><i class="fa-solid fa-wrench"></i></span>
            <div class="circle">
                <span style="left:8px;top:7px;" id="icons"><i class="fa-solid fa-plus"></i></span>
            </div>
            <div class="circle-conf">
                <a href="./content/settings.php"><span style="left:7px;top:7px;" id="icons"><i class="fa-solid fa-gear"></i></span></a>
            </div>
            <div class="circle-2">
                <a href="./content/cdp.php"><img id="images" style="top:5px;left:5px" src="./assets/images/bread.png"></a>
            </div>
            <div class="circle-3">
                <img id="images" style="top:5px;left:5px" src="./assets/images/mdev.png">
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

        <div class="card">
            <img id="banner" src="./assets/images/breadbanner.jpg">
            <div class="square"><img id="imgbread" src="./assets/images/bread2.png"></div>
            <img id="verified-img-card" src="./assets/images/verified.png">
            <h4 id="card-text-id">El Culto del Pan</h4>
            <p id="card-p-id">En este grupo alabamos el pan,<br>¿Porque? ¯\_(ツ)_/¯</p>
            <span id="span-members"><img id="gray-dot-img" src="./assets/images/gray-dot.png"> 0 miembros</span>
        </div>

        </div>
    <script src="version.js"></script>
    <script src="https://kit.fontawesome.com/c27ee28938.js" crossorigin="anonymous"></script>
</body>

</html>

<!--        <div class="column-vertical"></div>-->