document.addEventListener("DOMContentLoaded", function() {
  // Agregar div negro al body al cargar la página
  var overlay = document.createElement("div");
  overlay.style.position = "fixed";
  overlay.style.top = "0";
  overlay.style.left = "0";
  overlay.style.width = "100%";
  overlay.style.height = "100%";
  overlay.style.background = "#1e1f22";
  overlay.style.opacity = "1";
  overlay.style.transition = "opacity 0.5s ease";
  document.body.appendChild(overlay);

  // Agregar contenedor para textos adicionales
  var additionalTextContainer = document.createElement("div");
  additionalTextContainer.style.fontFamily = "Arial, sans-serif";
  additionalTextContainer.style.fontSize = "18px";
  additionalTextContainer.style.position = "absolute";
  additionalTextContainer.style.top = "40%";
  additionalTextContainer.style.left = "50%";
  additionalTextContainer.style.transform = "translate(-50%, -50%)";
  overlay.appendChild(additionalTextContainer);

  // Array de textos adicionales
  var additionalTexts = [
    "[OK] Cargando CSS",
    "[OK] Iniciando conexión con MySQL",
    "[OK] Cargando información de usuario",
    "[OK] Cargando grupos",
    "[OK] Inicializando"
  ];

  // Función para mostrar los textos adicionales uno debajo del otro
  var currentIndex = 0;
  function showAdditionalText() {
    if (currentIndex < additionalTexts.length) {
      var additionalText = document.createElement("p");
      additionalText.innerHTML = additionalTexts[currentIndex];

      var regex = /\[(.*?)\]|\((.*?)\)/g;
      var matches = additionalText.innerHTML.matchAll(regex);
      var modifiedText = "";
      var lastIndex = 0;

      for (const match of matches) {
        var grayText = additionalText.innerHTML.slice(lastIndex, match.index);
        var coloredText = match[0].slice(1, -1);
        modifiedText += `<span style="color: gray;">${grayText}</span><span style="color: green;">${coloredText}</span>`;
        lastIndex = match.index + match[0].length;
      }

      var remainingText = additionalText.innerHTML.slice(lastIndex);
      modifiedText += `<span style="color: gray;">${remainingText}</span>`;

      additionalText.innerHTML = modifiedText;
      additionalTextContainer.appendChild(additionalText);
      currentIndex++;
      setTimeout(showAdditionalText, 1000);
    }
  }

  // Iniciar la secuencia de textos adicionales
  setTimeout(showAdditionalText, 1000);

  // Eliminar el div negro después de 5 segundos o al oprimir la tecla Escape
  var removeOverlay = function() {
    overlay.style.opacity = "0";
    setTimeout(function() {
      overlay.remove();
    }, 500);
  };

  setTimeout(function() {
    removeOverlay();
  }, 8000);

  // Agregar evento para quitar el div al oprimir la tecla Escape
  document.addEventListener("keydown", function(event) {
    if (event.key === "Escape") {
      removeOverlay();
    }
  });
  
  // Agregar texto de recordatorio
  var reminderText = document.createElement("p");
  reminderText.innerHTML = "Recuerda abrir Discogram en pantalla completa";
  additionalTextContainer.appendChild(reminderText);
});
