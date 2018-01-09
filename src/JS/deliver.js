var webmo;
var isOpen = false;
var isMove = false;
var dealID;

function getReceiverID() {
    var query = location.search.substring(1, location.search.length).match(/receiver_id=(\d){4}/);
    return query ? (query[0] ? query[0].toString().split('=')[1] : null) : null;
}

function getHostName() {
    var query = location.search.substring(1, location.search.length).match(/hostName=[^&]*/);
    return query ? (query[0] ? query[0].toString().split('=')[1] : null) : null;
}

function unlock() {
    var receiverID = getReceiverID();
    if (!receiverID) {
        console.log('WARNING: URLにreceiverIDが設定されていません');
        return false;
    }
    var first = document.getElementById("first");
    var second = document.getElementById("second");
    var third = document.getElementById("third");
    if (first.value.length != 4 || second.value.length != 4 || third.value.length != 4) {
        console.log('WARNING: 送り状番号は、各ブロックが半角数字4文字で構成される必要があります');
        return false;
    }
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/getReceiverFromDeal.php?id=' + first.value + '' + second.value + '' + third.value);
    xhr.onload = (e) => {
        if (xhr.responseText != receiverID) {
            alert("ERROR: invalid ID");
            return false;
        }
        document.getElementById("open").style.display = "inline-block";
        document.getElementById("close").style.display = "inline-block";
        document.getElementById("done").style.display = "inline-block";
        first.disabled = true;
        second.disabled = true;
        third.disabled = true;

        webmo = new Webmo.ws(getHostName());
        console.log(getHostName());
        webmo.onopen = () => { open_box() };
    };
    xhr.send(null);
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

function done() {
    if (isOpen || isMove) {
        alert("ポストが閉じてから操作を行ってください");
    }
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/done.php?deal_id=' + first.value + '' + second.value + '' + third.value);
    xhr.onload = (e) => {
        console.log(xhr.responseText);
    }
    xhr.send(null);
}