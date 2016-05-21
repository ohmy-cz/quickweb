<?php
   
   session_start();
   $out['status'] = 0;
   
   try {
     require_once('helpers/string.php');
     require_once('classes/form_security.php');
     $formSecurity = new formSecurity();
     
     $d = json_decode(file_get_contents('php://input'), true);
     
     if(!isset($d['securitytoken']) || !$formSecurity->validate($d['securitytoken']) )
     {
       $eid = uniqid();
       error_log(date('Y-m-d H:i:s') . ' ' . $eid .' ' . __FILE__ . ' No security token found or invalid', 3, 'logs/critical.log');
       $out['error'] = 'Error ' . $eid;
       $out['status'] = -3;
     } else {
       if(!isset($d['binary']))
       {
         $eid = uniqid();
         error_log(date('Y-m-d H:i:s') . ' ' . $eid .' ' . __FILE__ . ' Image upload - Binary data missing', 3, 'logs/critical.log');
         $out['error'] = 'Error ' . $eid;
         $out['status'] = -4;
       } else {
//         die(base64_decode($d['binary']));
         $urlstring = $d['binary'];
         $im = imagecreatefromstring(base64_decode(substr($urlstring, strrpos($urlstring, ',')+1)));
         if(!$im)
         {
           $out['status'] = -5;
           $out['error'] = 'Invalid image format';
         } else {
           $imgname = time() . '_' . uniqid() . '.jpg';
           if(!is_dir('images'))
           {
             mkdir('images', 0755);
           }
           if(imagejpeg($im, 'images/' . $imgname, 80))
           {
             $out['status'] = 1;
             $out['filename'] = $imgname;
           }
         }
       }
     }
     
   } catch(Exception $e) {
     $eid = uniqid();
     error_log(date('Y-m-d H:i:s') . ' ' . $eid .' ' . __FILE__ . ' ' . $e->getMessage(), 3, 'logs/critical.log');
     $out['error'] = 'Error ' . $eid;
     $out['status'] = -2;
   } 
   header('Content-Type: application/json');
   echo json_encode($out);
     