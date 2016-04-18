<?php
class PageInsightController extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('PointCheckMaster','',TRUE);
    $this->load->model('PageInsight','',TRUE);
  }

  public function index()
  {
    $name = array();
    $desc = array();
    $slug = array();
    $cat = array();
    $point = array();
    $id = array();
    $final = array();
    $query = $this->PointCheckMaster->getByCategory();

    /*Loop data from model and move each row from same column to different array*/
    for ($i=0; $i < count($query); $i++) {
      /*Prevent duplicate array value*/
      if(!in_array($query[$i]['section_name'], $name, true))
      {
        array_push($name, $query[$i]['section_name']);
        array_push($desc, $query[$i]['section_desc']);
        array_push($slug, $query[$i]['section_slug']);
        array_push($cat, $query[$i]['section_cat']);
        array_push($id, $query[$i]['id_section']);
      }

      /*Insert point check to an array*/
      $point[$i]['point_name'][$i] = $query[$i]['point_name'];
      $point[$i]['point_what_need_fixing'][$i] = $query[$i]['point_what_need_fixing'];
      $point[$i]['point_how_to_fix'][$i] = $query[$i]['point_how_to_fix'];
      $point[$i]['point_who_can_fix'][$i] = $query[$i]['point_who_can_fix'];
      $point[$i]['id_section'] = $query[$i]['id_section'];
    }

    /*Basically this is data mapping to restructure data for better structure*/
    for ($i=0; $i < count($name); $i++) {
        $final[$i]['section_name'] = $name[$i];
        $final[$i]['section_desc'] = $desc[$i];
        $final[$i]['section_slug'] = $slug[$i];
        $final[$i]['section_cat'] = $cat[$i];
        $final[$i]['id_section'] = $id[$i];
    }

    $raw['section'] = $final;
    $raw['point'] = array_reverse($point, true);
    $raw['test'] = $final;
    $data['title'] = "Analyze Testing";
    $data['content'] = $this->load->view('backend/content-templates/content-analyze-result', $raw, TRUE);
    $this->load->view('backend/page', $data);
  }

  public function run()
  {
    $url = $this->input->post('url');
    //$data['google_page_index_result'] = $this->analyze->get_page_index($url)['google'];
    //$data['bing_page_index_result'] = $this->analyze->get_page_index($url)['bing'];
    $data['google_page_index_result'] = "XXXX";
    $data['bing_page_index_result'] = "XXXX";
    $this->output->set_content_type('application/json');
    echo json_encode( $data );
  }

  public function scrape()
  {
    $data = $this->analyze->get_page_index('dfsdf');
    echo $data['google'];
    echo $data['bing'];
  }

  public function save()
  {
    $data['check-user-experience0'] = $this->input->post('check-user-experience0');
    $data['check-user-experience1'] = $this->input->post('check-user-experience1');
    $data['check-user-experience2'] = $this->input->post('check-user-experience2');
    $data['check-user-experience3'] = $this->input->post('check-user-experience3');
    $data['check-user-experience4'] = $this->input->post('check-user-experience4');
    $data['check-navigation5'] = $this->input->post('check-navigation5');
    $data['check-navigation6'] = $this->input->post('check-navigation6');
    $data['check-navigation7'] = $this->input->post('check-navigation7');
    $data['check-navigation8'] = $this->input->post('check-navigation8');
    $data['web-url'] = $this->input->post('web-url');
    $data['hidden-url'] = $this->input->post('hidden-url');
    $data['post-data'] = $this->input->post();

    $data['checked'] = "null!";
    if($data['check-user-experience4'] != null){
      $data['checked'] = "checked!";
    }
    $data['save'] = "savee";

    $domainId = $this->PageInsight->getDomainId($data['hidden-url']);
    if($domainId == "null"){
      $this->PageInsight->insertNewDomain($data['hidden-url']);
      $domainId = $this->PageInsight->getDomainId($data['hidden-url']);
      // $domainId = "null2";
    }
    $data['domain-id'] = $domainId;

    echo json_encode( $data );
  }
}
?>
