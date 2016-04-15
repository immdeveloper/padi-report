<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*Search engine index page*/
define('GOOGLE_PAGE_INDEX_URL', 'https://www.google.com/search?q=site:');
define('BING_PAGE_INDEX_URL', 'https://www.bing.com/search?q=site:');


/*Load Simple HTML DOM Library*/
require_once('simple_html_dom.php');

class Analyze{

  /*Get indexed website page count from Google and Bing*/
  function get_page_index($url)
  {
    $result = array();
    $google = file_get_html(GOOGLE_PAGE_INDEX_URL.$url);
    $bing = file_get_html(BING_PAGE_INDEX_URL.$url);

    $tag_google = '';
    $tag_bing = '';

    if( isset($google->find('div#resultStats', 0)->plaintext) )
    {
        $tag_google = $google->find('div#resultStats', 0)->plaintext;
    }

    if( isset($bing->find('span.sb_count', 0)->plaintext) )
    {
        $tag_bing = $bing->find('span.sb_count', 0)->plaintext;
    }

    if( $tag_google && $tag_bing )
    {
      $result['google'] = explode(' ', $tag_google)[1];
      $result['bing'] = explode(' ', $tag_bing)[0];
    }
    elseif( !$tag_google && $tag_bing )
    {
      $result['google'] = $url.' not indexed on Google';
      $result['bing'] = explode(' ', $tag_bing)[0];
    }
    elseif( $tag_google && !$tag_bing )
    {
      $result['google'] = explode(' ', $tag_google)[1];
      $result['bing'] = $url.' not indexed on Bing';
    }
    else
    {
      $result['google'] = $url.' not indexed on Google';
      $result['bing'] = $url.' not indexed on Bing';
    }

    return $result;
  }


}
?>
