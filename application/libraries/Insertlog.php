<?php
// Function to insert log
class Insertlog
{
  function log($data) {
    $CI = &get_instance();
    $CI->load->library('Getip');
    $datas = array (
      'log' => $data .' Via ' . $CI->getip->fetchIP()
    );
      $a = &get_instance();
      $a->db->insert('tabel_log',$datas);
  }

}

 ?>
