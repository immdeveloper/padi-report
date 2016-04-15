
  <?php
    if($this->session->flashdata('flash_msg')){
  ?>
  <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Well done!</strong> <?php echo $this->session->flashdata('flash_msg'); ?>
  </div>
  <?php }?>
    <form class="form" name="form-add-point-check" method="post" action="<?php echo base_url()?>admin/point-check-master/store">
  <div class="card">
    <h4 class="card-title">ADD NEW POINT CHECK</h4>
    <span class="card-subtitle">Overall scoring summary</span>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Section name</label>
          <input type="text" class="form-control" name="section-name" value="" placeholder="eg: User Experience">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Slug</label>
          <input type="text" class="form-control" name="section-slug" value="" placeholder="eg: user-experience">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Section description</label>
          <input type="text" class="form-control" name="section-desc" value="">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Section category</label>
          <select class="form-control" name="section-cat">
            <option value="">-- select category --</option>
            <option value="site structure">Site Structure</option>
            <option value="seo">SEO</option>
            <option value="ranking">Ranking</option>
            <option value="content management">Content Management</option>
            <option value="social integration">Social Integration</option>
            <option value="quality/retention/convertion">Quality/Retention/Convertion</option>
          </select>
        </div>
      </div>
    </div>

    </div>
    <div class="point-check-wrapper">

    </div>
    <hr />
    <a href="javascript:void(0)" class="btn btn-default add-point-check"><i class="fa fa-plus fa-fw"></i> Add point check</a>
    <input type="submit" name="name" value="save" class="btn btn-primary pull-right">
  </form>
