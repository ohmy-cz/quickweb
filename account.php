<?php
  session_start();
  
  require('config.php');
  require_once('helpers/string.php');
  require_once('classes/database.php');
  if(isset($_SESSION['user']))
  {
    $user = $_SESSION['user'];
    $sql = 'select * from sites where owner="' . intval($user->id) . '" and deleted != 1';
    $db = new Database();
    $sites = $db->query($sql);
    if(!$sites)
    {
      $eid = uniqid();
      error_log(date('Y-m-d H:i:s') . ' ' . $eid .' ' . __FILE__ . ' ' . $e->getMessage(), 3, 'logs/critical.log');
      die('Error ' . $eid);
    }
  } else {
    die('Error: User not set.');
  }
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Account</title>
    <link rel="stylesheet" href="css/main.css" type="text/css">
  </head>
  
  <body>
    <div class="container">
      <h1 class="pull-left">
        Your Account
      </h1>
      <p class="pull-right mt-lg">
        Name: <strong><?php echo $user->name; ?></strong>
        <a href="#" id="logout" class="btn btn-default btn-xs"><i class="fa fa-sign-out"></i> Log out</a>
      </p>
      <div class="clearfix"></div>
      <p>
        Here you can see informations about yourself and your websites.
      </p>
        <?php
          if($sites->num_rows === 0)
          {
            ?><p><em>You have no sites!</em></p><?php
          } else {
            ?>
            <table class="table table-responsive">
              <thead>
                <tr>
                  <th>
                    Name
                  </th>
                  <th>
                    Create
                  </th>
                  <th>
                    Updated
                  </th>
                  <th>
                    Published Since
                  </th>
                  <th colspan="2">&nbsp;
                    
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php
                  while($site = $sites->fetch_object())
                  {
                    ?>
                      <tr>
                        <td>
                          <?php echo $site->name; ?>
                        </td>
                        <td>
                          <?php echo $site->created; ?>
                        </td>
                        <td>
                          <?php echo $site->updated; ?>
                        </td>
                        <td>
                          <?php echo $site->publishedsince; ?>
                        </td>
                        <td>
                          <a class="btn btn-default btn-block" target="_blank" href="static/<?php echo $site->slug; ?>/index.htm"><i class="fa fa-external-link"></i> View LIVE page</a>
                        </td>
                        <td>
                          <a class="btn btn-default btn-block" href="index.php?slug=<?php echo $site->slug; ?>"><i class="fa fa-pencil"></i> Edit page</a>
                        </td>
                      </tr>
                    <?php
                  }
                ?>
              </tbody>
            </table>
            <?php
          }
        ?>
        <div class="text-right mt-lg">
          <a class="btn btn-default" href="index.php"><i class="fa fa-plus"></i> Create page</a>
        </div>
      </ul>
    </div>
    <script src="js/common.js"></script>
    <script src="js/login.js"></script>
  </body>
  
</html>