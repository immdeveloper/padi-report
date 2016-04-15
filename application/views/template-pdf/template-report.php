<?php
require_once(APPPATH . "/libraries/dompdf/dompdf_config.inc.php");
ob_start();
//$html = '';
//$html .= '<html> <head>';
?>
<!DOCTYPE html>
<html lang="en">
  <head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $title; ?></title>



<link href="<?php echo base_url().'assets/css/font-awesome.min.css'?>" rel="stylesheet">


    <link href="<?php echo base_url().'assets/css/template-pdf.css'?>" rel="stylesheet">

  </head>
  <body>
    <div id="header">
     <h1>Widgets Express</h1>
   </div>
   <div id="footer">
     <p class="page">Page <?php $PAGE_NUM ?></p>
     <p style="color:red;text-align:right;"><a href="www.islandmediamanagement.com">www.islandmediamanagement.com</a></p>
   </div>
  <div>
    <p><?php echo $title; ?></p>
  <p>this is text</p>
  <p class="">this is texttrtrrrtr</p>
  <?php
      $var = '<p class="hide">varrtuuuuttt</p>';
  echo $var;
  ?>


  </div>
  </body>
  <html>
<?php
$html = ob_get_clean();
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("dompdf_out.pdf", array("Attachment" => false)); exit(0);
?>
