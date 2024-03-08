<?php
// Function to get the client IP address
class Fungsi
{
  function cekUrl($url)
  {
      if($url == NULL) return false;
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_TIMEOUT, 5);
      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $data = curl_exec($ch);
      $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
      curl_close($ch);
      if($httpcode>=200 && $httpcode<300){
          return true;
      } else {
          return false;
      }
  }

  function ping($host, $port, $timeout) {
  $tB = microtime(true);
  $fP = fSockOpen($host, $port, $errno, $errstr, $timeout);
  if (!$fP) { return "down"; } 
  $tA = microtime(true);
  return round((($tA - $tB) * 1000), 0)." ms";
}

}

 ?>
