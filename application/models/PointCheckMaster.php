<?php
class PointCheckMaster extends CI_Model {

  private $tbl_point = 'point_check';
  private $tbl_section = 'section';

  public function __construct()
  {
    parent::__construct();
  }

  public function getAll()
  {
    $this->db->distinct();
    $this->db->from($this->tbl_section);
    $this->db->join($this->tbl_point, 'section.id_section = point_check.id_section');
    $this->db->group_by('section.section_name');

    $query = $this->db->get();
    return $query->result_array();
  }

  public function getByCategory()
  {
    $this->db->select('*');
    $this->db->from($this->tbl_section);
    $this->db->join($this->tbl_point, 'section.id_section = point_check.id_section');
    $this->db->order_by('section.id_section', 'asc');

    $query = $this->db->get();
    return $query->result_array();
  }

  public function getById($id)
  {
    $this->db->select('*');
    $this->db->from($this->tbl_section);
    $this->db->join($this->tbl_point, 'section.id_section = point_check.id_section');
    $this->db->where('section.id_section', $id);
    $this->db->order_by('section.id_section', 'asc');
    $query = $this->db->get();
    if($query->num_rows() > 0)
        return $query->result();
  }

  public function getAllPoint()
  {
    $query = $this->db->get($this->tbl_point);
    return $query->result_array();
  }

  public function updateSection($id, $data)
  {
    $this->db->where('id_section', $id);
    $this->db->update($this->tbl_section, $data);
  }

  public function updatePoint($id, $data)
  {
    $this->db->where('id_point', $id);
    $this->db->update($this->tbl_point, $data);
  }

  public function storeSection($data)
  {
    $this->db->insert($this->tbl_section, $data);
    return $this->db->insert_id();
  }

  public function storePoint($data)
  {
    $this->db->insert($this->tbl_point, $data);
  }

}
