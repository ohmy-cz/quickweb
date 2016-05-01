<?php
  session_start();
  // todo: facebook login here
  // https://developers.facebook.com/docs/facebook-login/web
  
  require('config.php');
  require_once('helpers/string.php');
  require_once('classes/database.php');
  if(isset($_POST))
  {
    if(isset($_POST['name']) && isset($_POST['slug']) && isset($_POST['publishedsince']))
    {
      // Prepare data
      $name = sanitize(trim($_POST['name']), true, true, true);
      $slug = sanitize(trim(strtolower($_POST['slug'])));
      $publishedsince = sanitize(trim($_POST['publishedsince']), true, true);
      $bg_color = sanitize($_SESSION['currentpage']->bg_color);
      $bg_image = sanitize($_SESSION['currentpage']->bg_image);
      
      $db = new Database();
      
      // check that the slug is unique
      $sql = 'select id from sites where slug="' . $slug . '"';
      if($db->query($sql)->num_rows() > 0)
      {
        die('Another site with this slug "' . $slug . '" exists!');
      }
      
      // create page
      $sql = 'insert into sites (
        owner, 
        slug, 
        name, 
        created, 
        publishedsince, 
        bg_color, 
        bg_image
      ) values (
        ' . intval($_SESSION['user']->id). ', 
        "' . $slug . '", 
        "' . $name . '", 
        "' . date('Y-m-d H:i:s') . '", 
        "' . $publishedsince . '", 
        "' . $bg_color . '", 
        "' . $bg_image . '", 
      )';
      
      $r = $db->query($sql);
      if($r)
      {
        // save the elements!
        foreach($_SESSION['currentpage']->layout as $layout_element)
        {
          $sql = 'insert into site_elements (
            site, 
            type, 
            coordinate_x, 
            coordinate_y, 
            created,
            size_x,
            size_y,
            content
          ) values (
            ' . intval($db->dbo->insert_id). ', 
            ' . intval($layout_element->type) . ', 
            "' . intval($layout_element->x) . '", 
            "' . intval($layout_element->y) . '", 
            "' . date('Y-m-d H:i:s') . '", 
            "' . intval($layout_element->size_x) . '", 
            "' . intval($layout_element->size_y) . '", 
            "' . sanitize($layout_element->content, true, true, true, true) . '"
          )';
          
          $r1 = $db->query($sql);
          if(!$r1)
          {
            error_log(date('Y-m-d H:i:s') . ' ' . __FILE__ . ' Could not create a site element!\r\n' . $sql . '\r\n' . $db->dbo->error, 3, 'logs/critical.log');
            die('error');
          }
        }
      } else {
        error_log(date('Y-m-d H:i:s') . ' ' . __FILE__ . ' Could not create a site!\r\n' . $sql . '\r\n' . $db->dbo->error, 3, 'logs/critical.log');
        die('error');
      }
      
      header('Location: index.php?slug=' . $slug);
    } else {
      error_log(date('Y-m-d H:i:s') . ' ' . __FILE__ . ' Required parameters not provided!', 3, 'logs/critical.log');
      die('Error!');
    }
  }
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Enter Page details</title>
    <link rel="stylesheet" href="css/main.css" type="text/css">
  </head>
  
  <body>
    <div class="container">
      <h1>
        Enter information about your page
      </h1>
      <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="form-group">
          <label class="control-label col-md-2">
            Name
          </label>
          <div class="col-md-10">
            <input type="text" name="name" class="form-control" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-2">
            URL
          </label>
          <div class="col-md-10">
            <span class="input-group">
              <span class="input-group-addon">http://<?php echo $_SERVER['SERVER_NAME'] . '/quickweb/'; ?></span>
              <input type="url" name="slug" class="form-control" required>
            </span>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-2">
            Published since
          </label>
          <div class="col-md-10">
            <input type="datetime" name="publishedsince" class="form-control" required>
          </div>
        </div>
      </form>
      <button type="button" class="btn btn-primary btn-block" id="btnLogin">Login (simulation)</button>
    </div>
    <script src="js/common.js"></script>
    <script src="js/login.js"></script>
  </body>
</html>