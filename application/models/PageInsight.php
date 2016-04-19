<?php
//@author kevindebugging
class PageInsight extends CI_Model {

  public function __construct()
  {
    parent::__construct();
  }

  //Get domain id by url
  public function getDomainId($url){
    $this->db->select('id_domain');
    $this->db->from('domain');
    $this->db->where('url', $url);

    $query = $this->db->get();

    if ($query->num_rows() > 0){
      $row = $query->row();
      $result = $row->id_domain;
    }
    else{
      $result = "null";
    }

    return $result;
  }

  //insert new domain url
  public function insertNewDomain($data_url){
    $this->db->insert('domain', $data_url);
    return $this->db->insert_id();
  }

  //insert new assessment
  public function insertNewAssessment($data_assessment){
        $this->db->insert('assessment', $data_assessment);
    return $this->db->insert_id();
  }

  //insert new result
  public function insertNewResult($data){
    $this->db->insert('result', $data);
    return $this->db->insert_id();
  }

  //insert new assessment detail
  public function insertNewAssessmentDetail($data){
    $this->db->insert('assessment_detail', $data);
    return $this->db->insert_id();
  }
}

// foreach ($query->result() as $row)
// {
//   echo $row->title;
//   echo $row->name;
//   echo $row->body;
// }
