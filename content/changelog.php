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

<?php include('../assets/php/components/head-content.php');?>

<body>
        <div class="column-vertical">
            <img style="width:50px;" src="../assets/images/logo.png"> 
            <input placeholder="Buscar">
            <div class="some-div"><a style="color:#218de8">Discogram Beta</a></div>
            <div class="version"><a id="version" style="color:yellow"></a></div>
            <div class="pixeles">Logged in as: <?php echo htmlspecialchars($_SESSION["username"]); ?></div>
            <div class="ping"></div>
            <div class="location" style="left:43rem;top:12px;"><a style="color:#218de8"><i class="fa-solid fa-circle-info" onclick="infoOpen();"></i></a></div>
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
            <a href="./changelog.php"><h4 style="top:1rem"><i class="fa-solid fa-circle-info"></i> Changelog</h4></a>
            <h4 style="top:3rem"><i class="fa-solid fa-coins"></i> Tienda</h4>
            <h3 style="top:5rem">Desarrollador</h3>
            <h4 style="top:7rem"><i class="fa-solid fa-lock"></i> Academia</h4>
            <h4 style="top:9rem"><i class="fa-solid fa-book"></i> Recursos</h4>
        </div>
        <div class="column-3">
            <h2 style="padding-left:15px;padding-top:10px;">Changelog</h2>
            <p style="padding-left:15px;">Última actualización: <span style="color:yellow">16/7/2023 - <a id="version2" style="color:yellow"></a></span></p>
            <p style="padding-left:15px;">- Se cambio la estetica de la top navbar
            <br>
            - Se removio "Discogram Gold"
            <br>
            - Se agrego el grupo "El Rincon Depresivo"
            <br>
            - Se removio codigo javascript de "main.php" y se movieron a la carpeta "javascript"
            <br>
            - Se agrego la latencia a la top navbar
            <br>
            - Se removio la carpeta "test"
            </p>
        </div>
    <script src="../version.js"></script>
    <script src="https://kit.fontawesome.com/c27ee28938.js" crossorigin="anonymous"></script>
</body>

<script>
    function getLatency() {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var latency = xhr.responseText;
                document.querySelector('.ping').innerHTML = 'Ping: ' + latency + ' ms';
            }
        };
        xhr.open('GET', '../assets/php/ping.php', true);
        xhr.send();
    }

    // Llamar a getLatency() una vez para mostrar la latencia al cargar la página
    getLatency();

    // Actualizar la latencia cada 5 segundos
    setInterval(getLatency, 5000); // 5000 milisegundos = 5 segundos
</script>

</html>

<!--        <div class="column-vertical"></div>-->
<!--            <label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>-->