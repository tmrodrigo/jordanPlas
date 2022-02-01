<?php 

 function cut_str($str, $num = null){
   if ($num == null) {
     $num = 10;
   }

   if (strlen($str) > $num - 1) {

     $cut = substr($str, 0, $num) . '...';
     return $cut;

   } else {

     return $str;

   }
 }

 function format_number($num, $decimals = null) {

    if ($decimals == null){
      $decimals = 0;
    }
    $num = intval($num);
    
    $num = number_format($num, $decimals, ',', '.');

    return $num;
 }

?>