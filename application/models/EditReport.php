<?php
//@author kevindebugging
class EditReport extends CI_Model {

  public function getResult(){
    $this->db->select('*');
    $this->db->from('result');

    return $this->db->get()->result_array();
  }
}
