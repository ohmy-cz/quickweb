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
    $sql = 'select id, name, role_id from users where facebook_id="' . $fbid . '" limit 1';
    $db = new Database();
    if($user = $db->query($sql)->fetch_object())
    {
      // if a User exists already, log them in
      $_SESSION['user'] = $user;
      if(intval($user->role_id) == 3)
      {
        // User role - admin
        header('Location: admin/index.php');
        exit;
      }
    } else {
      // create a user which does not exist.
      $sql = 'insert into users (facebook_id, name, email, created) values ("' . $fbid . '", "' . sanitize(urldecode($_GET['name']), true, true, true, true) . '", "' . sanitize(urldecode($_GET['email']), false, true) . '", "'. date('Y-m-d H:i:s').'")';
      if($db->query($sql))
      {
        // Now the user has been created, so we can fetch him as an object and proceed.
        $sql = 'select id, name from users where facebook_id="' . $fbid . '" limit 1';
        $user = $db->query($sql)->fetch_object();
        $_SESSION['user'] = $user;
      } else {
        $eid = uniqid();
        error_log(date('Y-m-d H:i:s') . ' ' . $eid .' ' . __FILE__ . ' Could not create a new user', 3, 'logs/critical.log');
        die('Error ' . $eid);
      }
    }
    // redirect to the next step.
    if(isset($_GET['gotoaccount']))
    {
      header('Location: account.php');
    } else {
      header('Location: pagemeta.php');
    }
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
    <div class="container">
      <h1>
        Please log in with Facebook
      </h1>
      <p>
        This is required so we can verify that you are a real person. It also helps us keep your private data safe.
      </p>
      <button onclick="login()" type="button" class="btn btn-primary btn-block" id="btnLogin" >Login</button>

      <div id="status"></div>
      <br><br><br><br>
      <a href="doc/web_application_security_policy.pdf">Security policy</a>
    </div>
    <script src="js/common.js"></script>
    <script src="js/login.js"></script>
  </body>
  
</html>