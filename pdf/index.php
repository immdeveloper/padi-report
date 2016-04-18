<?php
require_once("dompdf/dompdf_config.inc.php");
ob_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="reset.css" type="text/css" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css" type="text/css" />
  </head>
  <body>
    <!-- Header & Footer -->
    <div id="footer">
        <p>www.islandmediamanagement.com</p>
    </div>
    <div class="container">
      <section id="page-1">
        <img src="logo.png" alt="" width="230" height="138" class="logo" />
        <p class="first-page-imm">Island Media Management</p>
        <p class="first-page-title">Website review for <em>www.sample.com</em>, 14 <sup>th</sup> January 2015</p>
        <div style="height:400px;"></div>
        <h2 class="heading">List of Contents</h2>
        <ul class="section-list">
          <li><span>Section 1:</span> <a href="#intro">Introduction</a></li>
          <li><span>Section 2:</span> <a href="#summary">Executive Summary</a></li>
          <li><span>Section 3:</span> <a href="#">Site Structure</a></li>
          <li><span>Section 4:</span> <a href="#">SEO Assessment</a></li>
          <li><span>Section 5:</span> <a href="#">Ranking Summary Overview</a></li>
          <li><span>Section 6:</span> <a href="#">Content Management</a></li>
          <li><span>Section 7:</span> <a href="#">Social Integration</a></li>
          <li><span>Section 8:</span> <a href="#">Quality / Retention / Conversion</a></li>
        </ul>
      </section>

      <section>
        <h2 class="heading heading-section"><a name="intro">Section 1 – An Introduction to Island Media Management</a></h2>
        <p>
          This is an independent review of your website, <u>www.sample.com</u>, performed by Island Media Management. IMM a marketing consulting firm based in Bali, Indonesia which is managed by experienced dive industry marketers who have also taught at all levels from Discover Scuba Diving up to Trimix Instructor. This review is meant to serve as a tool to help you see how your online marketing efforts can be improved in order to deliver sustainable results for your dive business.
        </p>
        <p>
          If you have any questions about the report you are welcome to contact us direct at
          <a href="info@islandmediamanagement.com">info@islandmediamanagement.com</a> where our team is ready and waiting to assist you.
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
              <td rowspan="3" style="vertical-align:middle" class="table-score-wrapper">
                <span class="table-score text-green">xx</span>
                <span>score %</span>
              </td>
              <td style="text-align:center">x/10</td>
              <td>Importance</td>
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
            <td><span>What’s working?</span></td>
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
            <td class="number">xx</td>
            <td>Meta Tags</td>
            <td class="number">xx</td>
            <td>Overall Content</td>
          </tr>
          <tr>
            <td class="number">xx</td>
            <td>User Experience</td>
            <td class="number">xx</td>
            <td>Images</td>
            <td class="number">xx</td>
            <td>Social Integration</td>
          </tr>
          <tr>
            <td class="number">xx</td>
            <td>Navigation</td>
            <td class="number">xx</td>
            <td>Text</td>
            <td class="number">xx</td>
            <td>Quality Signals</td>
          </tr>
          <tr>
            <td class="number">xx</td>
            <td>Search Assessibility</td>
            <td class="number">xx</td>
            <td>Link Profile</td>
            <td class="number">xx</td>
            <td>Retention</td>
          </tr>
          <tr>
            <td class="number">xx</td>
            <td>Link Structure</td>
            <td class="number">xx</td>
            <td>Hosting & Registration</td>
            <td class="number">xx</td>
            <td>Conversion</td>
          </tr>
          <tr>
            <td class="number">xx</td>
            <td>Page Speed</td>
            <td class="number">xx</td>
            <td>Search Rankings</td>
            <td class="number">xx</td>
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
      <section>
        <h2 class="heading heading-section"><a name="page-2"><span>Section 3:</span> Site Structure</a></h2>
        <h2 class="heading sub-heading">USER EXPERIENCE</h2>
        <div class="result-table">
          <table>

            <tr>
              <td rowspan="3" style="vertical-align:middle" class="table-score-wrapper">
                <span class="table-score text-red">36</span>
                <span>score %</span>
              </td>
              <td style="text-align:center"><strong>8/10</strong></td>
              <td>Importance</td>
              <td rowspan="2" style="vertical-align:middle"><strong><em>What: The user experience is the general impression a user has when interacting with your website.</em></strong></td>
            </tr>
            <tr>
              <td style="text-align:center">5/10</td>
              <td>Difficulty level</td>
            </tr>
            <tr>
              <td style="text-align:center">na</td>
              <td>Last review score</td>
              <td><strong><em>Why: In 2015, Internet users only have prolonged interactions with websites that are easy to use.</em></strong></td>
            </tr>
          </table>
        </div>
        <table class="detail-list">
          <tr>
            <td><span>What’s working?</span></td>
            <td><span class="icon">&#xf00c;</span> <strong class="text-blue">Cross browser compatibility</strong> – no issues across multiple browsers.</td>
          </tr>
          <tr>
            <td></td>
            <td><span class="icon">&#xf00c;</span> <strong class="text-blue">The Footer</strong> provides full Name, Address and Phone number (NAP)</td>
          </tr>
          <tr>
            <td></td>
            <td><span class="icon">&#xf00c;</span> <strong class="text-blue">Multilingual site</strong></td>
          </tr>
          <tr>
            <td></td>
            <td><span class="icon">&#xf00c;</span> <strong class="text-blue">Mobile friendly site</strong> allows mobile users to access information clearly.</td>
          </tr>
          <tr>
            <td><span>What needs fixing?</span></td>
            <td><span class="icon">&#xf096;</span> - <strong class="text-blue">Visual Layout and Clarity:</strong> the main page of the site tends to be confusing for the user given the large number of images across this page. It is hard to identity sections within the page, aside from the main menu. </td>
          </tr>
          <tr>
            <td><span>Who can fix it?</span></td>
            <td><span class="icon">&#xf183;</span> - Web programmer</td>
          </tr>
          <tr>
            <td><span>How do you fix it?</span></td>
            <td><span class="icon">&#xf046;</span> - We would suggest that you look to add some more text onto the page, with headings and sub headings in order to break up the images. Another option would to try and make the individual images more clear with better headings.</td>
          </tr>
        </table>
      </section>
    </div>
  </body>
</html>
<?php
 $html = ob_get_clean();
 $dompdf = new DOMPDF();
 $dompdf->load_html($html);
 $dompdf->set_paper("A4", "portrait");
 $dompdf->render();
 $dompdf->stream("dompdf_out.pdf", array("Attachment" => false)); exit(0);
?>
