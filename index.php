<?php
  require('config.php');
  require_once('helpers/string.php');
  require_once('classes/database.php');
  require_once('classes/layout_element.php');
  $db = new Database();
?><!doctype html>
<html>
<head>
<meta charset="utf-8">
  <title>Create site</title>
  <link rel="stylesheet" href="css/main.css" type="text/css">
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
      <div class="input-group demo2">
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
      <button class="btn btn-default btn-block disabled" id="avicreatepage" disabled type="button"><i class="fa fa-chain"></i> Create page</button>
    </div>
  </div>
<!--<div id="summernote">Hello Summernote</div>-->

    <script type="text/javascript" src="js/common.js"></script>
    <script type="text/javascript" src="js/editor.js"></script>
    <?php
      if(isset($_GET['slug']))
      {
          $sql = 'select * from sites where slug = "' . sanitize($_GET['slug']) . '" limit 1';
          $r = $db->query($sql);
          if($site = $r->fetch_object())
          {
            // Only expose data needed to reconstruct the site in javascript
            $json_site = json_encode(array('bg_color' => $site->bg_color, 'bg_image' => $site->bg_image));
            $sql = 'select * from site_elements where site = ' . intval($site->id);
            $r1 = $db->query($sql);
            $site_elements = array();
            while($site_element = $r1->fetch_object())
            {
              $layout_element = new LayoutElement;
              $layout_element->x = intval($site_element->coordinate_x);
              $layout_element->y = intval($site_element->coordinate_x);
              $layout_element->width = intval($site_element->size_x);
              $layout_element->height = intval($site_element->size_y);
              $layout_element->type = intval($site_element->type);
              $layout_element->content = base64_decode($site_element->content);
              array_push($site_elements, $layout_element);
            }
            $json_elements = json_encode($site_elements);
            ?>
            <script type="text/javascript">
              var AVIQWPageConfig = '<?php echo $json_site; ?>';
              var AVIQWElementsConfig = '<?php echo $json_elements; ?>';
            </script>
            <?php
          } else {
            die('Requested page has not been found!');
          }
      }
    ?>
</body>
</html>