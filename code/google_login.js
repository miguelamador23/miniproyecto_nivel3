
const GOOGLE_CLIENT_ID = '518835172035-69mimoa3g370s1hmja1clr0k96blefmo.apps.googleusercontent.com';


function initializeGoogleSDK() {
    return new Promise((resolve, reject) => {
        gapi.load('auth2', () => {
            gapi.auth2.init({
                client_id: GOOGLE_CLIENT_ID
            })
            .then(() => {
                const auth2 = gapi.auth2.getAuthInstance();
                resolve(auth2);
            })
            .catch(reject);
        });
    });
}


function createGoogleLoginButton() {
    const googleButton = document.getElementById('google-login-button');
    if (!googleButton) {
        console.error('Element with id "google-login-button" not found.');
        return;
    }

    googleButton.addEventListener('click', () => {
        const auth2 = gapi.auth2.getAuthInstance();
        auth2.signIn()
            .then((googleUser) => {
              
                console.log('Google user:', googleUser);
            })
            .catch((error) => {
                console.error('Error signing in with Google:', error);
            });
    });
}


window.onload = function () {
    initializeGoogleSDK()
        .then(createGoogleLoginButton)
        .catch((error) => console.error('Error loading Google SDK:', error));
};
