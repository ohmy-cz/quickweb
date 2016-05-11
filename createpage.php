<?php
  /**
   * Save current page's layout temporarily for later use.
   */
   
   // todo: verify data are coming from the same user
   
   $out['status'] = 0;
   try {
     require_once('classes/page.php');
     require_once('classes/site_element.php');
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
       if(isset($d['id']))
       {
         $_SESSION['currentpage']->id = intval($d['id']);
         if(isset($d['name']))
         {
           $_SESSION['currentpage']->name = sanitize($d['name'], true, true, true, true);
         }
         if(isset($d['slug']))
         {
           $_SESSION['currentpage']->slug = sanitize($d['slug']);
         }
       }
       $_SESSION['currentpage']->layout = $d['layout'];
       $_SESSION['currentpage']->bg_color = sanitize($d['bg_color'], true, true);
       $_SESSION['currentpage']->bg_image = sanitize(base64_encode($d['bg_image']), true, true, false, true );
       
       // sanitize data
       foreach($_SESSION['currentpage']->layout as $key=>$site_element)
       {
         try {
           $sanitized_site_element = new SiteElement;
           if(isset($site_element['id']))
           {
             $sanitized_site_element->id = intval($site_element['id']);
           }
           $sanitized_site_element->content = base64_encode($site_element['content']);
           $sanitized_site_element->size_y = intval($site_element['size_y']);
           $sanitized_site_element->size_x = intval($site_element['size_x']);
           $sanitized_site_element->type = intval($site_element['type']);
           $sanitized_site_element->coordinate_x = intval($site_element['coordinate_x']);
           $sanitized_site_element->coordinate_y = intval($site_element['coordinate_y']);
           if(isset($site_element['bg_color']))
           {
             $sanitized_site_element->bg_color = sanitize($site_element['bg_color']);
           }
           if(isset($site_element['bg_image']))
           {
             $sanitized_site_element->bg_image = base64_encode($site_element['bg_image']);
           }
         } catch(Exception $e) {
           error_log(date('Y-m-d H:i:s') . ' ' . __FILE__ . ' Could not sanitize layout data: ' . $e->getMessage(), 3, 'logs/critical.log');
           // delete the current configuration to prevent stacking up of the attack
           $_SESSION['currentpage'] = null;
           unset($_SESSION['currentpage']);
           die('error');
         }
         
         $_SESSION['currentpage']->layout[$key] = $sanitized_site_element;
       }
       $out['status'] = 1;
     }
   } catch(Exception $e) {
     error_log(date('Y-m-d H:i:s') . ' ' . __FILE__ . ' ' . $e->getMessage(), 3, 'logs/critical.log');
     $out['status'] = -2;
   } 
   header('Content-Type: application/json');
   echo json_encode($out);