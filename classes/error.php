<?php
  class Error {
    public function __construct()
    {
      register_shutdown_function( array( $this, "fatal_handler") );
    }
    
    public function fatal_handler() {
      $errfile = "unknown file";
      $errstr  = "shutdown";
      $errno   = E_CORE_ERROR;
      $errline = 0;
      
      $error = error_get_last();
      
      if( $error !== NULL) {
        $errno   = $error["type"];
        $errfile = $error["file"];
        $errline = $error["line"];
        $errstr  = $error["message"];
        
        $this::log($errno, $errstr, $errfile, $errline);
      }
    }
    
    public static function log($errno, $errstr, $errfile, $errline)
    {
      if(!isset($errno) || is_null($errno))
      {
         $errno = uniqid();
      }
      error_log(date('Y-m-d H:i:s') . ' ' . $errno .' ' . $errfile . '@' . $errline . ' ' . $errstr . "\r\n", 3, 'logs/critical.log');
    }
  }