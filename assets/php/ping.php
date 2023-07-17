<?php
    $start = microtime(true);
    // Realiza alguna operación de ping o solicitud a un servidor externo
    // Aquí puedes agregar tu código para calcular la latencia

    // Simulando una latencia de 100 ms
    usleep(100000);

    $end = microtime(true);
    $latency = round(($end - $start) * 1000); // Calcula la latencia en milisegundos
    echo $latency;
?>
