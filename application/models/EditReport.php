<?php
//@author kevindebugging
class EditReport extends CI_Model {

  public function getResult(){
    $this->db->select('*');
    $this->db->from('result');

    return $this->db->get()->result_array();
  }

  public function getReportData($id){
    $this->db->select('assessment.id_assessment, assessment.priority_task, assessment.summary, domain.url, section_result.id_section, section_result.result as section_score, point_check.id_point, point_check.status, result.id_result, result.result');

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

  public function updatePriorityTaskAndSummary($id_assessment, $priority, $summary){
    $data = array(
               'priority_task' => $priority,
               'summary'       => $summary
            );
    $this->db->where('id_assessment', $id_assessment);
    $this->db->update('assessment', $data);
  }

  public function updateSectionResult($section_result){
    $data = array(
               'result' => $section_result['result']
            );
    // $this->db->update_batch('section_result', $data, 'id_assessment');
    $this->db->where('id_assessment', $section_result["id_assessment"]);
    $this->db->where('id_section', $section_result["id_section"]);

    $this->db->update('section_result', $data);
  }

  public function updatePointResult($point_result){
    $data = array(
               'result' => $point_result['result']
            );
    // $this->db->update_batch('section_result', $data, 'id_assessment');
    $this->db->where('id_result', $point_result["id_result"]);
    //$this->db->where('id_section', $section_result["id_section"]);

    $this->db->update('result', $data);
  }

  public function getIdResult($id_assessment, $id_point){
    $this->db->select('id_result');
    $this->db->from('assessment_detail');
    $this->db->where('id_assessment', $id_assessment);
    $this->db->where('id_point', $id_point);

    $query = $this->db->get();

    if ($query->num_rows() > 0){
      $row = $query->row();
      $result = $row->id_result;
    }

    return $result;
  }

  public function deleteAssessmentDetail($id_assessment, $id_point){
    $this->db->where('id_assessment', $id_assessment);
    $this->db->where('id_point', $id_point);
    $this->db->delete('assessment_detail');
  }

  public function deleteResult($id_result){
    $this->db->where('id_result', $id_result);
    $this->db->delete('result');
  }

}
