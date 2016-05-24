<?php
  if(!isset($_REQUEST['id']))
  {
    die('unauthorized');
  } else {
    session_start();
    if(!isset($_SESSION['user']))
    {
      header('Location: ../login.php');
      exit;
    }
    $user = $_SESSION['user'];
    if($user->role_id != 3)
    {
      die('You don\'t have access to this area.');
    }
    
    require('../config.php');
    require_once('../helpers/string.php');
    require_once('../classes/form_security.php');
    require_once('../classes/database.php');
    
    $formSecurity = new formSecurity();
    $db = new Database();
    if(isset($_POST['send']))
    {
      if(!isset($_POST['securitytoken']) || !$formSecurity->validate($_POST['securitytoken']) )
      {
        $eid = uniqid();
        error_log(date('Y-m-d H:i:s') . ' ' . $eid .' ' . __FILE__ . ' No security token found or invalid', 3, '../logs/critical.log');
        die('Error' . $eid);
      }
    
      $sql = 'update users set role_id = 3, password = "' . password_hash(sanitize($_POST['p']), CRYPT_BLOWFISH). '" where id=' . intval($_POST['id']) . ' limit 1';
      $result = $db->query($sql);
      if($result)
      {
        header('Location: index.php');
      } else {
       $eid = uniqid();
       error_log(date('Y-m-d H:i:s') . ' ' . $eid . ' ' . __FILE__ . ' Cannot set admin password: ' . $db->dbo->error, 3, '../logs/critical.log');
       die('Error ' . $eid);
      }
    }
  ?><!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Administration</title>
  <link rel="stylesheet" href="../css/main.css" type="text/css">
</head>

<body>
  <div class="container">
    <form action="" enctype="multipart/form-data" method="post">
      <input type="hidden" name="securitytoken" value="<?php echo $formSecurity->outputKey(); ?>">
      <input type="hidden" name="send" value="1">
      <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">
      <div class="form-group mb-lg">
        <label class="control-label col-sm-4">Enter new password</label>
        <div class="col-sm-8">
          <input class="form-control" type="password" name="p">
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="text-right mt-lg">
        <input type="submit" class="btn btn-primary" value="Upgrade">
      </div>
    </form>
  </div>
</body>
<?
  }
?>