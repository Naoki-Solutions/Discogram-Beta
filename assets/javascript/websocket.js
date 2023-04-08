(function () {
    const sendBtn = document.querySelector('#send');
    const messages = document.querySelector('#messages');
    const messageBox = document.querySelector('#messageBox');
    let ws;
    function showMessage(message) {
        messages.textContent += `${username}:\n\n\n ${message}`; 
        messages.scrollTop = messages.scrollHeight;
        messageBox.value = '';
    }
    function init() {
        if (ws) {
            ws.onerror = ws.onopen = ws.onclose = null;
            ws.close();
        }
        ws = new WebSocket('ws://70.45.163.52:5200');
        ws.onopen = () => {
            console.log('Connection opened!');
        }
        ws.onmessage = ({ data }) => showMessage(data);
        ws.onclose = function () {
            ws = null;
        }
    }
    sendBtn.onclick = function () {
        if (!ws) {
            showMessage("No WebSocket connection :(");
            return;
        }
        ws.send(messageBox.value);
        showMessage(messageBox.value);
    }
    var input = document.getElementById("messageBox");
    input.addEventListener("keypress", function (event) {
        if (event.key === "Enter") {
            ws.send(messageBox.value);
            showMessage(messageBox.value);
        }
    });
    init();
})();