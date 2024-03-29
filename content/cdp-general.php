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
<style>
    .message-item {
        margin-bottom: 16px;
        /* Ajusta el valor segÃºn la cantidad de espacio que deseas entre mensajes */
        padding-left: 25px;
    }

    .message-item span {
        position: absolute;
        left: 85px;
        font-size: 13px;
    }
 
</style>

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
        <a href="./admin/panel.php"><span id="icons" style="left:10px;top:6rem;"><i class="fa-solid fa-wrench"></i></span></a>
        <div class="circle">
            <span style="left:8px;top:7px;" id="icons"><i class="fa-solid fa-plus"></i></span>
        </div>
        <div class="circle-conf">
            <a href="settings.php"><span style="left:7px;top:7px;" id="icons"><i
                        class="fa-solid fa-gear"></i></span></a>
        </div>
        <div class="circle-2">
            <a href="./cdp.php"><img id="images" style="top:5px;left:5px" src="../assets/images/bread.png"></a>
        </div>
        <div class="circle-3">
            <img id="images" style="top:5px;left:5px" src="../assets/images/mdev.png">
        </div>
    </div>

    <div class="column-2">
        <h4 style="top:10px;left:20px;margin:0">🍞 El Culto del Pan <i class="fa-solid fa-chevron-down"></i></h4>
        <div class="line"></div>
        <div class="channels">
            <h4 style="font-size:13px;font-weight:200"><i style="font-size:13px;" class="fa-solid fa-chevron-down"></i> Importante</h4>
            <a href="./cdp-reglas.php"><h4 style="padding-left:11px;font-weight:200">📃 Reglas</h4></a>
            <h4 style="font-size:13px;font-weight:200"><i style="font-size:13px;" class="fa-solid fa-chevron-down"></i> Social</h4>
            <a href="./cdp-general.php">
                <h4 style="padding-left:11px;font-weight:200"><i class="fa-solid fa-hashtag"></i> General</h4>
            </a>
            <h4 style="padding-left:11px;font-weight:200"><i class="fa-solid fa-image"></i> Memes</h4>
            <h4 style="padding-left:11px;font-weight:200"><i class="fa-solid fa-volume-high"></i> Audio</h4>
            <h4 style="font-size:13px;font-weight:200"><i style="font-size:13px;" class="fa-solid fa-chevron-down"></i>
                NeticsSH</h4>
            <h4 style="padding-left:11px;font-weight:200">📢 Announcements</h4>
            <h4 style="padding-left:11px;font-weight:200">💡 Suggestions</h4>
            <h4 style="padding-left:11px;font-weight:200">🐛 Bug report</h4>
            <a href="https://github.com/Naoki-Solutions"><h4 style="padding-left:13px;font-weight:200"><i style="padding-left:3px" class="fa-brands fa-github"></i> Github</h4></a>
            <!-- <h4 style="font-size:13px;font-weight:200"><i style="font-size:13px;" class="fa-solid fa-chevron-down"></i> Etc</h4>
            <a href="./cdp-console.php">
                <h4 style="padding-left:11px;font-weight:200"><i class="fa-solid fa-terminal"></i> Console</h4>
            </a> -->
        </div>
    </div>
    <div class="fill-line"></div>
    <div class="column-3">
        <!-- <div class="display-messages" id="messages"></div>
        <input type="text" id="messageBox" placeholder="Enviar un mensaje a #general" required>
        <button id="send"></button> -->
        <?php include '../assets/php/show_messages.php' ?>
    </div>
    <div class="controls">
        <form action="../assets/php/submit_message.php" method="post">
            <input type="text" id="message" name="message" placeholder="Enviar un mensaje a #General" autocomplete="off" required/>
        </form>
    </div>
    <div class="column-4">
        <span>Bot ─ 1</span>
        <img id="dia" src="../assets/images/dia.png"><img id="online-wifi" src="../assets/images/online.png"><h4 style="padding-left:50px;">Hikari</h4><img id="bot" src="../assets/images/bot.png">
        <p id="dia-p">Type /help</p>
    </div>
    <script src="../version.js"></script>
    <script src="https://kit.fontawesome.com/c27ee28938.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@joeattardi/emoji-button@3.0.3/dist/index.min.js"></script>
    <script src="../version.js"></script>
<script>
window.onload = function() {
  document.getElementById("message").focus();
}
</script>
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
</body>
</html>