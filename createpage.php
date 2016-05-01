<?php
  /**
   * Save current page's layout temporarily for later use.
   */
   
   // todo: verify data are coming from the same user
   
   $out['status'] = 0;
   try {
     require_once('classes/page.php');
     require_once('classes/layout_element.php');
     require_once('helpers/string.php');
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
       $_SESSION['currentpage']->bg_color = sanitize($d['bg_color']);
       $_SESSION['currentpage']->bg_image = sanitize($d['bg_image']);
       // sanitize data
       foreach($_SESSION['currentpage']->layout as $key=>$layout_element)
       {
         try {
           $sanitized_layout_element = new LayoutElement;
           $sanitized_layout_element->content = base64_encode($layout_element['content']);
           $sanitized_layout_element->height = intval($layout_element['height']);
           $sanitized_layout_element->width = intval($layout_element['height']);
           $sanitized_layout_element->type = intval($layout_element['type']);
           $sanitized_layout_element->x = intval($layout_element['x']);
           $sanitized_layout_element->y = intval($layout_element['y']);
         } catch(Exception $e) {
           error_log(date('Y-m-d H:i:s') . ' ' . __FILE__ . ' Could not sanitize layout data: ' . $e->getMessage(), 3, 'logs/critical.log');
           // delete the current configuration to prevent stacking up of the attack
           $_SESSION['currentpage'] = null;
           unset($_SESSION['currentpage']);
           die('error');
         }
         
         $_SESSION['currentpage']->layout[$key] = $sanitized_layout_element;
       }
       $out['status'] = 1;
     }
   } catch(Exception $e) {
     error_log(date('Y-m-d H:i:s') . ' ' . __FILE__ . ' ' . $e->getMessage(), 3, 'logs/critical.log');
     $out['status'] = -2;
   } 
   header('Content-Type: application/json');
   echo json_encode($out);