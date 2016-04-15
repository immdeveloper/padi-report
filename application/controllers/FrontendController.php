<?php
class FrontendController extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['title'] = "PADI Report Frontend Page";

    $this->load->view('frontend/page', $data);
  }
}
?>
