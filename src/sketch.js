function setup() {
    createCanvas(300, 300);

    //background
    fill(255);
    stroke(0);
    strokeWeight(10);
    rect(0, 0, width, height);
}

function draw() {
    // Nothing
}

function mouseDragged() {
    // Draw sketch
    stroke(0);
    strokeWeight(5);
    line(mouseX, mouseY, pmouseX, pmouseY);
}

function reset() {
    //Reset background
    stroke(0);
    strokeWeight(10);
    fill(255);
    rect(0, 0, width, height);
}

function CanvasToBase64() {
    var canvas = document.getElementsByTagName("canvas");
    var base64 = canvas[0].toDataURL('image/jpg');

    // console.log(deal_id);

    // console.log(base64.replace(/^.*,/, ''));

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/push.php');
    xhr.send({
        deal_id: deal_id,
        base64: base64.replace(/^.*,/, '')
    });
}