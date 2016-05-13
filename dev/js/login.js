// initialize and setup facebook js sdk
    window.fbAsyncInit = function() {
        FB.init({
          appId      : window.location.hostname === 'localhost' ? '1709947152606722' : '1708614869406617',
          cookie     : true,
          xfbml      : true,
          version    : 'v2.6'
        });
        FB.getLoginStatus(function(response) {
          if (response.status === 'connected') {
            document.getElementById('status').innerHTML = 'You are connected.';
            document.getElementById('btnLogin').style.visibility = 'hidden';
            sendInfo();
          } else if (response.status === 'not_authorized') {
            document.getElementById('status').innerHTML = 'You are not logged in.'
          } else {
            document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
          }
        });
    };
    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    
    // login with facebook with extra permissions
    function login() {
      FB.login(function(response) {
        if (response.status === 'connected') {
            document.getElementById('status').innerHTML = 'You are connected.';
            document.getElementById('btnLogin').style.visibility = 'hidden';
            sendInfo();
          } else if (response.status === 'not_authorized') {
            document.getElementById('status').innerHTML = 'You are not logged in.'
          } else {
            document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
          }
      }, {scope: 'email'});

    };
    
    function sendInfo() {
      FB.api('/me', 'GET', {fields: 'first_name,last_name,name,id,email'}, function(response) {
        window.location="login.php?fbid="+response.id+"&name="+response.name+"&email="+response.email;
        //document.getElementById('status').innerHTML = response.id + ' '+ response.email + ' '+ response.name;
      });
    };

    // getting basic user info
    function getInfo() {
      FB.api('/me', 'GET', {fields: 'first_name,last_name,name,id,email'}, function(response) {
        document.getElementById('status').innerHTML = response.id + ' '+ response.email + ' '+ response.name;
      });
    };
//# sourceMappingURL=login.js.map