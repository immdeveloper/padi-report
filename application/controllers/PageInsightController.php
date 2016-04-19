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
      $point[$i]['id_point'][$i] = $query[$i]['id_point'];
      $point[$i]['id_source'][$i] = $query[$i]['id_source'];
      $point[$i]['point_desc'][$i] = $query[$i]['point_desc'];
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
    //get url that being assess
    $hidden_url = $this->input->post('hidden-url');

    //get domain id from the url or insert new domain if doesn't exist
    $domain_id = $this->PageInsight->getDomainId($hidden_url);
    if($domain_id == "null"){
      $domain_id = $this->PageInsight->insertNewDomain($hidden_url);
    }

    // insert new assessment with current time and date
    $date = date("Y-m-d H:i:s");
    $id_assessment = $this->PageInsight->insertNewAssessment($domain_id, $date);

    // loop through post value
    $post_input = $this->input->post();
    foreach ($post_input as $key => $value) {

        $id_point = $key;
        $result = array();

        // if the submitted value is on or off, set the result variable
        if($value == "on"){
          $result["point_what_need_fixing"] = $post_input["explanation-" . $key];
          $result["point_who_can_fix"] = $post_input["who-fix-" . $key];
          $result["point_how_to_fix"] = $post_input["how-fix-" . $key];
        }else if ($value == "off"){
          $result["description"] = $post_input["description-" . $key];
        }

        //if result is not empty, insert data to table result and assessment_detail
        if(!empty($result)){
          $id_source = $post_input["source-" . $key];
          $data = array(
              'id_source' => $id_source,
              'result'    => json_encode($result)
            );
          $id_result = $this->PageInsight->insertNewResult($data);
          $data = array(
              'id_assessment' => $id_assessment,
              'id_point'      => $id_point,
              'id_result'     => $id_result
            );
          $id_assessment_detail = $this->PageInsight->insertNewAssessmentDetail($data);
        }
    }

    echo json_encode( $hidden_url );
    // echo json_encode( $result );
  }
}
//$formatted_url = str_ireplace('www.', '', parse_url($url_to_format, PHP_URL_HOST));
?>
