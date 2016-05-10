<?php
class Report extends CI_Model {

  public function __construct()
  {
    parent::__construct();
  }

  public function getAllDomain()
  {
    $this->db->select('id_domain, url');
    $this->db->from('domain');
    $query = $this->db->get();
    return $query->result();
  }

  public function getReportInfo($id)
  {
    $this->db->select('url, date, id_assessment');
    $this->db->from('domain');
    $this->db->join('assessment', 'domain.id_domain = assessment.id_domain');
    $this->db->where('assessment.id_domain', $id);
    $this->db->order_by('assessment.date', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

  public function getReportList($id)
  {
    
  }
}
