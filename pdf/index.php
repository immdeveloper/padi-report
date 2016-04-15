<?php
require_once("dompdf/dompdf_config.inc.php");
ob_start();
?>
<!-- Header & Footer -->
<div id="footer">
    <p>www.islandmediamanagement.com</p>
</div>

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
    <div class="container">

      <section id="page-1">
        <img src="logo.png" alt="" width="230" height="138" class="logo" />
        <p class="first-page-imm">Island Media Management</p>
        <p class="first-page-title">Website review for <em>www.sample.com</em>, 14 <sup>th</sup> January 2015</p>
        <div style="height:440px;"></div>
        <h2 class="heading">List of Contents</h2>
        <ul class="section-list">
          <li><span>Section 1:</span> <a href="#page-2">Introduction</a></li>
          <li><span>Section 2:</span> <a href="#">Executive Summary</a></li>
          <li><span>Section 3:</span> <a href="#">Site Structure</a></li>
          <li><span>Section 4:</span> <a href="#">SEO Assessment</a></li>
          <li><span>Section 5:</span> <a href="#">Ranking Summary Overview</a></li>
          <li><span>Section 6:</span> <a href="#">Content Management</a></li>
          <li><span>Section 7:</span> <a href="#">Social Integration</a></li>
          <li><span>Section 8:</span> <a href="#">Quality / Retention / Conversion</a></li>
        </ul>
      </section>

      <section>
        <h2 class="heading heading-section"><a name="page-2">Section 1 – An Introduction to Island Media Management</a></h2>
        <p>
          This is an independent review of your website, <u>www.sample.com</u>, performed by Island Media Management. IMM a marketing consulting firm based in Bali, Indonesia which is managed by experienced dive industry marketers who have also taught at all levels from Discover Scuba Diving up to Trimix Instructor. This review is meant to serve as a tool to help you see how your online marketing efforts can be improved in order to deliver sustainable results for your dive business.
        </p>
        <p>
          If you have any questions about the report you are welcome to contact us direct at
          <a href="info@islandmediamanagement.com">info@islandmediamanagement.com</a> where our team is ready and waiting to assist you.
        </p>
        <div style="height:40px"></div>
        <h2 class="heading sub-heading">How to use this report</h2>
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
                <span class="table-score">xx</span>
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
        <ul class="detail-list">
          <li><span>What’s working?</span></li>
        </ul>
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
