<?php
  session_start();
  require('config.php');
  require_once('helpers/string.php');
  require_once('classes/database.php');
  
  $db = new Database();
  
  
  $r = array();
  $r['status'] = 0;
  $r['msg'] = '';
  
  if(isset($_GET['u']) && isset($_GET['p']))
  {
    $username = sanitize($_GET['u'], false, true);
    $password = sanitize($_GET['p']);
    $sql = 'select * from users where email = "' .$username . '" limit 1';
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
  }
  
  if(isset($_GET['users']) && isset($_SESSION['apiuser']))
  {
    $sql = 'select id, name, facebook_id, role_id, created  from users';
    $users = array();
    $result = $db->query($sql);
    while ($row = $result->fetch_assoc()) {
      array_push($users, $row);
    }
    $r['status'] = 1;
    $r['msg'] = 'ok';
    $r['result'] = $users;
  } else {    
    if(isset($row['password']))
    {
      if(password_verify($password, $row['password']))
      { 
        $_SESSION['apiuser'] = 1;
        $r['status'] = 1;
        $r['msg'] = 'ok';
      } else {
        $r['status'] = -1;
        $r['msg'] = 'Invalid credentials';
      }
    } else {
      $r['status'] = -1;
      $r['msg'] = 'Error';
    }
  }
  header('Content-Type: application/json');
  echo json_encode($r);