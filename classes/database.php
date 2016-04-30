<?php
  class Database {
    var $db;
    
    function __construct()
    {
      if(!defined('AVIQW_DBHOST') || !defined('AVIQW_DBUSER') || !defined('AVIQW_DBPASS') || !defined('AVIQW_DBNAME'))
      {
        die('Database connection credentials not provided');
      }
      $this->db = new mysqli(AVIQW_DBHOST, AVIQW_DBUSER, AVIQW_DBPASS, AVIQW_DBNAME);
      if ($this->db->connect_errno) {
          die('Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
      }
    }
    
    function query($sql)
    {
      return $this->db->query($sql);
    }
    
    function __destroy()
    {
      $this->db->close();
    }
  }