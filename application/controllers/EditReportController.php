<?php
class EditReportController extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('PointCheckMaster','',TRUE);
    $this->load->model('WebsiteReview','',TRUE);
    $this->load->model('EditReport','',TRUE);
    $this->load->helper('padi');
  }

  public function index($assessment_id)
  {
    //echo '' + $assessment_id;
    $join_result = $this->WebsiteReview->getSectionJoinPointCheck();
    $data = array();
    foreach ($join_result as $value) {
      $data[$value->section_cat][$value->section_name] = array(
        'id_section'          => $value->id_section,
        'section_slug'        => $value->section_slug,
        'section_desc'        => $value->section_desc,
        'section_why'         => $value->section_why,
        'section_importance'  => $value->section_importance,
        'section_difficulty'  => $value->section_difficulty,
      );
    }

    foreach ($join_result as $value) {
      $data[$value->section_cat][$value->section_name]['point'][] = array(
        'id_point'                => $value->id_point,
        'id_source'               => $value->id_source,
        'point_name'              => $value->point_name,
        'point_desc'              => $value->point_desc,
        'point_what_need_fixing'  => $value->point_what_need_fixing,
        'point_who_can_fix'       => $value->point_who_can_fix,
        'point_how_to_fix'        => $value->point_how_to_fix,
      );
    }

    $raw['data'] = $data;
    $raw['raws'] = $this->EditReport->getResult();
    $data['title'] = "Edit Report " . $assessment_id;
    $data['content'] = $this->load->view('frontend/content-templates/content-edit-report', $raw, TRUE);
    $this->load->view('frontend/page', $data);
  }

  public function report($id, $action)
  {
    $raw = $this->WebsiteReview->getReportData($id);
    $score = $this->WebsiteReview->getSectionScore($id);
    $tmp = array();

    $status = array();

    $sectionPrev = NULL;
    $section = array();
    $section_score = array();
    $overallcontentscore = 0;
    $socialintegrationscore = 0;
    $qualitysignalscore = 0;

    foreach ($raw as $key => $value) {
      if($value->section_name != $sectionPrev)
      {
        $section[] = $value->section_name;
      }
      $sectionPrev = $value->section_name;
    }

    foreach ($score as $key => $value) {
      $section_score[$section[$key]] = $value->section_score;
    }

    $overallcontentscore = ($section_score['Homepage Content'] + $section_score['Internal Page Content'] + $section_score['Blog / News Section'] + $section_score['Special Offers'] + $section_score['Content Management'] + $section_score['Indexed Pages']) / 6;
    $socialintegrationscore = ($section_score['Products Pages & Blog Pages'] + $section_score['Homepage']) / 2;
    $qualitysignalscore = ($section_score['Quality Signals'] + $section_score['Strong Company / About Us Quality']) / 2;

    foreach($raw as $arg)
    {
        $tmp[$arg->section_cat][$arg->section_name] = array(
          'section_score'       => $section_score[$arg->section_name],
          'section_desc'        => $arg->section_desc,
          'section_slug'        => $arg->section_slug,
          'section_why'         => $arg->section_why,
          'section_importance'  => $arg->section_importance,
          'section_difficulty'  => $arg->section_difficulty
        );
    }

    foreach ($raw as $arg) {
      $tmp[$arg->section_cat][$arg->section_name]['point'][] = array(
        'point_name' =>  $arg->point_name,
        'result'     =>  $arg->point_result
      );
    }

    $status['url'] = $raw[0]->url;
    $status['date'] = $raw[0]->date;
    $status['overallcontentscore'] = floor($overallcontentscore);
    $status['socialintegrationscore'] = floor($socialintegrationscore);
    $status['qualitysignalscore'] = floor($qualitysignalscore);
    $data['point'] = $tmp;
    $data['status'] = $status;
    $data['action'] = $action;

    if($action == 'preview')
    {
      $data['title'] = "Report Preview";
      $this->load->view('pdf/index', $data);
    }
    elseif($action == 'generate')
    {
      $date = date('j<\s\up>S</\s\up> F Y', strtotime($status['date']));
      $filedate = date('j F Y', strtotime($status['date']));
      $filename = 'PADI-website-review-'.$status['url']. ' ('.$filedate.')';
      $data['title'] = "Report for ". $status['url'].', '.$date;
      generate_pdf($this->load->view('pdf/index', $data, true), $filename);
    }

  }

  public function getPriorityType($type)
  {
    $data = $this->WebsiteReview->getPriorityType($type);
    $this->output->set_content_type('application/json');
    echo json_encode($data);
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
              'result'    => json_encode($result, JSON_UNESCAPED_UNICODE)
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
    echo $id_assessment;
  }
}
//$formatted_url = str_ireplace('www.', '', parse_url($url_to_format, PHP_URL_HOST));
?>
