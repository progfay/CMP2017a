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

function mousePressed() {
    // Draw sketch
    fill(0);
    strokeWeight(1);
    ellipse(mouseX, mouseY, 5, 5);
}

function mouseDragged() {
    // Draw sketch
    strokeWeight(5);
    line(mouseX, mouseY, pmouseX, pmouseY);
}

function reset() {
    //Reset background
    strokeWeight(10);
    fill(255);
    rect(0, 0, width, height);
}

function CanvasToBase64() {
    var canvas = document.getElementsByTagName("canvas");
    var base64 = canvas[0].toDataURL('image/jpg');

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/push.php');
    xhr.onload = (e) => { console.log(xhr.responseText) };
    // console.log(deal_id + ' ' + base64);
    xhr.send("deal_id=" + deal_id + "&base64=" + base64);
}