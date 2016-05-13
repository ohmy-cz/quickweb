<?php
  require('config.php');
  require_once('helpers/string.php');
  require_once('classes/page.php');
  require_once('classes/site_element.php');
  require_once('classes/database.php');
  require_once('classes/form_security.php');
  
  session_start();
  $formSecurity = new formSecurity();
  if(isset($_POST['send']))
  {
    if(!isset($_POST['securitytoken']) || !$formSecurity->validate($_POST['securitytoken']) )
    {
      error_log(date('Y-m-d H:i:s') . ' ' . __FILE__ . ' No security token found or invalid', 3, 'logs/critical.log');
      die('error');
    }
   
    if(isset($_POST['name']) && isset($_POST['slug']) && isset($_POST['publishedsince']))
    {
      // Prepare data
      $update = false;
      $currentPage = $_SESSION['currentpage'];
      $name = sanitize(trim($_POST['name']), true, true, true);
      $slug = sanitize(trim(strtolower($_POST['slug'])));
      $publishedsince = sanitize(trim($_POST['publishedsince']), true, true);
      $bg_color = sanitize($currentPage->bg_color, true, true);
      $bg_image = sanitize($currentPage->bg_image, true, true, false, true);
      
      $db = new Database();
      
      // check that the slug is unique
      $sql = 'select id, owner from sites where slug="' . $slug . '"';
      if(isset($currentPage->id))
      {
        $sql .= ' or id=' . intval($currentPage->id);
      }
      $r = $db->query($sql);
      if($r->num_rows > 0)
      {
        $r1 = $r->fetch_object();
        if($r1->owner == intval($_SESSION['user']->id) && isset($currentPage->id) && intval($currentPage->id) == intval($r1->id))
        {
           // if the owner and id matches, update saved config
           $update = true;
        } else {
          die('Another site with this slug "' . $slug . '" exists (and it does not belong to you)!');
        }
      }
      
      if($update)
      {
        // update page
        $sql = 'update sites set
          slug = "' . $slug . '", 
          name = "' . $name . '", 
          created = "' . date('Y-m-d H:i:s') . '", 
          publishedsince = "' . $publishedsince . '", 
          bg_color = "' . $bg_color . '", 
          bg_image = "' . $bg_image . '"
        where id='. intval($currentPage->id) .' limit 1';
        
        $r = $db->query($sql);
        
        if($r)
        {
          // save the elements!
          foreach($currentPage->layout as $site_element)
          {
            if(isset($site_element->id) && !is_null($site_element->id))
            {
              // Update an existing site element
              $sql = 'update site_elements set
                type = ' . intval($site_element->type) . ', 
                coordinate_x = "' . intval($site_element->coordinate_x) . '", 
                coordinate_y = "' . intval($site_element->coordinate_y) . '", 
                updated = "' . date('Y-m-d H:i:s') . '", 
                size_x = "' . intval($site_element->size_x) . '", 
                size_y = "' . intval($site_element->size_y) . '", 
                bg_image = "' . sanitize($site_element->bg_image) . '", 
                bg_color = "' . sanitize($site_element->bg_color) . '", 
                content = "' . sanitize($site_element->content, true, true, true, true) . '"
              where id = ' . intval($site_element->id);
              
              $r1 = $db->query($sql);
              if(!$r1)
              {
                error_log(date('Y-m-d H:i:s') . ' ' . __FILE__ . ' Could not update a site element!\r\n' . $sql . '\r\n' . $db->dbo->error, 3, 'logs/critical.log');
                die('error');
              }
            } else {
              // Create a new element for an existing site
              $sql = 'insert into site_elements (
                site, 
                type, 
                coordinate_x, 
                coordinate_y, 
                created,
                size_x,
                size_y,
                bg_image,
                bg_color,
                content
              ) values (
                ' . intval($currentPage->id). ', 
                ' . intval($site_element->type) . ', 
                "' . intval($site_element->coordinate_x) . '", 
                "' . intval($site_element->coordinate_y) . '", 
                "' . date('Y-m-d H:i:s') . '", 
                "' . intval($site_element->size_x) . '", 
                "' . intval($site_element->size_y) . '", 
                "' . sanitize($site_element->bg_image) . '", 
                "' . sanitize($site_element->bg_color) . '", 
                "' . sanitize($site_element->content, true, true, true, true) . '"
              )';
              
              $r1 = $db->query($sql);
              if(!$r1)
              {
                error_log(date('Y-m-d H:i:s') . ' ' . __FILE__ . ' Could not create a site element!\r\n' . $sql . '\r\n' . $db->dbo->error, 3, 'logs/critical.log');
                die('error');
              }
            }
          }
        } else {
          error_log(date('Y-m-d H:i:s') . ' ' . __FILE__ . ' Could not update a site!\r\n' . $sql . '\r\n' . $db->dbo->error, 3, 'logs/critical.log');
          die('error');
        }
        // update page end
      } else {
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
          "' . $bg_image . '"
        )';
        
        $r = $db->query($sql);
        if($r)
        {
          // save the elements!
          foreach($currentPage->layout as $site_element)
          {
            $sql = 'insert into site_elements (
              site, 
              type, 
              coordinate_x, 
              coordinate_y, 
              created,
              size_x,
              size_y,
              bg_image,
              bg_color,
              content
            ) values (
              ' . intval($db->dbo->insert_id). ', 
              ' . intval($site_element->type) . ', 
              "' . intval($site_element->coordinate_x) . '", 
              "' . intval($site_element->coordinate_y) . '", 
              "' . date('Y-m-d H:i:s') . '", 
              "' . intval($site_element->size_x) . '", 
              "' . intval($site_element->size_y) . '", 
              "' . sanitize($site_element->bg_image) . '", 
              "' . sanitize($site_element->bg_color) . '", 
              "' . sanitize($site_element->content, true, true, true, true) . '"
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
        // create page end
      }
      
      // generate static HTML start
      $cellHeight = 80 + 15; // height + padding
      $cellWidth = 8.33; // 1/12
      ob_start();
      ?>
      <!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>
            <?php echo $currentPage->name; ?>
          </title>
          <link rel="stylesheet" href="../../css/static.css" type="text/css">
          <style>
            body {
              <?php echo isset($currentPage->bg_image) && trim($currentPage->bg_image) != '' ? 'background-image:' . base64_decode($currentPage->bg_image) .';' : ''; ?>
              <?php echo isset($currentPage->bg_color) && trim($currentPage->bg_color) != '' ? 'background-color:' . $currentPage->bg_color .';' : ''; ?>
            }
          </style>
        </head>
        <body>
          <div class="row avi-container">
            <?php
              foreach($currentPage->layout as $site_element)
              {
                try{
                  ?>
                    <div class="col-sm-<?php echo intval($site_element->size_x); ?>" style="left:<?php echo intval($site_element->coordinate_x) * $cellWidth; ?>%;top:<?php echo intval($site_element->coordinate_y) * $cellHeight; ?>px;height:<?php echo intval($site_element->size_y) * $cellHeight; ?>px;">
                      <?php echo urldecode(base64_decode($site_element->content)); ?>
                    </div>
                  <?php
                } catch(Exception $e) {
                }
              }
            ?>
          </div>
        </body>
      </html>
      <?php
      $staticContent = ob_get_contents();
      ob_end_clean();
      
      $dir = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'static' . DIRECTORY_SEPARATOR . $slug;
      if(!is_dir($dir))
      {
        if(!mkdir($dir))
        {
          error_log(date('Y-m-d H:i:s') . ' ' . __FILE__ . ' Could not create a folder!', 3, 'logs/critical.log');
          die('Error: Could not create static folder!');
        }
      }
      file_put_contents($dir . DIRECTORY_SEPARATOR . 'index.htm', $staticContent);
      // generate static HTML end
      
      header('Location: index.php?slug=' . $slug);
    } else {
      error_log(date('Y-m-d H:i:s') . ' ' . __FILE__ . ' Required parameters not provided!', 3, 'logs/critical.log');
      die('Error 2!');
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
  <?php
  echo '<!--';
  print_r($_SESSION['currentpage']);
  echo '-->';
  ?>
    <div class="container">
      <h1>
        Enter information about your page
      </h1>
      <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
        <input type="hidden" name="securitytoken" value="<?php echo $formSecurity->outputKey(); ?>">
        <input type="hidden" name="send" value="1">
        <div class="form-group">
          <label class="control-label col-md-2">
            Name
          </label>
          <div class="col-md-10">
            <input type="text" name="name" id="name" class="form-control" value="<?php echo isset($_SESSION['currentpage']) && isset($_SESSION['currentpage']->name) ? $_SESSION['currentpage']->name : ''; ?>" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-2">
            URL
          </label>
          <div class="col-md-10">
            <span class="input-group">
              <span class="input-group-addon">http://<?php echo $_SERVER['SERVER_NAME'] . '/quickweb/'; ?></span>
              <input type="text" id="slug" name="slug" value="<?php echo isset($_SESSION['currentpage']) && isset($_SESSION['currentpage']->slug) ? $_SESSION['currentpage']->slug : ''; ?>" class="form-control" readonly required>
            </span>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-2">
            Published since
          </label>
          <div class="col-md-10">
            <input type="datetime" value="<?php echo isset($_SESSION['currentpage']) && isset($_SESSION['currentpage']->publishedsince) ? $_SESSION['currentpage']->publishedsince : date('Y-m-d H:i:s'); ?>" name="publishedsince" class="form-control" required>
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block" id="btnLogin">Save page</button>
      </form>
    </div>
    <script src="js/common.js"></script>
    <script src="js/pagemeta.js"></script>
  </body>
</html>