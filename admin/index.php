<?php
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
  
  $db = new Database();
  $formSecurity = new formSecurity();
  
  $sql = 'select * from user_roles';
  $user_roles = array();
  $result = $db->query($sql);
  while ($row = $result->fetch_assoc()) {
    array_push($user_roles, $row);
  }
?><!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Administration</title>
  <link rel="stylesheet" href="../css/main.css" type="text/css">
</head>

<body>
  <input type="hidden" id="securitytoken" value="<?php echo $formSecurity->outputKey(); ?>">
  <div class="container">
    <h1 class="pull-left">
      User and site database
    </h1>
    <p class="pull-right mt-lg">
      Name: <strong><?php echo $user->name; ?></strong>
      <a href="#" id="logout" class="btn btn-default btn-xs"><i class="fa fa-sign-out"></i> Log out</a>
    </p>
    <div class="clearfix"></div>
    <div class="mt-lg text-center">
      <input type="checkbox" id="hideDeleted"> <b>Hide deleted</b>
    </div>
    <table class="table table-responsive mt-lg" id="users">
      <thead>
        <tr>
          <th>
            User ID
          </th>
          <th>
            User name
          </th>
          <th>
            Facebook profile
          </th>
          <th>
            Email
          </th>
          <th>
            Role
          </th>
          <th>
            Site(s)
          </th>
          <th>
            Delete
          </th>
        </tr>
      </thead>
      <tbody>
        <?php
          $sql = 'select * from users';
          $users = $db->query($sql);
          
          while($platformUser = $users->fetch_object())
          {
            $sql = 'select * from sites where owner="' . intval($platformUser->id) . '"';
            $sites = $db->query($sql);
            ?>
              <tr data-deleted="<?php echo $platformUser->deleted ? 'true' : 'false'; ?>">
                <td>
                  <?php echo $platformUser->id; ?>
                </td>
                <td>
                  <?php echo $platformUser->name; ?>
                </td>
                <td>
                  <a href="http://www.facebook.com/<?php echo $platformUser->facebook_id; ?>" target="_blank"><?php echo $platformUser->facebook_id; ?></a>
                </td>
                <td>
                  <?php echo $platformUser->email; ?>
                </td>
                <td>
                  <?php 
                    foreach($user_roles as $user_role)
                    {
                      if($user_role['id'] == $platformUser->role_id)
                      {
                        echo $user_role['name'];
                        if($user_role['deleted'])
                        {
                          echo ' <i>(Deleted)</i>';
                        }
                        break;
                      }
                    }
                  ?>
                </td>
                <td>
                  <?php 
                    if($sites->num_rows == 0)
                    {
                      ?><i>No sites found</i><?php
                    } else {
                      ?><ul><?php 
                        while($site = $users->fetch_object())
                        {
                          ?>
                            <li><a href="#"><?php echo $site->name . ($site->deleted ? ' <i>(Deleted)</i>' : ''); ?></a></li>
                          <?
                        }
                      ?></ul><?php
                    }
                  ?>
                </td>
                <td>
                  <?php 
                    if($platformUser->deleted)
                    {
                      ?><i>Deleted</i><?php
                    } else {
                      ?><a class="btn btn-default deleteuser" data-id="<?php echo $platformUser->id; ?>"><i class="fa fa-trash"></i> Delete</a><?php
                    }
                  ?>
                </td>
              </tr>
            <?php
          }
          
          
        ?>
      </tbody>
    </table>
    <script src="../js/common.js"></script>
    <script src="js/admin.js"></script>
  </div>
</body>
</html>