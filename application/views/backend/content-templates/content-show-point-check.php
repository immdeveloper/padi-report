<div class="card">
  <h4 class="card-title">ALL POINT CHECK MASTER</h4>
  <span class="card-subtitle">Overall scoring summary</span>
  <hr />
  <table class="table table-striped datatable">
    <thead>
      <th>No</th>
      <th>Section Name</th>
      <th>Section Category</th>
      <th>Section Slug</th>
      <th style="width:60px;">Action</th>
    </thead>
    <tbody>
      <?php
        $no = 1;
        foreach ($content_data as $value) {
      ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $value['section_name']; ?></td>
        <td><?php echo ucwords($value['section_cat']); ?></td>
        <td><?php echo $value['section_slug']; ?></td>
        <td>
          <div class="btn-group btn-group-sm" role="group" aria-label="...">
            <a href="<?php echo  base_url().'admin/point-check-master/edit/'.$value['id_section']?>" class="btn btn-warning"><i class="fa fa-pencil fa-fw"></i></a>
            <button type="button" class="btn btn-danger"><i class="fa fa-trash-o fa-fw"></i></button>
          </div>
        </td>
      </tr>
      <?php $no++; } ?>
    </tbody>
  </table>
</div>
