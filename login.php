<?php
  session_start();
  // todo: facebook login here
  // https://developers.facebook.com/docs/facebook-login/web
  
  require('config.php');
  require_once('helpers/string.php');
  require_once('classes/database.php');
  if(isset($_GET['fbid']))
  {
    $fbid = sanitize($_GET['fbid']);
    $sql = 'select * from users where facebook_id="' . $fbid . '"';
    $db = new Database();
    $user = $db->query($sql)->fetch_object();
    print_r($user);
    die();
  }
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/main.css" type="text/css">
  </head>
  
  <body>
    <h1>
      Please log in with Facebook
    </h1>
    <p>
      This is required so we can verify that you are a real person. It also helps us keep your private data safe.
    </p>
    <button type="button" class="btn btn-primary btn-block" id="btnLogin">Login (simulation)</a>
    <script src="js/common.js"></script>
    <script src="js/login.js"></script>
  </body>
</html>