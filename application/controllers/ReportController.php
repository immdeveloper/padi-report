<?php
class ReportController extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Report', '', TRUE);
  }

  public function index()
  {
    $domain = $this->Report->getAllDomain();
    $content = array();
    $date = '';

    foreach ($domain as $key => $value) {
      if(isset($this->Report->getReportInfo($value->id_domain)[0]))
      {
        $date = $this->Report->getReportInfo($value->id_domain)[0]->date;
      }
      else
      {
        $date = 'No review performed yet';
      }

      $content[] = array(
        'id_domain'     => $value->id_domain,
        'url'           => $value->url,
        'report_count'  => count($this->Report->getReportInfo($value->id_domain)),
        'last_report'   => $date
      );
    }

    $data['title'] = 'Report Management';
    $raw['content'] = $content;
    $data['content'] = $this->load->view('frontend/content-templates/content-website-list', $raw, TRUE);
    $this->load->view('frontend/page', $data);
  }

  public function show_report($id)
  {
    $data['title'] = 'Report Management';
    $raw['content'] = $this->Report->getReportInfo($id);
    $data['content'] = $this->load->view('frontend/content-templates/content-report-list', $raw, TRUE);
    $this->load->view('frontend/page', $data);
  }
}
?>
