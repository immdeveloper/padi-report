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
    $test = $this->WebsiteReview->getTest();
    $data = array();
    foreach ($test as $value) {
      $data[$value->section_cat][$value->section_name] = array(
        'id_section'          => $value->id_section,
        'section_slug'        => $value->section_slug,
        'section_desc'        => $value->section_desc,
        'section_why'         => $value->section_why,
        'section_importance'  => $value->section_importance,
        'section_difficulty'  => $value->section_difficulty,
      );
    }

    foreach ($test as $value) {
      $data[$value->section_cat][$value->section_name]['point'][] = array(
        'id_point'                => $value->id_point,
        'id_source'               => $value->id_source,
        'point_name'              => $value->point_name,
        'point_desc'              => $value->point_desc,
        'point_what_need_fixing'  => $value->point_what_need_fixing,
        'point_how_to_fix'        => $value->point_how_to_fix,
        'point_who_can_fix'       => $value->point_who_can_fix
      );
    }

    $raw['data'] = $data;
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
        //$tmp[$arg->section_cat][$arg->section_name][$arg->point_name][] = $arg->result;
        $tmp[$arg->section_cat][$arg->section_name][] = $arg->point_name;
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
