<?php
/*$prev_section_name = NULL;
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
}*/
?>

<div class="card">
  <h4 class="card-title">WEBSITE LIST</h4>
  <hr>
  <table class="table table-striped datatable">
    <thead>
      <th>No</th>
      <th>Website URL</th>
      <th>Number of Report</th>
      <th>Last Report Date</th>
      <th></th>
    </thead>
    <tbody>
      <?php
        $no = 1;
        foreach ($content as $key => $value)
        {
          $disable = '';
          $icon = 'fa fa-eye';
          $link = base_url().'report-list/'. $value['id_domain'];

          if($value['report_count'] == 0)
          {
            $disable = 'disabled';
            $icon = 'fa fa-eye-slash';
            $link = 'javascript:void(0)';
          }
        ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><a href="<?php echo $link; ?>"><?php echo $value['url']; ?></a></td>
          <td><?php echo $value['report_count']; ?></td>
          <td><?php echo $value['last_report']; ?></td>
          <td>
            <!-- Split button -->
          <div class="btn-group">
            <a href="<?php echo $link; ?>" class="btn btn-success" <?php echo $disable; ?>><i class="<?php echo $icon; ?>"></i> View</a>
            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="caret"></span>
              <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu">
              <li><a href="<?php echo base_url().'website-review-form/?url='.$value['url'];?>" target="_blank"><i class="fa fa-plus"></i> Full review</a></li>
              <li><a href="#"><i class="fa fa-plus"></i> Follow up review</a></li>
            </ul>
          </div>
          </td>
        </tr>
        <?php
        $no++; }
      ?>
    </tbody>
  </table>
</div>
