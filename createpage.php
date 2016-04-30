<?php
  /**
   * Save current page's layout temporarily for later use.
   */
   
   // todo: verify data are coming from the same user
   
   $out['status'] = 0;
   try {
     require_once('classes/page.php');
     session_start();
     $d = json_decode(file_get_contents('php://input'), true);
     if(!isset($d['layout']))
     {
       $out['status'] = -1;
       $out['error'] = 'Layout not set!';
     } else {
       $_SESSION['currentpage'] = new Page;
       $_SESSION['currentpage']->created = date('Y-m-d H:i:s');
       $_SESSION['currentpage']->layout = $d['layout'];
       $out['status'] = 1;
     }
   } catch(Exception $e) {
     error_log(date('Y-m-d H:i:s') . ' ' . __FILE__ . ' ' . $e->getMessage(), 3, 'logs/critical.log');
     $out['status'] = -2;
   } 
   header('Content-Type: application/json');
   echo json_encode($out);