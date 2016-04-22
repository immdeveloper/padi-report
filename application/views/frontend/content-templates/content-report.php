<?php
$prev_section_name = NULL;
$prev_section_category = NULL;
echo '<p>URL: '.$point[0]['url'].'</p>';
echo '<p>Date report: '.$point[0]['date'].'</p>';
for ($i=0; $i < count($point); $i++) {
  if($point[$i]['section_category'] != $prev_section_category)
  {
      echo '<p style="color:#F03"><strong>'.$point[$i]['section_category'].'</strong></p>';
  }

  if($point[$i]['section_name'] != $prev_section_name)
  {
      echo '<p><strong>'.$point[$i]['section_name'].'</strong></p>';
  }
    echo '<p>'.$point[$i]['point']['point_name'].'</p>';
    echo '<p>'.$point[$i]['point']['result'].'</p><hr>';
    $prev_section_name = $point[$i]['section_name'];
    $prev_section_category = $point[$i]['section_category'];
}
?>
