<?php
class PointCheckMasterController extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('PointCheckMaster','',TRUE);
  }

  public function index()
  {
    /*if(isset($this->input->get('action')))
    {
      $action =  $this->input->get('action');
      $id = $this->input->get('id');

    }*/
    $query['content_data'] = $this->PointCheckMaster->getAll();

    $data['title'] = "POINT CHECK MASTER";
    $data['content'] = $this->load->view('backend/content-templates/content-show-point-check', $query, TRUE);
    $this->load->view('backend/page', $data);
  }

  public function add()
  {
    $data['title'] = "ADD POINT CHECK MASTER";
    $data['content'] = $this->load->view('backend/content-templates/content-add-point-check', NULL, TRUE);
    $this->load->view('backend/page', $data);
  }

  public function edit($id)
  {
    $query['content_data'] = $this->PointCheckMaster->getById($id);

    $data['title'] = "EDIT POINT CHECK MASTER";
    $data['content'] = $this->load->view('backend/content-templates/content-edit-point-check', $query, TRUE);
    $this->load->view('backend/page', $data);
  }

  public function update($id)
  {
    $section = array(
      'section_name'  => $this->input->post('section-name'),
      'section_slug'  => $this->input->post('section-slug'),
      'section_desc'  => $this->input->post('section-desc'),
      'section_cat'   => $this->input->post('section-cat')
    );

    $this->PointCheckMaster->updateSection($id, $section);

    for ($i=0;  $i < count($this->input->post('point_check_name')) ; $i++) {
      $id_point[$i] = $this->input->post('id_point')[$i];
      $point = array(
        'point_name'              => $this->input->post('point_check_name')[$i],
        'point_desc'              => $this->input->post('point_desc')[$i],
        'point_what_need_fixing'  => $this->input->post('point_what_need_fixing')[$i],
        'point_who_can_fix'       => $this->input->post('point_who_can_fix')[$i],
        'point_how_to_fix'        => $this->input->post('point_how_to_fix')[$i],
      );

      if($id_point[$i] != '')
      {
        $this->PointCheckMaster->updatePoint($id_point[$i], $point);
      }
      else
      {
        $point['id_section'] = $id;
        $this->PointCheckMaster->storePoint($point);
      }

    }

    //$this->session->flashdata('flash_msg', 'Point check successfully saved');
    redirect(base_url().'admin/point-check-master');
  }

  public function store()
  {
    $section = array(
      'section_name'  => $this->input->post('section-name'),
      'section_slug'  => $this->input->post('section-slug'),
      'section_desc'  => $this->input->post('section-desc'),
      'section_cat'   => $this->input->post('section-cat')
    );

    $id = $this->PointCheckMaster->storeSection($section);

    for ($i=0;  $i < count($this->input->post('point_check_name')) ; $i++) {
      $point = array(
        'point_name'              => $this->input->post('point_check_name')[$i],
        'point_desc'              => $this->input->post('point_desc')[$i],
        'point_what_need_fixing'  => $this->input->post('point_what_need_fixing')[$i],
        'point_who_can_fix'       => $this->input->post('point_who_can_fix')[$i],
        'point_how_to_fix'        => $this->input->post('point_how_to_fix')[$i],
        'id_section'              => $id
      );
      $this->PointCheckMaster->storePoint($point);
    }

    $this->session->flashdata('flash_msg', 'Point check successfully saved');
    redirect(base_url().'admin/point-check-master/add');
  }
}
?>
