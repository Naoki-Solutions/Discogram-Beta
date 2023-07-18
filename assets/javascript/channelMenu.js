    // Función para ocultar el popup al hacer clic fuera del mismo
    function hideChannelPopup() {
        var popup = document.getElementById('channelPopup');
        popup.style.display = 'none';
    }

    // Agrega el evento de clic derecho a todos los elementos con la clase "channel"
    var channels = document.getElementsByClassName('channel');
    for (var i = 0; i < channels.length; i++) {
        channels[i].addEventListener('contextmenu', showChannelPopup);
    }

    // Agrega el evento de clic al documento para ocultar el popup
    document.addEventListener('click', function(event) {
        var popup = document.getElementById('channelPopup');
        if (!popup.contains(event.target)) {
            hideChannelPopup();
        }
    });

        // Función para mostrar el popup al hacer clic derecho en un canal
        function showChannelPopup(event) {
            event.preventDefault(); // Evita que aparezca el menú contextual predeterminado
    
            var popup = document.getElementById('channelPopup');
            popup.style.display = 'block';
            popup.style.left = (event.clientX + 10) + 'px'; // Posición horizontal del popup
            popup.style.top = (event.clientY + 10) + 'px'; // Posición vertical del popup
        }
    
        // Agrega el evento de clic derecho a todos los elementos con la clase "channel"
        var channels = document.getElementsByClassName('channel');
        for (var i = 0; i < channels.length; i++) {
            channels[i].addEventListener('contextmenu', showChannelPopup);
        }