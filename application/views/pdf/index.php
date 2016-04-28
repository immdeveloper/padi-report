<?php
//ini_set('max_execution_time', 300);
//ini_set('memory_limit', '-1');
//echo '<pre>';
//print_r($point);
//echo '</pre>';

?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/reset.css'?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/pdf-style.css'?>" type="text/css" />
    <?php
      if($action == 'preview')
      {
        echo '<link rel="stylesheet" href="'.base_url().'assets/css/preview-pdf.css" type="text/css" />';
      }
    ?>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/font-awesome.min.css'?>" type="text/css" />
  </head>
  <body>
    <?php
      if($action == 'preview')
      {
        require_once('pdf-top-bar.php');
        echo '<div class="preload" style="display:none; background-image:url('.base_url().'assets/images/rolling.svg)">';
        echo '<span>Generating PDF, please wait...</span></div>';
      }
    ?>

    <!-- Header & Footer -->
    <div id="footer">
        <p><a href="https://www.islandmediamanagement.com" target="_blank">www.islandmediamanagement.com</a></p>
    </div>
    <div class="container">
      <section id="page-1">
        <img src="<?php echo base_url().'assets/images/logo.png'?>" alt="" width="230" height="138" class="logo" />
        <p class="first-page-imm">Island Media Management</p>
        <p class="first-page-title">Website review for <em><a href="http://www.<?php echo $status['url'] ?>" style="text-decoration:none"><?php echo $status['url'] ?></a></em>, <?php echo date('j<\s\up>S</\s\up> F Y', strtotime($status['date']));?></p>
        <div style="height:400px;"></div>
        <h2 class="heading">List of Contents</h2>
        <ul class="section-list">
          <li><span>Section 1:</span> <a href="#intro">Introduction</a></li>
          <li><span>Section 2:</span> <a href="#summary">Executive Summary</a></li>
          <?php
          $num = 3;
          foreach ($point as $category => $value) {
            if($category == 'seo')
            {
              $category = 'SEO Assessment';
            }
            echo '<li><span>Section '.$num.':</span> <a href="#category-'.$num.'">'.ucwords($category).'</a></li>';
            $num++;
          }

          ?>

      </section>

      <section>
        <h2 class="heading heading-section"><a name="intro">Section 1 – An Introduction to Island Media Management</a></h2>
        <p>
          This is an independent review of your website, <u><a href="http://www.<?php echo $status['url'] ?>" target="_blank"><?php echo $status['url'] ?></a></u>, performed by Island Media Management. IMM a marketing consulting firm based in Bali, Indonesia which is managed by experienced dive industry marketers who have also taught at all levels from Discover Scuba Diving up to Trimix Instructor. This review is meant to serve as a tool to help you see how your online marketing efforts can be improved in order to deliver sustainable results for your dive business.
        </p>
        <p>
          If you have any questions about the report you are welcome to contact us direct at
          <a href="mailto:info@islandmediamanagement.com">info@islandmediamanagement.com</a> where our team is ready and waiting to assist you.
        </p>
        <div style="height:10px"></div>
        <h2 class="heading sub-heading" style="font-size:14">How to use this report</h2>
        <p>
          This report is created in multiple sections for your ease of use.
        </p>
        <p>
          The first section is an executive summary that highlights some of the most important action points that need to be addressed in order for your website to improve with regards to search rankings, customer experience and conversion.
        </p>
        <p>
          The following sections go into more detail and provide you with information on what requires attention with the website and how you should remedy any issues.
        </p>
        <p>
          As you read this report you will notice certain symbols and formatting that have been used throughout to make it easier for you to understand.
        </p>
        <div class="result-table">
          <table>

            <tr>
              <td rowspan="3" style="vertical-align:middle; width:80" class="table-score-wrapper">
                <span class="table-score text-green">xx</span>
                <span>score %</span>
              </td>
              <td style="text-align:center; width:10">x/10</td>
              <td style="width:80">Importance</td>
              <td rowspan="2" style="vertical-align:middle"><strong>What is it?</strong> A brief explanation of what this item is.</td>
            </tr>
            <tr>
              <td style="text-align:center">x/10</td>
              <td>Difficulty level</td>
            </tr>
            <tr>
              <td style="text-align:center">na</td>
              <td>Last review score</td>
              <td><strong>Why is it important?</strong> What it means to your site’s success.</td>
            </tr>
          </table>
        </div>
        <table class="detail-list">
          <tr>
            <td style="width:100"><span>What’s working?</span></td>
            <td><span class="icon">&#xf00c;</span> - We will tell you what aspects are working.</td>
          </tr>
          <tr>
            <td><span>What needs fixing?</span></td>
            <td><span class="icon">&#xf096;</span> - We will also tell you what aspects need our attention.</td>
          </tr>
          <tr>
            <td><span>Who can fix it?</span></td>
            <td><span class="icon">&#xf183;</span> - Basic user / webmaster / programmer</td>
          </tr>
          <tr>
            <td><span>How do you fix it?</span></td>
            <td><span class="icon">&#xf046;</span> - We will tell you how to get the problem fixed, allowing you to determine if you can do it in-house, or if you need to outsource the service.</td>
          </tr>
        </table>
        <p>
          An Item with a low overall score and a high importance score should be deemed as a high priority. Some items may carry a score for your competition in this area, where it is relevant, or required. In instances where we are performing a follow-up review, we will track your progress by comparing your current scores to the "last review scores."
        </p>
      </section>
      <section>
        <?php
        $score = array();
          foreach ($point as $key => $value) {
            foreach ($value as $section => $result) {
              $score[$section] = $result['section_score'];
            }
          }
        ?>
        <h2 class="heading heading-section"><a name="summary"><span>Section 2:</span> Executive Summary</a></h2>
        <h2 class="heading sub-heading" style="margin-bottom:3px; padding-bottom:0">OVERALL SCORING SUMMARY:</h2>
        <div class="result-table" style="margin-bottom:5px">
        <table>
          <tr>
            <td style="vertical-align:middle" class="table-score-wrapper" rowspan="6">
              <span class="table-score text-red">xx</span>
              <span>score %</span>
            </td>
            <td class="number">NA</td>
            <td>Last Report Score</td>
            <td class="number"><?php echo $score['Meta Tags & Headings'] ?></td>
            <td>Meta Tags</td>
            <td class="number">xx</td>
            <td>Overall Content</td>
          </tr>
          <tr>
            <td class="number"><?php echo $score['User Experience'] ?></td>
            <td>User Experience</td>
            <td class="number"><?php echo $score['Images'] ?></td>
            <td>Images</td>
            <td class="number">xx</td>
            <td>Social Integration</td>
          </tr>
          <tr>
            <td class="number"><?php echo $score['Navigation'] ?></td>
            <td>Navigation</td>
            <td class="number"><?php echo $score['Text'] ?></td>
            <td>Text</td>
            <td class="number"><?php echo $score['Quality Signals'] ?></td>
            <td>Quality Signals</td>
          </tr>
          <tr>
            <td class="number"><?php echo $score['Search Engine Accessibility'] ?></td>
            <td>Search Assessibility</td>
            <td class="number"><?php echo $score['Link Profile'] ?></td>
            <td>Link Profile</td>
            <td class="number"><?php echo $score['Retention'] ?></td>
            <td>Retention</td>
          </tr>
          <tr>
            <td class="number"><?php echo $score['Internal Link Structure'] ?></td>
            <td>Link Structure</td>
            <td class="number"><?php echo $score['Hosting & Registration'] ?></td>
            <td>Hosting & Registration</td>
            <td class="number"><?php echo $score['Conversion'] ?></td>
            <td>Conversion</td>
          </tr>
          <tr>
            <td class="number"><?php echo $score['Page Speed'] ?></td>
            <td>Page Speed</td>
            <td class="number"><?php echo $score['Search Rankings'] ?></td>
            <td>Search Rankings</td>
            <td class="number"></td>
            <td></td>
          </tr>
        </table>
      </div>
      <p>Don't worry! Sure, there's some work to do, but we have prepared some simple steps to get you started in the right direction.</p>
      <p>Consider the following action points as the <strong>most important tasks</strong> that you should complete in order to have the greatest positive effects on your site’s performance.</p>
      <div class="result-table priority-table">
        <table>
          <tr>
            <td rowspan="3" class="table-score-wrapper">
              <span class="text-red text-priority">PRIORITY TASK</span>
              <span class="priority-link"><a href="#">Click for more information</a></span>
            </td>
            <td style="width:110px;">What?</td>
            <td><strong>CONVERSION</strong></td>
          </tr>
          <tr>
            <td style="width:110px;">Why?</td>
            <td>There is no clear way to get in touch with you via website.</td>
          </tr>
          <tr>
            <td style="width:110px;">How to fix it:</td>
            <td>Create a contact form on its own page, link into top navigation.</td>
          </tr>
        </table>
      </div>
      <div class="result-table priority-table">
        <table>
          <tr>
            <td rowspan="3" class="table-score-wrapper">
              <span class="text-red text-priority">PRIORITY TASK</span>
              <span class="priority-link"><a href="#">Click for more information</a></span>
            </td>
            <td style="width:110px;">What?</td>
            <td><strong>ON PAGE SEO</strong></td>
          </tr>
          <tr>
            <td style="width:110px;">Why?</td>
            <td>Increases search engine visibility.</td>
          </tr>
          <tr>
            <td style="width:110px;">How to fix it:</td>
            <td>Complete SEO review and adjustment of on page factors.</td>
          </tr>
        </table>
      </div>
      <div class="result-table priority-table">
        <table>
          <tr>
            <td rowspan="3" class="table-score-wrapper">
              <span class="text-red text-priority">PRIORITY TASK</span>
              <span class="priority-link"><a href="#">Click for more information</a></span>
            </td>
            <td style="width:110px;">What?</td>
            <td><strong>LINK BUILDING</strong></td>
          </tr>
          <tr>
            <td style="width:110px;">Why?</td>
            <td>Increases direct traffic and benefits search engine visibility.</td>
          </tr>
          <tr>
            <td style="width:110px;">How to fix it:</td>
            <td>Look for high quality websites that wish to feature your content.</td>
          </tr>
        </table>
      </div>
      <div class="result-table priority-table">
        <table>
          <tr>
            <td rowspan="3" class="table-score-wrapper">
              <span class="text-red text-priority">PRIORITY TASK</span>
              <span class="priority-link"><a href="#">Click for more information</a></span>
            </td>
            <td style="width:110px;">What?</td>
            <td><strong>CONTENT GENERATION</strong></td>
          </tr>
          <tr>
            <td style="width:110px;">Why?</td>
            <td>Benefits users and search engines.</td>
          </tr>
          <tr>
            <td style="width:110px;">How to fix it:</td>
            <td>Create an in house content development plan.</td>
          </tr>
        </table>
      </div>
      <p><strong>IMPORTANT –</strong> These are the most important aspects of the report that need your attention.</p>
      <p><strong>Summary:</strong></p>
      <p>Whilst the site is visually appealing it has many areas that require work in order to get it in line with the best SEO practices for Google. Currently the site is struggling for Google rankings and most probably conversion also.</p>
      <p>We would suggest that the SEO work, both on and off page, be put forward as a priority followed by a strong content generation program in order to make your site more content rich. This will benefit both the end user, and will help to increase rankings to the site which is key to increased customers coming through your door.</p>
      </section>

      <?php
        $section_number = 3;
          foreach ($point as $category => $value) {
            echo '<section>';
            $name = '';
            if($category == 'seo')
            {
              $name = 'SEO Assessment';
            }
            else
            {
              $name = $category;
            }
        ?>
              <h2 class="heading heading-section"><a name="<?php echo 'category-'.$section_number ?>"><span>Section <?php echo $section_number; ?>:</span> <?php echo ucwords($name); ?></a></h2>
        <?php
          foreach ($value as $section => $result) {
            $color = '';
            if ($result['section_score'] < 50) {
              $color = 'text-red';
            }else if ($result['section_score'] < 80) {
              $color = 'text-yellow';
            }else if($result['section_score'] <= 100){
              $color = 'text-green';
            }
        ?>
              <h2 class="heading sub-heading"><?php echo strtoupper($section); ?></h2>
        <?php

        ?>
        <div class="result-table">
          <table>

            <tr>
              <td rowspan="3" style="vertical-align:middle; width:80px;" class="table-score-wrapper">
                <span class="section-loop-score table-score <?php echo $color; ?>"><?php echo $result['section_score'] ?></span>
                <span>score %</span>
              </td>
              <td style="text-align:center; width:10"><strong><?php echo $result['section_importance']?>/10</strong></td>
              <td>Importance</td>
              <td rowspan="2" style="vertical-align:middle"><strong><em>What: <?php echo $result['section_desc']?></em></strong></td>
            </tr>
            <tr>
              <td style="text-align:center"><?php echo $result['section_difficulty']?>/10</td>
              <td style="width:80">Difficulty level</td>
            </tr>
            <tr>
              <td style="text-align:center">na</td>
              <td>Last review score</td>
              <td><strong><em>Why: <?php echo $result['section_why']?></em></strong></td>
            </tr>
          </table>
        </div>
        <table class="detail-list detail-list-loop">
            <?php
              $index = 0;
              for ($i=0; $i < count($result['point']); $i++) {
                if($result['point'][$i]['result'][2] == 'p')
                {
                  //echo $i;
                  $item = $result['point'][$i];
                  unset($result['point'][$i]);
                  array_push($result['point'], $item);
                  break;
                }
              }


              foreach ($result['point'] as $i => $detail) {

                $report_result = json_decode('['.$detail['result'].']',true);

                if($index == 0)
                {
                  $title = '<span>What’s working?</span>';
                }else{
                  $title = '';
                }

                if(isset($report_result[0]['description']) && !isset($report_result[0]['point_what_need_fixing']))
                {
                ?>
                  <tr>
                  <td style="width:100"><?php echo $title;?></td>
                  <td><span class="icon">&#xf00c;</span> <strong class="text-blue"><?php echo $detail['point_name']; ?></strong><?php echo ' - '.$report_result[0]['description'] ?></td>
                  </tr>
                <?php
                }

                if(!isset($report_result[0]['description']) && isset($report_result[0]['point_what_need_fixing']))
                {
                ?>
                  <tr>
                    <td><span>What needs fixing?</span></td>
                    <td><span class="icon">&#xf096;</span> - <strong class="text-blue"><?php echo $detail['point_name']; ?>:</strong> <?php echo $report_result[0]['point_what_need_fixing'] ?> </td>
                  </tr>
                  <tr>
                    <td><span>Who can fix it?</span></td>
                    <td><span class="icon">&#xf183;</span> <?php echo ' - '.$report_result[0]['point_who_can_fix'] ?></td>
                  </tr>
                  <tr>
                    <td><span>How do you fix it?</span></td>
                    <td><span class="icon">&#xf046;</span> <?php echo ' - '.$report_result[0]['point_how_to_fix'] ?></td>
                  </tr>
                <?php
                }

                if (isset($report_result[0]['description']) && isset($report_result[0]['point_what_need_fixing']))
                {
                ?>
                  <tr>
                  <td><?php echo $title;?></td>
                  <td><span class="icon">&#xf00c;</span> <strong class="text-blue"><?php echo $detail['point_name']; ?></strong><?php echo ' - '.$report_result[0]['description'] ?></td>
                  </tr>
                  <tr>
                    <td><span>What needs fixing?</span></td>
                    <td><span class="icon">&#xf096;</span> - <strong class="text-blue"><?php echo $detail['point_name']; ?>:</strong> <?php echo $report_result[0]['point_what_need_fixing'] ?> </td>
                  </tr>
                  <tr>
                    <td><span>Who can fix it?</span></td>
                    <td><span class="icon">&#xf183;</span> <?php echo ' - '.$report_result[0]['point_who_can_fix'] ?></td>
                  </tr>
                  <tr>
                    <td><span>How do you fix it?</span></td>
                    <td><span class="icon">&#xf046;</span> <?php echo ' - '.$report_result[0]['point_how_to_fix'] ?></td>
                  </tr>
                <?php
                }
                  $index++;
                }
                ?>
        </table>
        <?php
      }
      $section_number++;

        echo '</section>';
      }
      ?>
    </div>
    <input type="hidden" value="<?php echo base_url(); ?>" id="base_url">
    <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-1.12.2.min.js'?>"></script>
  </body>
</html>
<script type="text/javascript">
var base_url = $('#base_url').val();
$('#generate-report').click(function(e){
  e.preventDefault();
  var id = $(this).data('id');
  $('.preload').fadeIn();
  window.location.replace(base_url + 'report/' + id + '/generate');
  return false;
});
</script>
