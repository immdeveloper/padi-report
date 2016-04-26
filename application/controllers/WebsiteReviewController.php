<?php
class WebsiteReviewController extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('PointCheckMaster','',TRUE);
    $this->load->model('WebsiteReview','',TRUE);
    $this->load->helper('padi');
  }

  public function index()
  {

    $section_category = $this->WebsiteReview->getSectionCategory();
    $section = $this->WebsiteReview->getAllSection();
    $point_check = $this->WebsiteReview->getAllPointCheck();

    foreach ($point_check as $row){
      if ($row['id_section'] == 2) {
        array_push($section[0], $row);
      }elseif($row['id_section'] == 3){
        array_push($section[1], $row);
      }elseif($row['id_section'] == 4){
        array_push($section[2], $row);
      }elseif($row['id_section'] == 5){
        array_push($section[3], $row);
      }elseif($row['id_section'] == 6){
        array_push($section[4], $row);
      }elseif($row['id_section'] == 7){
        array_push($section[5], $row);
      }elseif($row['id_section'] == 8){
        array_push($section[6], $row);
      }elseif($row['id_section'] == 9){
        array_push($section[7], $row);
      }elseif($row['id_section'] == 10){
        array_push($section[8], $row);
      }elseif($row['id_section'] == 11){
        array_push($section[9], $row);
      }elseif($row['id_section'] == 12){
        array_push($section[10], $row);
      }elseif($row['id_section'] == 13){
        array_push($section[11], $row);
      }elseif($row['id_section'] == 14){
        array_push($section[12], $row);
      }elseif($row['id_section'] == 15){
        array_push($section[13], $row);
      }elseif($row['id_section'] == 16){
        array_push($section[14], $row);
      }elseif($row['id_section'] == 17){
        array_push($section[15], $row);
      }elseif($row['id_section'] == 18){
        array_push($section[16], $row);
      }elseif($row['id_section'] == 19){
        array_push($section[17], $row);
      }elseif($row['id_section'] == 20){
        array_push($section[18], $row);
      }elseif($row['id_section'] == 21){
        array_push($section[19], $row);
      }elseif($row['id_section'] == 22){
        array_push($section[20], $row);
      }elseif($row['id_section'] == 23){
        array_push($section[21], $row);
      }elseif($row['id_section'] == 24){
        array_push($section[22], $row);
      }
    }

    foreach ($section as $row){
      if ($row['section_cat'] == 'site structure') {
        array_push($section_category[0], $row);
      }elseif($row['section_cat'] == 'seo'){
        array_push($section_category[1], $row);
      }elseif($row['section_cat'] == 'ranking'){
        array_push($section_category[2], $row);
      }elseif($row['section_cat'] == 'content management'){
        array_push($section_category[3], $row);
      }elseif($row['section_cat'] == 'social integration'){
        array_push($section_category[4], $row);
      }elseif($row['section_cat'] == 'quality/retention/convertion'){
        array_push($section_category[5], $row);
      }
    }

    $test = $this->WebsiteReview->getTest();
    $final = array();
    foreach ($test as $value) {
      $final[$value->section_cat][$value->section_name][$value->point_name][] = array(
        'what_need_fixing'  => $value->point_what_need_fixing,
        'description'       => $value->point_desc,
        'how_to_fix'        => $value->point_how_to_fix,
        'who_can_fix'       => $value->point_who_can_fix
      );
    }

    $raw['raw'] = $section_category;
    $raw['final'] = $final;
    $data['title'] = "Analyze Testing";
    $data['content'] = $this->load->view('frontend/content-templates/content-analyze-result', $raw, TRUE);
    $this->load->view('frontend/page', $data);
  }

  public function report($action)
  {
    $raw = $this->WebsiteReview->getReportData();
    $tmp = array();

    $status = array();

    $status['url'] = $raw[0]->url;
    $status['date'] = $raw[0]->date;

    foreach($raw as $arg)
    {
        $tmp[$arg->section_cat][$arg->section_name][$arg->point_name][] = $arg->result;
    }

    $data['point'] = $tmp;
    $data['status'] = $status;
    $data['action'] = $action;
    $data['title'] = "Report Preview";

    if($action == 'preview')
    {
      $this->load->view('pdf/index', $data);
    }
    elseif($action == 'generate')
    {
      generate_pdf($this->load->view('pdf/index', $data, true), 'pdf-report');
    }

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
    $id_domain = $this->WebsiteReview->getDomainId($hidden_url);
    if($id_domain == "null"){
      $data_url = array(
          'url' => $hidden_url
        );
      $id_domain = $this->WebsiteReview->insertNewDomain($data_url);
    }

    // insert new assessment with current time and date
    $date = date("Y-m-d H:i:s");
    $data_assessment = array(
        'id_domain' => $id_domain,
        'date'      => $date
      );
    $id_assessment = $this->WebsiteReview->insertNewAssessment($data_assessment);

    // loop through post value
    $post_input = $this->input->post();
    $result = array();
    $personal = array();
    $i = 0;
    foreach ($post_input as $name => $value) {//$name is the field name //$value is the field value
        $id_point = $name;
        // if the submitted value is on or off, set the result variable
        if($value == "on"){//if point is checked = need to fix
          $result["point_what_need_fixing"] = $post_input["explanation-" . $name];
          $result["point_who_can_fix"] = $post_input["who-fix-" . $name];
          $result["point_how_to_fix"] = $post_input["how-fix-" . $name];

          $id_source = $post_input["source-" . $name];
        }else if ($value == "off"){//if point is not checked = no need to fix
          $result["description"] = $post_input["description-" . $name];

          $id_source = $post_input["source-" . $name];
        }else if ($value == "personal"){ //personal judgement
          $result["id_source"] = $GLOBALS['MANUAL_SOURCE'];
          $result["id_section"] = $post_input["id-section-" . $name];
          $result["point_name"] = $post_input["name-" . $name];
          $result["point_what_need_fixing"] = $post_input["explanation-" . $name];
          $result["point_who_can_fix"] = $post_input["who-fix-" . $name];
          $result["point_how_to_fix"] = $post_input["how-fix-" . $name];
          $result["status"] = $GLOBALS['PERSONAL_JUDGEMENT_POINT'];

          $id_point = $this->WebsiteReview->insertNewPersonalPoint($result);
          $id_source = $result["id_source"];
        }else if ($value == "section-score"){
          $section_result["id_section"] = $post_input["section-id-" . $name];
          $section_result["id_assessment"] = $id_assessment;
          $section_result["result"] = $post_input["score-" . $name];
          $this->WebsiteReview->insertNewSectionResult($section_result);
        }

        //if result is not empty, insert data to result table and assessment_detail table
        if(!empty($result)){
          $data = array(
              'id_source' => $id_source,
              'result'    => json_encode($result)
            );
          $id_result = $this->WebsiteReview->insertNewResult($data);
          $data = array(
              'id_assessment' => $id_assessment,
              'id_point'      => $id_point,
              'id_result'     => $id_result
            );
          $id_assessment_detail = $this->WebsiteReview->insertNewAssessmentDetail($data);
          $result = array();
        }
    }
// $personal["key"] = 3;
    // echo json_encode( $id_point );
    // echo json_encode($score);
    echo json_encode( $result );
  }
}
//$formatted_url = str_ireplace('www.', '', parse_url($url_to_format, PHP_URL_HOST));
?>
