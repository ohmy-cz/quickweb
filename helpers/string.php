<?php

 function sanitize($input) {
   $output = '';
   $allowed = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
   for($i = 0; $i < strlen($input); $i++)
   {
     $letter = substr($input, $i, 1);
     if(in_array(strtolower($letter), $allowed))
     {
       $output .= $letter;
     }
   }
   return $output;
 }