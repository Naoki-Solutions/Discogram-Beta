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
<style>
        .message-item {
            margin-bottom: 16px; /* Ajusta el valor segÃºn la cantidad de espacio que deseas entre mensajes */
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
    
        <div class="column-2">
            <h4 style="top:10px;left:20px;margin:0">🍞 El Culto del Pan <i class="fa-solid fa-chevron-down"></i></h4>
            <div class="line"></div>
            <div class="channels">
            <h4 style="font-size:13px;font-weight:200"><i style="font-size:13px;" class="fa-solid fa-chevron-down"></i> Social</h4>
            <a href="./cdp-general.php"><h4 style="padding-left:11px;font-weight:200"><i class="fa-solid fa-hashtag"></i> General</h4></a>
            <h4 style="padding-left:11px;font-weight:200"><i class="fa-solid fa-image"></i> Memes</h4>
            <h4 style="padding-left:11px;font-weight:200"><i class="fa-solid fa-volume-high"></i> Audio</h4>
            <h4 style="font-size:13px;font-weight:200"><i style="font-size:13px;" class="fa-solid fa-chevron-down"></i> NeticsSH</h4>
            <h4 style="padding-left:11px;font-weight:200">📢 Announcements</h4>
            <h4 style="padding-left:11px;font-weight:200">💡 Suggestions</h4>
            <h4 style="padding-left:11px;font-weight:200">🪲 Bug report</h4>
            <h4 style="font-size:13px;font-weight:200"><i style="font-size:13px;" class="fa-solid fa-chevron-down"></i> Etc</h4>
            <a href="./cdp-console.php"><h4 style="padding-left:11px;font-weight:200"><i class="fa-solid fa-terminal"></i> Console</h4></a>
        </div>
        </div>
<div class="column-3">
        <!-- <div class="display-messages" id="messages"></div>
        <input type="text" id="messageBox" placeholder="Enviar un mensaje a #general" required>
        <button id="send"></button> -->
        <?php include '../assets/php/show_messages.php' ?>
</div>
<div class="controls">
<form action="../assets/php/submit_message.php" method="post">
  <input type="text" id="message" name="message" placeholder="Enviar un mensaje a #General" required/>

</form>
    </div>
    <script src="../version.js"></script>
    <script src="https://kit.fontawesome.com/c27ee28938.js" crossorigin="anonymous"></script>
    <script src="../version.js"></script>
    <script src="../assets/javascript/websocket.js"></script>
    <script>const username = '<?php echo htmlspecialchars($_SESSION["username"]); ?>'
    </script>
</body>
</html>

