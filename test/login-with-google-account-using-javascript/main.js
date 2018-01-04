var userContent;

function onSuccess(googleUser) {
    if (!userContent) userContent = document.getElementById("userContent");
    var profile = googleUser.getBasicProfile();
    gapi.client.load('plus', 'v1', function() {
        var request = gapi.client.plus.people.get({
            'userId': 'me'
        });
        // Display the user details
        request.execute(function(resp) {
            userContent.innerHTML = `
            <div class="profile">
              <div class="head">Welcome ${resp.name.givenName}!
                <a href="javascript:void(0);" onclick="signOut();"> Sign out </a>
              </div>
              <img src="${resp.image.url}"/>
                <div class="proDetails">
                  <p> ${resp.displayName} </p>
                  <p> ${resp.emails[0].value} </p>
                  <p> ${resp.gender} </p>
                  <p> ${resp.id} </p>
                  <p>
                    <a href="${resp.url}"> View Google+ Profile </a>
                </p>
              </div>
            </div>
            `;
        });
    });
}

function onFailure(error) {
    alert(error);
}

function renderButton() {
    gapi.signin2.render('gSignIn', {
        'scope': 'profile email',
        'width': 240,
        'height': 50,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure
    });
}

function signOut() {
    gapi.auth2.getAuthInstance().signOut().then(() => { userContent.innerHTML = '' });
}