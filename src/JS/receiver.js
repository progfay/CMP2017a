const hostName = "192.168.42.1";
var webmo = new Webmo.ws(getHostName());
var isOpen = false;
var isMove = false;

function getHostName() {
    var query = location.search.substring(1, location.search.length).match(/HostName=[^&]*/);
    return query ? (query[0] ? query[0].toString().split('=')[1] : null) : null;
}

function open_box() {
    if (isOpen || isMove) return;
    webmo.rotate(360);
    isOpen = true;
    isMove = true;
    setTimeout(() => { stop_webmo() }, 5000);
}

function close_box() {
    if (!isOpen || isMove) return;
    webmo.rotate(-360);
    isOpen = false;
    isMove = true;
    setTimeout(() => { stop_webmo() }, 4950);
}

function stop_webmo() {
    webmo.stop();
    isMove = false;
}