<?php
class FrontendController extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['title'] = "Website Review";
    $data['content'] = $this->load->view('frontend/content-templates/content-home', NULL, TRUE);
    $this->load->view('frontend/page-home', $data);
  }
}
?>
