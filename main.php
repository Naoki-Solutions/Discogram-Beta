<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// if ($_SESSION["username"] !== "keyder") {
//     header("location: ./assets/error/error.php");
//     exit;
// }

// Get the server data from the database
require_once "./assets/php/config.php";

$server_id = $_GET["server_id"];
$user_id = $_SESSION["id"];

$stmt = $conn->prepare("SELECT * FROM servers WHERE id = ? AND user_id = ?");
$stmt->bind_param("ii", $server_id, $user_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();

// If the user does not have a server with that ID, redirect to the main page

?>

<!DOCTYPE html>
<html lang="en">

<?php include('./assets/php/components/head.php');?>

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
            <span style="left:8px;top:7px;" id="icons"><i class="fa-solid fa-plus" onclick="openWindow()"></i></span>
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
    
        

    <div id="popup" class="popup">
    <span class="close"><i onclick="closeWindow()" style="background-color:red;" class="fa-solid fa-xmark"></i></span>
   <h3>Unirme a un Servidor</h3>
   <p>Deseas unirte a un servidor? Pon el codigo de este aqui abajo</p>
   <input>
   <button>Unirme al servidor</button>
   <a onclick="openWindow2();closeWindow()">Crear un Servidor</a>
</div>

<!-- <div id="popup2" class="popup2">
    <span class="close"><i onclick="closeWindow2()" style="background-color:red;" class="fa-solid fa-xmark"></i></span>
   <h3>Crear un Servidor</h3>
   <p>Para crear un servidor, debes de introducir el nombre que deseas para este en el campo de abajo</p>
   <form action="./assets/php/create-server.php" method="post">
   <input type="text" id="server_name" name="server_name" required>
   <button type="submit" name="crear_servidor">Crear Servidor</button>
</form>
</div> -->

</div>
<script src="version.js"></script>
<script src="https://kit.fontawesome.com/c27ee28938.js" crossorigin="anonymous"></script>
<script>
function openWindow() {
    document.getElementById("popup").style.display = "block";
}

function closeWindow() {
    document.getElementById("popup").style.display = "none";
}
</script>
<script>
    const popup = document.querySelector('.popup');
const header = popup.querySelector('h3');

let inicioX, inicioY, offsetX, offsetY;

function iniciarArrastre(event) {
  event.preventDefault();
  inicioX = event.clientX;
  inicioY = event.clientY;
  offsetX = inicioX - parseFloat(getComputedStyle(popup).left);
  offsetY = inicioY - parseFloat(getComputedStyle(popup).top);
  document.addEventListener('mousemove', arrastrar);
  document.addEventListener('mouseup', detenerArrastre);
}

function arrastrar(event) {
  event.preventDefault();
  popup.style.left = (event.clientX - offsetX) + 'px';
  popup.style.top = (event.clientY - offsetY) + 'px';
}

function detenerArrastre(event) {
  document.removeEventListener('mousemove', arrastrar);
  document.removeEventListener('mouseup', detenerArrastre);
}

header.addEventListener('mousedown', iniciarArrastre);

</script>

<script>
function openWindow2() {
    document.getElementById("popup2").style.display = "block";
}

function closeWindow2() {
    document.getElementById("popup2").style.display = "none";
}
</script>
<script>
    const popup = document.querySelector('.popup2');
const header = popup.querySelector('h3');

let inicioX, inicioY, offsetX, offsetY;

function iniciarArrastre(event) {
  event.preventDefault();
  inicioX = event.clientX;
  inicioY = event.clientY;
  offsetX = inicioX - parseFloat(getComputedStyle(popup).left);
  offsetY = inicioY - parseFloat(getComputedStyle(popup).top);
  document.addEventListener('mousemove', arrastrar);
  document.addEventListener('mouseup', detenerArrastre);
}

function arrastrar(event) {
  event.preventDefault();
  popup.style.left = (event.clientX - offsetX) + 'px';
  popup.style.top = (event.clientY - offsetY) + 'px';
}

function detenerArrastre(event) {
  document.removeEventListener('mousemove', arrastrar);
  document.removeEventListener('mouseup', detenerArrastre);
}

header.addEventListener('mousedown', iniciarArrastre);

</script>
</body>

</html>

<!--        <div class="column-vertical"></div>-->