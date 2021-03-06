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
    $data['title'] = "Website Review";
    $data['content'] = $this->load->view('frontend/content-templates/content-analyze-result', $raw, TRUE);
    $this->load->view('frontend/page', $data);
  }

  public function imageUpload()
  {
    if($this->input->post('old-file') !== null)
    {
      $old_file = $this->input->post('old-file');
      $path = './assets/images/uploads/'.$old_file;
      if(file_exists($path))
      {
          unlink($path);
      }
    }

    $config['upload_path']      = './assets/images/uploads';
    $config['allowed_types']    = 'gif|jpg|png';
    $config['encrypt_name']     = TRUE;
    $config['max_size']         = 1024;

    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    $data = array();

    if ( ! $this->upload->do_upload('image'))
    {
        $data['result'] = $this->upload->display_errors();
    }
    else
    {
        $data['result'] = $this->upload->data();
    }

    header('Content-type: application/json');
    echo json_encode($data);

  }

  public function report($id, $action)
  {
    $raw = $this->WebsiteReview->getReportData($id);
    $score = $this->WebsiteReview->getSectionScore($id);
    $importance = $this->WebsiteReview->getSectionImportance();
    $tmp = array();

    $status = array();

    $sectionPrev = NULL;
    $section = array();
    $section_score = array();
    $overallcontentscore = 0;
    $socialintegrationscore = 0;
    $qualitysignalscore = 0;

    /*Insert all section name to array section[]*/
    foreach ($raw as $key => $value) {
      if($value->section_name != $sectionPrev)
      {
        $section[] = $value->section_name;
      }
      $sectionPrev = $value->section_name;
    }

    /*Insert all section score & importance to arrau section_score[]*/
    foreach ($score as $key => $value) {
      $section_score[$section[$key]] = array(
        'score'       => $value->section_score,
        'importance'  => $importance[$key]->section_importance
      );
    }

    /*Make score object to pure array*/
    $score_raw = array();
    foreach ($score as $key => $value) {
      $score_raw[] = $value->section_score;
    }

    /*Make importance object to pure array*/
    $importance_raw = array();
    foreach ($importance as $key => $value) {
      $importance_raw[] = $value->section_importance;
    }

    /*Get Overall Content Score Average & Importance Average*/
    $overallcontentscore = ($section_score['Homepage Content']['score'] + $section_score['Internal Page Content']['score'] + $section_score['Blog / News Section']['score'] + $section_score['Special Offers']['score'] + $section_score['Content Management']['score'] + $section_score['Indexed Pages']['score']) / 6;
    $overallcontentsimp = 9;
    $content_average = $overallcontentscore * $overallcontentsimp;
    unset($score_raw[11]); unset($score_raw[12]); unset($score_raw[13]); unset($score_raw[14]); unset($score_raw[15]); unset($score_raw[16]);
    unset($importance_raw[11]); unset($importance_raw[12]); unset($importance_raw[13]); unset($importance_raw[14]); unset($importance_raw[15]); unset($importance_raw[16]);
    $score_raw[11] = $overallcontentscore;
    $importance_raw[11] = $overallcontentsimp;

    /*Get Social Integration Score Average & Importance Average*/
    $socialintegrationscore = ($section_score['Products Pages & Blog Pages']['score'] + $section_score['Homepage']['score']) / 2;
    $socialintegrationimp = 7;
    $social_average = $socialintegrationscore * $socialintegrationimp;
    unset($score_raw[17]); unset($score_raw[18]);
    unset($importance_raw[17]); unset($importance_raw[18]);
    $score_raw[12] = $socialintegrationscore;
    $importance_raw[12] = $socialintegrationimp;

    /*Get Quality Signal Score Average & Importance Average*/
    $qualitysignalscore = ($section_score['Quality Signals']['score'] + $section_score['Strong Company / About Us Quality']['score']) / 2;
    $qualitysignalimp = 9;
    $quality_average = $qualitysignalscore * $qualitysignalimp;
    unset($score_raw[19]); unset($score_raw[20]);
    unset($importance_raw[19]); unset($importance_raw[20]);
    $score_raw[13] = $qualitysignalscore;
    $importance_raw[13] = $qualitysignalimp;

    $score_raw[14] = $score_raw[21];
    $score_raw[15] = $score_raw[22];

    $importance_raw[14] = $importance_raw[21];
    $importance_raw[15] = $importance_raw[22];

    unset($score_raw[21]); unset($score_raw[22]);
    unset($importance_raw[21]); unset($importance_raw[22]);

    $all_score_avg = 0;
    $all_importance_avg = 0;

    /*Get Score average*/
    foreach ($score_raw as $key => $value) {
      $all_score_avg += $value * $importance_raw[$key];
    }

    /*Get Importance average*/
    foreach ($importance_raw as $key => $value) {
      $all_importance_avg += $value;
    }

    /*Calculate final score (score average / impotance average)*/
    $final_score = floor($all_score_avg / $all_importance_avg);

    /*Make a structured data for section detail with all metadata*/
    foreach($raw as $arg)
    {
        $tmp[$arg->section_cat][$arg->section_name] = array(
          'section_score'       => $section_score[$arg->section_name]['score'],
          'section_desc'        => $arg->section_desc,
          'section_slug'        => $arg->section_slug,
          'section_why'         => $arg->section_why,
          'section_importance'  => $arg->section_importance,
          'section_difficulty'  => $arg->section_difficulty
        );
    }

    /*Make a structured data for point name & result for each section*/
    foreach ($raw as $arg) {
      $tmp[$arg->section_cat][$arg->section_name]['point'][] = array(
        'point_name' =>  $arg->point_name,
        'result'     =>  $arg->point_result
      );
    }

    $status['url'] = $raw[0]->url;
    $status['date'] = $raw[0]->date;
    $status['priority'] = $raw[0]->priority_task;
    $status['summary'] = $raw[0]->summary;
    $status['overallcontentscore'] = floor($overallcontentscore);
    $status['socialintegrationscore'] = floor($socialintegrationscore);
    $status['qualitysignalscore'] = floor($qualitysignalscore);
    $data['point'] = $tmp;
    $data['status'] = $status;
    $data['action'] = $action;
    $data['total_score'] = $final_score;

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
    $summary = $this->input->post('report-summary');

    /*Get all priority task*/
    $priority = array();
    $priority_count = count($this->input->post('priority-what'));
    for ($i=0; $i < $priority_count; $i++)
    {
      $priority[$i] = array(
        'priority_what' => $this->input->post('priority-what')[$i],
        'priority_why'  => $this->input->post('priority-why')[$i],
        'priority_how'  => $this->input->post('priority-how')[$i]
      );
    }

    $data_assessment = array(
        'id_domain'     => $id_domain,
        'date'          => $date,
        'priority_task' => json_encode($priority, JSON_UNESCAPED_UNICODE),
        'summary'       => $summary
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
