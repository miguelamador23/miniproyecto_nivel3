const TWITTER_CONSUMER_KEY = 'jyNKhqqgGPyWOQDxY1aYWyiWx';
const TWITTER_CONSUMER_SECRET = 'eAHd8Aw9lPhry1SielADdcMpjeTKMHonzR2IsGJqZAYrrneIYM';

function initializeTwitterSDK() {
  return new Promise((resolve, reject) => {
    if (window.twttr && typeof window.twttr.init === 'function') {
      window.twttr.init({
        consumerKey: TWITTER_CONSUMER_KEY,
        consumerSecret: TWITTER_CONSUMER_SECRET,
        callback: () => resolve(window.twttr),
        onError: reject,
      });
    } else {
      reject(new Error('Twitter SDK not loaded'));
    }
  });
}

function createTwitterLoginButton() {
  const container = document.getElementById('twitter-login-container');
  if (!container) {
    console.error('Element with id "twitter-login-container" not found.');
    return;
  }

  const twitterButton = document.createElement('a');
  twitterButton.href = '#';
  twitterButton.className = 'circle-button twitter';
  twitterButton.textContent = 'Login with Twitter';

  twitterButton.addEventListener('click', () => {
    console.log('Login with Twitter clicked');
  });

  container.appendChild(twitterButton);
}


document.addEventListener('DOMContentLoaded', function () {
  initializeTwitterSDK()
    .then(createTwitterLoginButton)
    .catch((error) => console.error('Error loading Twitter SDK:', error));
});
