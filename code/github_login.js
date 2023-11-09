const GITHUB_CLIENT_ID = 'ad9ec44fb45fb0604911';

function initializeGitHubSDK() {
  return new Promise((resolve, reject) => {
    const script = document.createElement('script');
    script.src = 'https://cdn.jsdelivr.net/npm/@github/auth2-client@2/dist/index.js';
    script.async = true;
    script.onload = () => {
      const authClient = new GitHubAuthClient({ clientId: GITHUB_CLIENT_ID });
      resolve(authClient);
    };
    script.onerror = reject;
    document.head.appendChild(script);
  });
}

function createGitHubLoginButton() {
  const githubButton = document.getElementById('github-login-button');
  if (!githubButton) {
    console.error('Element with id "github-login-button" not found.');
    return;
  }

  githubButton.addEventListener('click', () => {
    const authClient = new GitHubAuthClient({ clientId: GITHUB_CLIENT_ID });
    authClient.signIn()
      .then((githubUser) => {
        console.log('GitHub user:', githubUser);
      })
      .catch((error) => {
        console.error('Error signing in with GitHub:', error);
      });
  });
}

window.onload = function () {
  initializeGitHubSDK()
    .then(createGitHubLoginButton)
    .catch((error) => console.error('Error loading GitHub SDK:', error));
};
