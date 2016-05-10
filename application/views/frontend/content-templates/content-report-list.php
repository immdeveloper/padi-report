<div class="card">
  <h4 class="card-title">Report list for <?php echo $content[0]->url; ?></h4>
  <hr />
  <table class="table table-striped datatable">
    <thead>
      <th>No</th>
      <th>Report date</th>
      <th>Report type</th>
      <th>Action</th>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($content as $key => $value)
      {
      ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $value->date; ?></td>
        <td>Report type</td>
        <td><a href="<?php echo base_url().'report/'.$value->id_assessment.'/preview'; ?>" class="btn btn-default">Preview</a></td>
      </tr>
      <?php
      $no++; }
      ?>
    </tbody>
  </table>
</div>
