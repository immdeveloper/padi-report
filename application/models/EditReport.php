<?php
//@author kevindebugging
class EditReport extends CI_Model {

  public function getResult(){
    $this->db->select('*');
    $this->db->from('result');

    return $this->db->get()->result_array();
  }

  public function getReportData($id){
    $this->db->select('assessment.id_assessment, assessment.priority_task, assessment.summary, domain.url, section_result.id_section, section_result.result as section_score, point_check.id_point, point_check.status, result.result');

    $this->db->from('assessment');
    $this->db->join('domain', 'assessment.id_domain = domain.id_domain');
    $this->db->join('assessment_detail', 'assessment.id_assessment = assessment_detail.id_assessment');
    $this->db->join('point_check', 'point_check.id_point = assessment_detail.id_point');
    $this->db->join('section_result', 'point_check.id_section = section_result.id_section');
    $this->db->join('result', 'assessment_detail.id_result = result.id_result');
    //$this->db->join('section_result', 'section_result.id_section = section.id_section');
    $this->db->where('assessment.id_assessment', $id);
    $this->db->where('section_result.id_assessment', $id);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function updateSectionScore($id_assessment, $id_section, $score){
    $data = array(
               'result' => $score
            );
    // $this->db->update_batch('section_result', $data, 'id_assessment');
    $this->db->where('id_assessment', $id_assessment);
    $this->db->where('id_section', $id_section);

    $this->db->update('section_result', $data);
  }

}
