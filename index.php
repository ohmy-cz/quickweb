<?php
  require('config.php');
  require_once('helpers/string.php');
  require_once('classes/database.php');
  require_once('classes/page.php');
  require_once('classes/site_element.php');
  $db = new Database();
  
  if(isset($_GET['slug']))
  {
      $sql = 'select * from sites where slug = "' . sanitize($_GET['slug']) . '" limit 1';
      $r = $db->query($sql);
      $site = $r->fetch_object();
      
      if($db->dbo->error || $site == null)
      {
        die('Requested page has not been found!');
      }
  }
?><!doctype html>
<html>
<head>
<meta charset="utf-8">
  <title>Create site</title>
  <link rel="stylesheet" href="css/main.css" type="text/css">
  <?php if(isset($site)) { ?>
    <style>
      body {
        <?php echo isset($site->bg_image) && trim($site->bg_image) != '' ? 'background-image:' . base64_decode($site->bg_image) .';' : ''; ?>
        <?php echo isset($site->bg_color) && trim($site->bg_color) != '' ? 'background-color:' . $site->bg_color .';' : ''; ?>
      }
    </style>
  <?php } ?>
</head>

<body>
  <!--
    <div class="device-xs visible-xs"></div>
    <div class="device-sm visible-sm"></div>
    <div class="device-md visible-md"></div>
    <div class="device-lg visible-lg"></div>
    <div class="device-xl visible-xl"></div>-->
  <div class="avi-combinedGrid">
    <div class="container-fluid">
      <div class="avi-guidesGrid">
        <div class="row">
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
          <div class="col-sm-1">
            <div class="avi-box"><i class="fa fa-plus"></i></div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="container-fluid">
        <div class="grid-stack">
        </div>
    </div>
  </div>
  <div class="avi-panel left">
    <div class="avi-panel-content">
      <?php
        $sql = 'select id, name, icon from site_element_types where deleted != 1';
        $r = $db->query($sql);
        while($site_element_type = $r->fetch_object())
        {
          ?>
            <a class="btn <?php echo $site_element_type->id == 1 ? ' btn-primary btn-lg' : ' btn-default'; ?> btn-block avi-add-new-widget" id="btnAdd<?php echo ucfirst(sanitize(strtolower($site_element_type->name))); ?>" data-type="<?php echo $site_element_type->id; ?>" href="#"><i class="fa fa-<?php echo $site_element_type->icon; ?>"></i> Add <?php echo $site_element_type->name; ?></a>
          <?php
        }
      ?>
<!--      <a class="btn btn-primary btn-lg btn-block avi-add-new-widget" id="btnAddText" data-type="text" href="#"><i class="fa fa-pencil"></i> Add Text</a> -->
<!--      <a class="btn btn-default btn-lg btn-block avi-add-new-widget" data-type="picture" href="#"><i class="fa fa-image"></i> Add Picture</a> -->
  <!--      <a class="btn btn-default btn-block" id="add-new-widget" href="#"><i class="fa fa-plus"></i> Add Video</a>-->
  <!--      <a class="btn btn-default btn-block" id="add-new-widget" href="#"><i class="fa fa-map-pin"></i> Add Map</a>-->
<!--      <a class="btn btn-default btn-block avi-add-new-widget" data-type="contact-form" href="#"><i class="fa fa-paper-plane"></i> Add Contact Form</a> -->
  <!--      <a class="btn btn-default btn-block" id="add-new-widget" href="#"><i class="fa fa-car"></i> Add Celtic Tuning</a> -->
<!--      <a class="btn btn-default btn-block avi-add-new-widget" data-type="button" href="#"><i class="fa fa-chain"></i> Add Button</a> -->
      
      <hr>
      <p>
        Background color:
      </p>
      <div class="input-group avi-mainBg">
        <input type="text" id="mainBgColor" value="#ffffff" class="form-control" />
        <span class="input-group-addon"></span>
      </div>
      <p>
        Background image:
      </p>
      <form action="upload.php" method="post" enctype="multipart/form-data" target="uploadpit">
        <input type="file" name="background" id="mainBgImage" class="form-control avi-bodyBg">
      </form>
      <hr>
      <button class="btn btn-default btn-block disabled" id="avicreatepage" disabled type="button"><i class="fa fa-chain"></i> <?php echo isset($site) ? 'Save changes' : 'Create page'; ?></button>
      <?php
       if(isset($site))
       {
         ?>
          <hr>
          <a class="btn btn-default btn-block" target="_blank" href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/quickweb/static/<?php echo $site->slug; ?>/index.htm"><i class="fa fa-external-link"></i> View LIVE site</a>
        <?php
       }
      ?>
    </div>
  </div>
<!--<div id="summernote">Hello Summernote</div>-->

    <script type="text/javascript" src="js/common.js"></script>
    <script type="text/javascript" src="js/editor.js"></script>
    <?php
      if(isset($site))
      {
        // Only expose data needed to reconstruct the site in javascript
//        array('bg_color' => $site->bg_color, 'bg_image' => $site->bg_image
        $siteConfig = new Page;
        $siteConfig->id = $site->id;
        $siteConfig->slug = $site->slug;
        $siteConfig->name = $site->name;
        $siteConfig->publishedsince = $site->publishedsince;
        $siteConfig->bg_color = $site->bg_color;
        $siteConfig->bg_image = $site->bg_image;
        $json_site = json_encode($siteConfig);
        $sql = 'select * from site_elements where site = ' . intval($site->id);
        $r1 = $db->query($sql);
        $site_elements = array();
        while($site_element = $r1->fetch_object())
        {
          $sanitized_site_element = new SiteElement;
          $sanitized_site_element->id = intval($site_element->id);
          $sanitized_site_element->coordinate_x = intval($site_element->coordinate_x);
          $sanitized_site_element->coordinate_y = intval($site_element->coordinate_y);
          $sanitized_site_element->size_x = intval($site_element->size_x);
          $sanitized_site_element->size_y = intval($site_element->size_y);
          $sanitized_site_element->type = intval($site_element->type);
          $sanitized_site_element->content = base64_decode($site_element->content);
          $sanitized_site_element->bg_image = base64_decode($site_element->bg_image);
          $sanitized_site_element->bg_color = sanitize($site_element->bg_color);
          $sanitized_site_element->created = sanitize($site_element->created, true, true);
          array_push($site_elements, $sanitized_site_element);
        }
        $json_elements = json_encode($site_elements);
        ?>
        <script type="text/javascript">
          var AVIQWPageConfig = '<?php echo $json_site; ?>';
          var AVIQWElementsConfig = '<?php echo $json_elements; ?>';
        </script>
        <?php
      }
    ?>
</body>
</html>