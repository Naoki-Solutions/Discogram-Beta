function getLatency() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var latency = xhr.responseText;
            document.querySelector('.ping').innerHTML = 'Ping: ' + latency + ' ms';
        }
    };
    xhr.open('GET', './assets/php/ping.php', true);
    xhr.send();
}

// Llamar a getLatency() una vez para mostrar la latencia al cargar la página
getLatency();

// Actualizar la latencia cada 5 segundos
setInterval(getLatency, 5000); // 5000 milisegundos = 5 segundos