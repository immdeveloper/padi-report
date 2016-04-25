<?php
//@author kevindebugging
class WebsiteReview extends CI_Model {

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

  //insert new personal judgement
  public function insertNewPersonalPoint($data)
  {
    $this->db->insert('point_check', $data);
    return $this->db->insert_id();
  }

  //insert new section score
  public function insertNewSectionResult($data)
  {
    $this->db->insert('section_result', $data);
    return $this->db->insert_id();
  }

  //Get distinct section category
  public function getSectionCategory(){
    $this->db->distinct();
    $this->db->select('section_cat');
    $this->db->from('section');

    return $this->db->get()->result_array();
  }

  //Get all section
  public function getAllSection(){
    $this->db->select('*');
    $this->db->from('section');

    return $this->db->get()->result_array();
  }

  public function getAllPointCheck(){
    $this->db->select('*');
    $this->db->from('point_check');
    $this->db->where('status', 0);

    return $this->db->get()->result_array();
  }

  public function getReportData(){
    $this->db->select('section_name, section_cat, date, url, point_name, result');
    $this->db->from('assessment_detail');
    $this->db->join('assessment', 'assessment_detail.id_assessment = assessment.id_assessment');
    $this->db->join('point_check', 'assessment_detail.id_point = point_check.id_point');
    $this->db->join('domain', 'assessment.id_domain = domain.id_domain');
    $this->db->join('section', 'point_check.id_section = section.id_section');
    $this->db->join('result', 'assessment_detail.id_result = result.id_result');
    $this->db->where('assessment.id_assessment', 154);
    $query = $this->db->get();
    return $query->result();
  }

}

// foreach ($query->result() as $row)
// {
//   echo $row->title;
//   echo $row->name;
//   echo $row->body;
// }
