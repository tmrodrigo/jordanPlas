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

 function arrSum($arr, $key){

    if (!isset($arr)) {
      return false;
    }

    $sum = [];

    foreach ($arr as $a => $item) {
      foreach ($item as $k => $val) {
        if ($k == $key) {
          $sum[] = $val;
        }
      }
    }

    $n_a = array_sum($sum);

    return $n_a;
  }

  function cuit($cuit){


    $s = ['-', '_', '/', '|', '.', ' ', ',', ';', ':', '?', '¿', 'o', 'O' ];

    $n_c = str_replace($s, '', $cuit);

    $a = substr($n_c,0, -9);
    $b = substr($n_c, 2, -1);
    $c = substr($n_c, -1);

    $cuit = $a . '-' . $b . '-' . $c;

    return $cuit;
  }

  function cleanUrl($badUrl)
  {

  $unwanted_array = array('Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', '/' => '-', ' ' => '', '|' => '' , '?' => '', '¿' => '', ',' => '', ';' => '', '!' => '', '¡' => '', '(' => '', ')' => '', "'" => '' );

  $cleanUrl = strtr($badUrl, $unwanted_array);

  $cleanUrl = strtolower($cleanUrl);

  return $cleanUrl;
  }


  function translate($str){

    $word = ['yellow' => 'amarillo', 'black' => 'negro', 'white' => 'blanco', 'orange' => 'naranja', 'green' => 'verde', 'blue' => 'azul'];

    $clean = strtr($str, $word);

    return $clean;

  }

  function add_bi_color($colors){

    $ama = false;
    $neg = false;

    foreach ($colors->toArray() as $color) {
      if ($color['value'] == 'yellow') {
        $ama = true;
      }

      if ($color['value'] == 'black') {
        $neg = true;
      }
    }

    if ($ama == true && $neg == true) {

      $colors->push([
        'value' => 'bi-color'
      ]);

      return $colors->toArray();

    }

    return $colors;

  }

  function format_date($str){

    $a = explode('-', $str);
    
    if (count($a) > 1) {
      return $a[2] . '-' . $a[1] . '-' . $a[0];
    }
    return false;
    
  }

  function format_cel($str){

    $unwanted_array = array(' ' => '', '-' => '', '(' => '', ')' => '');

    $nc = strtr($str, $unwanted_array);

    $nc = 'https://wa.me/' . $nc;

    return $nc;

  }

?>