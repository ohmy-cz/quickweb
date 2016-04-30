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
    $sql = 'select id, name from users where facebook_id="' . $fbid . '"';
    $db = new Database();
    if($user = $db->query($sql)->fetch_object())
    {
      // if a User exists already, log them in
//      print_r($user);
//      die();
      $_SESSION['user'] = $user;
    } else {
      // create a user which does not exist.
      // todo: secure this!
      $sql = 'insert into users (facebook_id, name, email, created) values ("' . $fbid . '", "' . urldecode($_GET['name']) . '", "' . urldecode($_GET['email']) . '", "'. date('Y-m-d H:i:s').'")';
      if($db->query($sql))
      {
        // Now the user has been created, so we can fetch him as an object and proceed.
        $sql = 'select id, name from users where facebook_id="' . $fbid . '"';
        $user = $db->query($sql)->fetch_object();
        $_SESSION['user'] = $user;
      } else {
        die('Could not create a new user!');
      }
    }
    // redirect tt the next step.
    header('Location: pagemeta.php');
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