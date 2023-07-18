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

// ...

$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();

$status = $row["status"]; // Obtener el valor de la columna "status" desde la tabla "users"

// ...


if ($status == "online") {
    $statusImage = "./assets/status/online.png";
} elseif ($status == "idle") {
    $statusImage = "./assets/status/idle.png";
} elseif ($status == "dnd") {
    $statusImage = "./assets/status/dnd.png";
} else {
    $statusImage = "./assets/status/offline.png"; // Puedes proporcionar una imagen para cuando el estado no sea "online", "idle" o "dnd"
}



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
            <div class="version"><a id="version" style="color:yellow"></a></div>
            <div class="pixeles">Logged in as: <?php echo htmlspecialchars($_SESSION["username"]); ?></div>
            <div class="ping"></div>
            <div class="location" style="left:43rem;top:12px;"><a style="color:#218de8"><i class="fa-solid fa-circle-info" onclick="infoOpen();"></i></a></div>
            <div class="status"><img style="width: 12px; height: 12px;" src="<?php echo $statusImage; ?>" onclick="openStatus();"></div>

        </div>
        <div class="column">
            <a href="main.php"><span id="icons" style="left:10px;top:1rem;"><i class="fa-solid fa-house"></i></span></a>
            <span id="icons" style="left:10px;top:3.5rem;"><i class="fa-solid fa-compass"></i></span>
            <a href="./content/admin/panel.php"><span id="icons" style="left:10px;top:6rem;"><i class="fa-solid fa-wrench"></i></span></a>
            <div class="circle">
            <span style="left:8px;top:7px;" id="icons"><i class="fa-solid fa-plus" onclick="openWindow();"></i></span>
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
    
<?php include('./assets/php/components/2-2.php') ?>
        <div class="column-3">

        <div class="card">
            <img id="banner" src="./assets/images/breadbanner.jpg">
            <div class="square"><img id="imgbread" src="./assets/images/bread2.png"></div>
            <img id="verified-img-card" src="./assets/images/verified.png">
            <h4 id="card-text-id">El Culto del Pan</h4>
            <p id="card-p-id">En este grupo alabamos el pan,<br>¿Porque? ¯\_(ツ)_/¯</p>
            <span id="span-members"><img id="gray-dot-img" src="./assets/images/gray-dot.png"> 0 miembros</span><a><span id="span-entrar">Entrar</span></a>
        </div>

        <div class="card2">
        <img id="banner" src="./assets/images/room.jpeg">
            <div class="square2"><img id="imgbread" src="./assets/images/brain.jpeg"></div>
            <img id="verified-img-card" src="./assets/images/verified.png">
            <h4 id="card-text-id">El Rincon Depresivo</h4>
            <p id="card-p-id">Solo entra y desahogate.</p>
            <span id="span-members"><img id="gray-dot-img" src="./assets/images/gray-dot.png"> 0 miembros</span><span id="span-members"><img id="gray-dot-img" src="./assets/images/gray-dot.png"> 0 miembros</span><a><span id="span-entrar">Entrar</span></a>
        </div>
        <div id="status-div" class="status-div">
        <span class="close"><i onclick="closeStatus()" style="background-color:red;" class="fa-solid fa-xmark"></i></span>
        <p style="font-size:15px;margin-left:5px" onclick="updateStatus('online')"><img style="width: 12px; height: 12px;" src="assets/status/online.png"> En linea</p>
        <p style="font-size:15px;margin-left:5px" onclick="updateStatus('idle')"><img style="width: 12px; height: 12px;" src="assets/status/idle.png"> Ausente</p>
        <p style="font-size:15px;margin-left:5px" onclick="updateStatus('dnd')"><img style="width: 12px; height: 12px;" src="assets/status/dnd.png"> No molestar</p>
        </div>
    

    <div id="infoWindow" class="infoWindow">
    <div id="infoWindowNav" class="infoWindowNav">
    <label><i class="fa-solid fa-cube"></i> Propiedades</label>
    <span id="minimizeInfo"><i class="fa-solid fa-window-minimize"></i></span>
    <span id="expandInfo"><i class="fa-regular fa-window-restore"></i></span>
    <span id="closeInfoX"><i class="fa-solid fa-x" onclick="infoClose()"></i></span>
  </div>

  <!-- <div class="infoWindowNavVertical"></div> -->
</div>

    <div id="popup" class="popup">
    <span class="close"><i onclick="closeWindow()" style="background-color:red;" class="fa-solid fa-xmark"></i></span>
   <h3>Unete a una comunidad</h3>
   <p>Introduce un token de invitacion para unirte a una comunidad existente</p>
    <label>Token de Invitacion</label>
   <input placeholder="Y6zk3vA87F">
   <p style="position:absolute;top:120px">Estos tokens estan compuestos de numeros y letras con un total de 10 caracteres, por ejemplo:</p>
   <!-- <button>Unirme al servidor</button>
   <a onclick="openWindow2();closeWindow()">Crear un Servidor</a> -->
   <div class="abajo-popup">
    <button>Unirse</button>
   </div>
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
<script src="./assets/javascript/popup.js"></script>
<script src="./assets/javascript/popup-2.js"></script>
<script src="./assets/javascript/popup2.js"></script>
<script src="./assets/javascript/popup2-2.js"></script>
<script src="./assets/javascript/ping.js"></script>
<script src="./assets/javascript/loader.js"></script>

<script>
    function infoOpen() {
    document.getElementById("infoWindow").style.display = "block";
}

function infoClose() {
    document.getElementById("infoWindow").style.display = "none";
}
</script>

<script>
    function openStatus() {
    document.getElementById("status-div").style.display = "block";
}

function closeStatus() {
    document.getElementById("status-div").style.display = "none";
}
</script>

<script>
    // Obtener el elemento de la ventana o div
var infoWindow = document.getElementById("infoWindow");

// Variables para almacenar la posición inicial del ratón y la ventana
var initialMouseX, initialMouseY, initialWindowX, initialWindowY;

// Función para iniciar el arrastre de la ventana
function startDragging(e) {
  // Obtener la posición inicial del ratón
  initialMouseX = e.clientX;
  initialMouseY = e.clientY;

  // Obtener la posición inicial de la ventana
  var windowRect = infoWindow.getBoundingClientRect();
  initialWindowX = windowRect.left;
  initialWindowY = windowRect.top;

  // Agregar los eventos de arrastre y soltar
  document.addEventListener("mousemove", dragWindow);
  document.addEventListener("mouseup", stopDragging);
}

// Función para arrastrar la ventana
function dragWindow(e) {
  // Calcular la cantidad de movimiento del ratón
  var deltaX = e.clientX - initialMouseX;
  var deltaY = e.clientY - initialMouseY;

  // Calcular y establecer la nueva posición de la ventana
  infoWindow.style.left = initialWindowX + deltaX + "px";
  infoWindow.style.top = initialWindowY + deltaY + "px";
}

// Función para detener el arrastre de la ventana
function stopDragging() {
  // Quitar los eventos de arrastre y soltar
  document.removeEventListener("mousemove", dragWindow);
  document.removeEventListener("mouseup", stopDragging);
}

// Agregar el evento de inicio de arrastre a la barra de navegación de la ventana
var infoWindowNav = document.getElementById("infoWindowNav");
infoWindowNav.addEventListener("mousedown", startDragging);

</script>

<script src="./assets/javascript/update_status.js"></script>



</body>
</html>
