var prev = null;

function start(e) {
    e.preventDefault();
    var touch = e.originalEvent.touches[0];
    prev = {
        x: touch.pageX,
        y: touch.pageY
    };
}

function move(e) {
    e.preventDefault();
    if (prev) {
        var touch = e.originalEvent.touches[0];
        var ctx = $("#canvas").get(0).getContext("2d");
        ctx.lineWidth = 3;
        ctx.beginPath();
        ctx.moveTo(prev.x - 50, prev.y - 50);
        ctx.lineTo(touch.pageX - 50, touch.pageY - 50);
        ctx.stroke();
        prev = {
            x: touch.pageX,
            y: touch.pageY
        };
    }
}

function end(e) {
    e.preventDefault();
    prev = null;
}

$(function() {
    $("#canvas").bind("mousedown", start);
    $("#canvas").bind("mousemove", move);
    $("#canvas").bind("mouseup", end);
    $("#canvas").bind("touchstart", start);
    $("#canvas").bind("touchmove", move);
    $("#canvas").bind("touchend", end);
    $("#clear_button").click(function() {
        var ctx = $("#canvas").get(0).getContext("2d");
        ctx.clearRect(0, 0, 300, 400);
    });
});

/*
 *描画以外
 */

var query = location.search.substring(1, location.search.length).match(/deal_id=(\d){12}/);
var deal_id = query ? (query[0] ? query[0].toString().split('=')[1] : null) : null;

//canvasをbase64に
function CanvasToBase64() {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/push.php');
    xhr.onload = (e) => {
        location.href = '../sign_ok.html';
    };
    var deal_id = query ? (query[0] ? query[0].toString().split('=')[1] : "1001") : "1001";
    base64 = document.getElementsByTagName("canvas")[0].toDataURL('image/jpg');
    xhr.send("deal_id=" + deal_id + "&base64=" + base64);
}