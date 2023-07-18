function updateStatus(newStatus) {
    // Crear una solicitud AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./assets/php/update_status.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Enviar los datos del formulario
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            // Actualizar la página o realizar cualquier otra acción después de la actualización del estado
            location.reload(); // Recargar la página para reflejar el cambio en el estado
        }
    };

    // Enviar los datos del formulario como parámetros
    xhr.send("newStatus=" + newStatus);
}