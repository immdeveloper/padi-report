<?php
class BackendController extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['title'] = "Dashboard";
    $data['content'] = $this->load->view('backend/content-templates/content-home', NULL, TRUE);

    $this->load->view('backend/page', $data);
  }
}
?>
