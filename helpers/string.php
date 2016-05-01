<?php

 function sanitize($input, $allowSpaces = false, $allowSpecialChars = false, $allowNationalChars = false, $allowMath = false) {
   $output = '';
   $allowed = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', '_', '.');
   if($allowSpaces)
   {
     array_push($allowed, ' ');
   }
   if($allowNationalChars)
   {
     // Czech
     array_push($allowed, 'ě');
     array_push($allowed, 'š');
     array_push($allowed, 'č');
     array_push($allowed, 'ř');
     array_push($allowed, 'ž');
     array_push($allowed, 'ý');
     array_push($allowed, 'á');
     array_push($allowed, 'í');
     array_push($allowed, 'é');
     array_push($allowed, 'ď');
     array_push($allowed, 'ť');
     array_push($allowed, 'ň');
     // Danish
     array_push($allowed, 'ø');
     array_push($allowed, 'å');
     array_push($allowed, 'æ');
     
   }
   if($allowSpecialChars)
   {
     array_push($allowed, '?');
     array_push($allowed, '%');
     array_push($allowed, '&');
     array_push($allowed, '!');
     array_push($allowed, ':');
     array_push($allowed, '#');
     array_push($allowed, '(');
     array_push($allowed, ')');
     array_push($allowed, '[');
     array_push($allowed, ']');
   }
   if($allowMath)
   {
     array_push($allowed, '-');
     array_push($allowed, '+');
     array_push($allowed, '/');
     array_push($allowed, '*');
     array_push($allowed, '=');
   }
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