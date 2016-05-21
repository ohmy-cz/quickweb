<?php
  /**
   * Delete user
   */
   
   session_start();
   $out['status'] = 0;
   
   try {
     require_once('../config.php');
     require('../classes/error.php');
     $e = new Error();
     require_once('../classes/page.php');
     require_once('../classes/site_element.php');
     require_once('../helpers/string.php');
     require_once('../classes/form_security.php');
     require_once('../classes/database.php');
    
     $db = new Database();
     $formSecurity = new formSecurity();
     $user = $_SESSION['user'];
     
     $d = json_decode(file_get_contents('php://input'), true);
     
     if(!isset($user) || $user->role_id != 3)
     {
       $out['error'] = 'Not authorized.';
       $out['status'] = -1;
     }
     
     if(!isset($d['securitytoken']) || !$formSecurity->validate($d['securitytoken']) )
     {
       $eid = uniqid();
       error_log(date('Y-m-d H:i:s') . ' ' . $eid .' ' . __FILE__ . ' No security token found or invalid', 3, '../logs/critical.log');
       $out['error'] = 'Error ' . $eid;
       $out['status'] = -3;
     }
     
     if(!isset($d['id']))
     {
       $out['status'] = -1;
       $eid = uniqid();
       error_log(date('Y-m-d H:i:s') . ' ' . $eid .' ' . __FILE__ . ' User ID not set!', 3, '../logs/critical.log');
       $out['error'] = 'Error ' . $eid;
     } else {
       $sql = 'update users set deleted = 1 where id=' . intval($d['id']) . ' limit 1';
       $result = $db->query($sql);
       if(!$result)
       {
         $eid = uniqid();
         error_log(date('Y-m-d H:i:s') . ' ' . $eid .' ' . __FILE__ . ' Mysql error: ' . $db->dbo->error() . "\r\n" . '   SQL: ' . $sql, 3, '../logs/critical.log');
         $out['error'] = 'Error ' . $eid;
         $out['status'] = -4;
       } else {
         $out['status'] = 1;
       }
     }
   } catch(Exception $e) {
     $eid = uniqid();
     
     error_log(date('Y-m-d H:i:s') . ' ' . $eid .' ' . __FILE__ . ' ' . $e->getMessage(), 3, '../logs/critical.log');
     $out['error'] = 'Error ' . $eid;
     $out['status'] = -2;
   } 
   header('Content-Type: application/json');
   echo json_encode($out);