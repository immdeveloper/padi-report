<?php
class TemplateReport extends CI_Controller {

  public function index()
  {
    // $data['news'] = $this->news_model->get_news();
    $data['title'] = 'Report PDF';

    //$this->load->view('templates/header', $data);
    $this->load->view('template-pdf/template-report', $data);
    //$this->load->view('templates/footer');

  }
}
