
  <?php
    if($this->session->flashdata('flash_msg')){
  ?>
  <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Well done!</strong> <?php echo $this->session->flashdata('flash_msg'); ?>
  </div>
  <?php } ?>
    <form class="form" name="form-add-point-check" method="post" action="<?php echo base_url()?>admin/point-check-master/update/<?php echo $content_data[0]->id_section?>">
  <div class="card">
    <h4 class="card-title">EDIT POINT CHECK</h4>
    <span class="card-subtitle">Overall scoring summary</span>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Section name</label>
          <input type="text" class="form-control" name="section-name" value="<?php echo $content_data[0]->section_name; ?>" placeholder="eg: User Experience">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Slug</label>
          <input type="text" class="form-control" name="section-slug" value="<?php echo $content_data[0]->section_slug; ?>" placeholder="eg: user-experience">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Section description</label>
          <input type="text" class="form-control" name="section-desc" value="<?php echo $content_data[0]->section_desc; ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Section category</label>
          <select class="form-control" name="section-cat">
            <option value="">-- select category --</option>
            <?php
              $option = array('site structure', 'seo', 'ranking', 'content management', 'social integration', 'quality/retention/convertion');
              for ($i=0; $i < count($option); $i++) {
                if($option[$i] == $content_data[0]->section_cat)
                {
                  echo '<option value="'.$option[$i].'" selected>'.ucwords($option[$i]).'</option>';
                }
                else
                {
                  echo '<option value="'.$option[$i].'">'.ucwords($option[$i]).'</option>';
                }
              }
            ?>
          </select>
        </div>
      </div>
    </div>

    </div>
    <div class="point-check-wrapper">
      <?php
        for ($i=0; $i < count($content_data); $i++) {
      ?>

      <div class="card">
        <fieldset>
          <input type="hidden" name="id_point[]" value="<?php echo $content_data[$i]->id_point; ?>">
          <legend><?php echo $content_data[$i]->point_name; ?> <a href="javascript:void(0)" class="remove-point-check pull-right"><i class="fa fa-remove"></i></a></legend>
          <div class="form-group">
            <label>Point check name</label>
            <input type="text" class="form-control" name="point_check_name[]" value="<?php echo $content_data[$i]->point_name; ?>">
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>What needs fixing?</label>
                <input type="text" class="form-control" name="point_what_need_fixing[]" value="<?php echo $content_data[$i]->point_what_need_fixing; ?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" name="point_desc[]" value="<?php echo $content_data[$i]->point_desc; ?>">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Who can fix it?</label>
                <select class="form-control" name="point_who_can_fix[]">
                  <option value="">-- select user --</option>
                  <?php
                    if($content_data[$i]->point_who_can_fix == 'Webmaster')
                    {
                      echo '<option value="Webmaster" selected>Webmaster</option>';
                      echo '<option value="Basic user">Basic user</option>';
                    }
                    elseif ($content_data[$i]->point_who_can_fix == 'Basic user')
                    {
                      echo '<option value="Webmaster">Webmaster</option>';
                      echo '<option value="Basic user" selected>Basic user</option>';
                    }
                    else
                    {
                      echo '<option value="Webmaster">Webmaster</option>';
                      echo '<option value="Basic user">Basic user</option>';
                    }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>How do you fix it?</label>
                <input type="text" class="form-control" name="point_how_to_fix[]" value="<?php echo $content_data[$i]->point_how_to_fix; ?>">
              </div>
            </div>
          </div>
        </fieldset>
      </div>

      <?php
      }
      ?>
    </div>
    <hr />
    <a href="javascript:void(0)" class="btn btn-default add-point-check"><i class="fa fa-plus fa-fw"></i> Add point check</a>
    <input type="submit" name="name" value="save" class="btn btn-primary pull-right">
  </form>
