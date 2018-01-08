var google_login_status = false;

function receiverID() {
    var query = location.search.substring(1, location.search.length).match(/receiver_id=(\d){12}/)[0];
    return query ? query.toString().split('=')[1] : null;
}

function renderButton() {
    gapi.signin2.render('gSignIn', {
        'theme': 'dark',
        'longtitle': true,
        'onsuccess': (googleUser) => { google_login_status = true }
    });
}

function unlock() {
    if (!google_login_status) {
        console.log('ERROR: google認証をしてください');
        return false;
    }
    var receiverID = receiverID();
    if (!receiverID) {
        console.log('URLにreceiverIDが設定されていません');
        return false;
    }
    var first = str(document.getElementById("first").value);
    var second = str(document.getElementById("second").value);
    var third = str(document.getElementById("third").value);
    if (first.length != 4 || second.length != 4 || third.length != 4) {
        console.log('送り状番号は、各ブロックが半角数字4文字で構成される必要があります');
        return false;
    }
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/getReceiverFromDeal.php?id=' + first + second + third);
    xhr.onload = (e) => { return xhr.responseText == receiverID };
}