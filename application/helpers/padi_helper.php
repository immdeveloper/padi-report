<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('generate_pdf'))
{
    function generate_pdf($html, $filename)
    {
        require_once("dompdf/dompdf_config.inc.php");
        $dompdf = new DOMPDF();
        $dompdf->load_html($html);
        $dompdf->set_paper("A4", "portrait");
        $dompdf->render();
        return $dompdf->stream($filename.".pdf", array("Attachment" => false)); exit(0);
    }
}

if ( ! function_exists('_esc_apos'))
{
    function _esc_apos($text)
    {
      $escapedtext = str_replace("’", "&#39;", $text);
      return $escapedtext;
    }
}
