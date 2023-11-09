window.fbAsyncInit = function() {
    FB.init({
      appId: '269211836107062',
      autoLogAppEvents: true,
      xfbml: true,
      version: 'v10.0'
    });
  };
  
  function loginWithFacebook() {
    FB.login(function(response) {
      if (response.authResponse) {
        console.log('Acceso concedido:', response);
      } else {
        console.log('Acceso denegado o cancelado.');
      }
    }, { scope: 'email' });
  };