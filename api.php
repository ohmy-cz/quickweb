<?php
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
  
  if(isset($_GET['users']) && isset($_GET['token']))
  {
    $sql = 'select added from api_tokens where token="' . sanitize($_GET['token']) . '" and ip="' . $_SERVER['REMOTE_ADDR'] . '" limit 1';
    $result = $db->query($sql);
    if($result->num_rows > 0)
    { 
      $row = $result->fetch_assoc();
    }
    if($result->num_rows > 0 && strtotime($row['added']) < strtotime('+1 hour'))
    { 
      $sql = 'select id, name, facebook_id, role_id, created  from users';
      $users = array();
      $result = $db->query($sql);
      while ($row = $result->fetch_assoc()) {
        // json encode on the server won't accept direct mysql result array object.
        array_push($users, array(
          'id' => $row['id'],
          'name' => sanitize($row['name'], true, true, true, true),
          'facebook_id' => $row['facebook_id'],
          'role_id' => $row['role_id'],
          'created' => $row['created']
        ));
      }
      $r['status'] = 1;
      $r['msg'] = 'ok';
      $r['result'] = $users;
    } else {
      $r['status'] = -6;
      $r['msg'] = 'timeout';
    }  
  } else {    
    if(isset($row['password']))
    {
      if(password_verify($password, $row['password']))
      { 
        $token = sha1(uniqid($username, true));
        $sql = 'insert into api_tokens (token, added, ip) values ("' . $token . '", "' . date('Y-m-d H:i:s') . '", "' . $_SERVER['REMOTE_ADDR'] . '")';
        $result = $db->query($sql);
        if($result)
        {
          $r['status'] = 1;
          $r['msg'] = 'ok';
          $r['token'] = $token;
        } else {
           $eid = uniqid();
           error_log(date('Y-m-d H:i:s') . ' ' . $eid .' ' . __FILE__ . ' Could not save security token, ' . $db->dbo->error, 3, 'logs/critical.log');
           $out['msg'] = 'Error ' . $eid;
           $out['status'] = -2;
        }
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