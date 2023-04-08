
var d = new Date();
d = new Date(d.getTime() - 3000000);
var date_format_str = d.getFullYear().toString()+"-"+((d.getMonth()+1).toString().length==2?(d.getMonth()+1).toString():"0"+(d.getMonth()+1).toString())+"-"+(d.getDate().toString().length==2?d.getDate().toString():"0"+d.getDate().toString())+" "+(d.getHours().toString().length==2?d.getHours().toString():"0"+d.getHours().toString())+":"+((parseInt(d.getMinutes()/5)*5).toString().length==2?(parseInt(d.getMinutes()/5)*5).toString():"0"+(parseInt(d.getMinutes()/5)*5).toString())+":00";

(function () {
    const sendBtn = document.querySelector('#send');
    const messages = document.querySelector('#messages');
    const messageBox = document.querySelector('#messageBox');
    let ws;

    function showMessage(message) {
        const messageElement = document.createElement('div');
        messageElement.classList.add('message-item');
        messageElement.innerHTML = `<strong>${username}</strong><span>${date_format_str}</span><br>${message.split('\n').join('<br>')}`;
        messages.appendChild(messageElement);
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