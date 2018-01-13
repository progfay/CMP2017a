var deliver_id = '106181530309155396493';

function renderButton() {
    gapi.signin2.render('gSignIn', {
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccess
    });
}

function onSuccess(googleUser) {
    gapi.client.load('plus', 'v1', function() {
        var request = gapi.client.plus.people.get({ 'userId': 'me' });
        request.execute(function(resp) {
            location.replace((resp.id == deliver_id ? '../page/deliver.html' : '../page/receiver.html') + location.search.substring(0, location.search.length));
        });
    });
}