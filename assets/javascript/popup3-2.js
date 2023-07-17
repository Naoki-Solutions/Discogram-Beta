const infoWindow = document.querySelector('.infoWindow');
const header = infoWindow.querySelector('label');

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