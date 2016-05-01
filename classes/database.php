<?php
  class Database {
    var $dbo;
    
    function __construct()
    {
      if(!defined('AVIQW_DBHOST') || !defined('AVIQW_DBUSER') || !defined('AVIQW_DBPASS') || !defined('AVIQW_DBNAME'))
      {
        die('Database connection credentials not provided');
      }
      $this->dbo = new mysqli(AVIQW_DBHOST, AVIQW_DBUSER, AVIQW_DBPASS, AVIQW_DBNAME);
      if ($this->dbo->connect_errno) {
          die('Failed to connect to MySQL: (' . $this->dbo->connect_errno . ') ' . $this->dbo->connect_error);
      }
    }
    
    function query($sql)
    {
      return $this->dbo->query($sql);
    }
    
    function __destroy()
    {
      $this->dbo->close();
    }
  }