<?php

class Enkrip
{

    function encrypt($str){
      $hasil = '';
      $kunci = 'lfeACPWr47TMuhFR1H7qy7JYLOgxOTRN2tnegt5F';
      for ($i = 0; $i < strlen($str); $i++) {
          $karakter = substr($str, $i, 1);
          $kuncikarakter = substr($kunci, ($i % strlen($kunci))-1, 1);
          $karakter = chr(ord($karakter)+ord($kuncikarakter));
          $hasil .= $karakter;
      }
      return urlencode(base64_encode($hasil));
    }
    function decrypt($str){
      $str = base64_decode(urldecode($str));
      $hasil = '';
      $kunci = 'lfeACPWr47TMuhFR1H7qy7JYLOgxOTRN2tnegt5F';
      for ($i = 0; $i < strlen($str); $i++) {
          $karakter = substr($str, $i, 1);
          $kuncikarakter = substr($kunci, ($i % strlen($kunci))-1, 1);
          $karakter = chr(ord($karakter)-ord($kuncikarakter));
          $hasil .= $karakter;
      }
      return $hasil;
    }


}

 ?>
