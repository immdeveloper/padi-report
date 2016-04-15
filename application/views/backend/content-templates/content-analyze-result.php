<p>
  This page is currently on testing mode...
</p>

<div class="form input-group">
  <form action="" method="post" id="form-web-url">
  <input type="text" id="web-url" class="form-control" placeholder="Enter your website url (don't include http(s)://)">
</form>
  <a href="javascript:void(0)" class="btn btn-default input-group-addon" id="btn-analyze">Analyze</a>
</div>
<div class="preload" style="display:none">
  <i class="fa fa-circle-o-notch fa-spin"></i> <span>Getting results...<span id="load-status"></span></span>
</div>
<hr />
<div class="result">
  <div id="test-scraping">

  </div>
  <div class="result-title">
    <span>Analysis of <a href="#" id="test-url">https://www.google.com</a></span>
    <span class="result-date"><i class="fa fa-calendar"></i> March 22, 2016 &nbsp; &nbsp; <i class="fa fa-clock-o"></i> 08:00:12 AM</span>
  </div>
  <div class="card summary hide">
    <h4 class="card-title">EXECUTIVE SUMMARY</h4>
    <span class="card-subtitle">Overall scoring summary</span>
    <hr>
    <div class="row">
      <div class="col-md-4 col-lg-4">
        <div class="website-thumb">
          <img src="holder.js/329x200?theme=sky&text=Website Thumb" alt="" width="320" height="240"/>
        </div>
      </div>
      <div class="col-md-4 col-lg-4">
        <div class="summary-block">
          <h4>Load Speed | Page Size</h4>
          <h1>1.23S | 1MB</h1>
        </div>
        <div class="summary-block">
          <h4>SEO Tests</h4>
          <ul class="list-unstyled summary-seo-test">
            <li>
              <span>10</span>
              <span>CRITICAL</span>
            </li>
            <li>
              <span>5</span>
              <span>WARNING</span>
            </li>
            <li>
              <span>30</span>
              <span>VALID</span>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-4 col-lg-4">
        <div class="row">
          <div class="col-md-6 col-lg-6 no-pad">
            <div class="summary-block summary-block-full-height status-warning">
              <h4>SEO Score</h4>
              <h1>74</h1>
            </div>
          </div>
          <div class="col-md-6 col-lg-6">
            <div class="summary-block status-valid speed-score">
              <h4>Desktop Score</h4>
              <h1 id="desktop-score">100/100</h1>
            </div>
            <div class="summary-block status-critical">
              <h4>Mobile Score</h4>
              <h1 id="mobile-score">20/100</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- Card summary -->
  <div class="result-navbar">
    <ul class="list-unstyled">
      <li class="active"><a href="#tab1" role="tab" data-toggle="tab"><i class="fa fa-sitemap fa-fw"></i> Site Structure</a></li>
      <li><a href="#tab2" role="tab" data-toggle="tab"><i class="fa fa-globe fa-fw"></i> SEO</a></li>
      <li><a href="#tab3" role="tab" data-toggle="tab"><i class="fa fa-bar-chart fa-fw"></i> Ranking</a></li>
      <li><a href="#tab4" role="tab" data-toggle="tab"><i class="fa fa-file-o fa-fw"></i> Content Management</a></li>
      <li><a href="#tab5" role="tab" data-toggle="tab"><i class="fa fa-hashtag fa-fw"></i> Social Integration</a></li>
      <li><a href="#tab6" role="tab" data-toggle="tab"><i class="fa fa-diamond fa-fw"></i> Quality/Retention/Convertion</a></li>
    </ul>
  </div>
  <!-- Tab content -->
  <div class="tab-content">

    <!-- tab panel SITE STRUCTURE -->
    <div role="tabpanel" class="tab-pane fade in active" id="tab1">
  <a href="#" class="btn btn-default save-all" id="save-all">Save All</a>
      <?php
      //var_dump($test);
      var_dump($_POST);
      foreach ($section as $value) {
        if($value['section_cat'] == 'site structure')
        {
      ?>
      <div class="card">
        <a class="pull-right" data-toggle="collapse" href="#<?php echo $value['section_slug']?>">
          <i class="fa fa-chevron-down fa-fw"></i>
        </a>
        <h4 class="card-title"><?php echo strtoupper($value['section_name']); ?></h4>
        <span class="card-subtitle"><?php echo $value['section_desc']; ?></span>
        <hr>
        <div class="collapse in res" id="<?php echo $value['section_slug']?>">
        <div class="result-table-wrapper" style="display:none;" id="result-<?php echo $value['section_slug']?>">
          <div class="result-table">
            <table>
              <tr>
                <td rowspan="4" style="vertical-align:middle" class="table-score-wrapper">
                  <span class="table-score">100</span>
                  <span>score %</span>
                </td>
              </tr>
              <tr>
                <td><strong>8/10</strong></td>
                <td>Importance</td>
                <td rowspan="2" style="vertical-align:middle"><strong><em>What: <?php echo $value['section_desc']; ?></em></strong></td>
              </tr>
              <tr>
                <td>5/10</td>
                <td>Difficulty level</td>
              </tr>
              <tr>
                <td>na</td>
                <td>Last review score</td>
                <td><strong><em>Why: In 2015, Internet users only have prolonged interactions with websites that are easy to use.</em></strong></td>
              </tr>
            </table>
          </div>
          <a href="#" class="btn btn-default edit-field" id="edit-<?php echo $value['section_slug'];?>"><i class="fa fa-pencil"></i> Edit</a>
        </div><!-- Result table wrapper -->
        <div class="report-form" id="report-<?php echo $value['section_slug']?>">
          <p><strong>What needs fixing?</strong></p>
          <form class="uxe" action="" method="post" id="form-<?php echo $value['section_slug']?>">
            <input type="hidden" id="hidden-url" value="google.co.id" />
          <?php
          foreach ($point as $i => $point_val)
          {
            $target[$i] = $value['section_slug'].$i;
            if($value['id_section'] == $point_val['id_section'])
            {
          ?>
          <div class="checkbox">
            <label><input id="check-<?php echo $target[$i];?>" name="check-<?php echo $target[$i];?>"
              type="checkbox" data-toggle="collapse"
              data-target="#<?php echo $target[$i];?>">
              <?php echo $point_val['point_name'][$i]; ?>
            </label>
            <div class="collapse" id="<?php echo $target[$i];?>">
              <div class="well">
                <div class="form-group">
                  <span><strong>Explanation</strong></span>
                  <input type="text" name="name" value="<?php echo $point_val['point_what_need_fixing'][$i];?>" class="form-control">
                </div>
                <div class="form-group">
                  <span><strong>Who can fix it?</strong></span>
                  <select class="form-control" name="">
                    <?php
                      if($point_val['point_who_can_fix'][$i] == 'Webmaster')
                      {
                        echo '<option value="Webmaster" selected>Webmaster</option>';
                        echo '<option value="Basic user">Basic user</option>';
                      }
                      elseif ($point_val['point_who_can_fix'][$i] == 'Basic user')
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
                <div class="form-group">
                  <span><strong>How do you fix it?</strong></span>
                  <input type="text" name="name" value="<?php echo $point_val['point_how_to_fix'][$i];?>" class="form-control">
                </div>
              </div>
            </div><!-- collapse -->
          </div><!-- checkbox -->
          <?php
            }
          }
          ?>

          <hr />
          <div class="personal-wrapper" id="wrapper-<?php echo $target[$i];?>">

          </div>
          </form>
          <a href="#" class="btn btn-default add-field" id="add-<?php echo $target[$i];?>">Add personal judgement</a>
          <a href="#" class="btn btn-default save-field" id="save-<?php echo $target[$i];?>">Save</a>
      </div>
      <?php
        echo '</div>';
        echo '</div><!-- card -->';
        }
      }
      ?>
    </div><!-- tab panel -->
    <!-- tab panel SEO ASSESSMENT -->
    <div role="tabpanel" class="tab-pane fade" id="tab2">

      <?php
      foreach ($section as $value) {
        if($value['section_cat'] == 'seo')
        {
      ?>
      <div class="card">
        <a class="pull-right" data-toggle="collapse" href="#<?php echo $value['section_slug']?>">
          <i class="fa fa-chevron-down fa-fw"></i>
        </a>
        <h4 class="card-title"><?php echo strtoupper($value['section_name']); ?></h4>
        <span class="card-subtitle"><?php echo $value['section_desc']; ?></span>
        <hr>
        <div class="collapse in res" id="<?php echo $value['section_slug']?>">
        <div class="result-table-wrapper" style="display:none;" id="result-<?php echo $value['section_slug']?>">
          <div class="result-table">
            <table>
              <tr>
                <td rowspan="4" style="vertical-align:middle" class="table-score-wrapper">
                  <span class="table-score">100</span>
                  <span>score %</span>
                </td>
              </tr>
              <tr>
                <td><strong>8/10</strong></td>
                <td>Importance</td>
                <td rowspan="2" style="vertical-align:middle"><strong><em>What: <?php echo $value['section_desc']; ?></em></strong></td>
              </tr>
              <tr>
                <td>5/10</td>
                <td>Difficulty level</td>
              </tr>
              <tr>
                <td>na</td>
                <td>Last review score</td>
                <td><strong><em>Why: In 2015, Internet users only have prolonged interactions with websites that are easy to use.</em></strong></td>
              </tr>
            </table>
          </div>
          <a href="#" class="btn btn-default edit-field" id="edit-<?php echo $value['section_slug'];?>"><i class="fa fa-pencil"></i> Edit</a>
        </div><!-- Result table wrapper -->
        <div class="report-form" id="report-<?php echo $value['section_slug']?>">
          <p><strong>What needs fixing?</strong></p>
          <form class="uxe" action="" method="post" id="form-<?php echo $value['section_slug']?>">
          <?php
          foreach ($point as $i => $point_val)
          {
            $target[$i] = $value['section_slug'].$i;
            if($value['id_section'] == $point_val['id_section'])
            {
          ?>
          <div class="checkbox">
            <label><input type="checkbox" data-toggle="collapse" data-target="#<?php echo $target[$i];?>"><?php echo $point_val['point_name'][$i]; ?></label>
            <div class="collapse" id="<?php echo $target[$i];?>">
              <div class="well">
                <div class="form-group">
                  <span><strong>Explanation</strong></span>
                  <input type="text" name="name" value="<?php echo $point_val['point_what_need_fixing'][$i];?>" class="form-control">
                </div>
                <div class="form-group">
                  <span><strong>Who can fix it?</strong></span>
                  <select class="form-control" name="">
                    <option value="">-- select user --</option>
                    <?php
                      if($point_val['point_who_can_fix'][$i] == 'Webmaster')
                      {
                        echo '<option value="Webmaster" selected>Webmaster</option>';
                        echo '<option value="Basic user">Basic user</option>';
                      }
                      elseif ($point_val['point_who_can_fix'][$i] == 'Basic user')
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
                <div class="form-group">
                  <span><strong>How do you fix it?</strong></span>
                  <input type="text" name="name" value="<?php echo $point_val['point_how_to_fix'][$i];?>" class="form-control">
                </div>
              </div>
            </div><!-- collapse -->
          </div><!-- checkbox -->
          <?php
            }
          }
          ?>
          <hr />
          <div class="personal-wrapper" id="wrapper-<?php echo $target[$i];?>">

          </div>
        </form>
          <a href="javascript:void(0)" class="btn btn-default add-field" id="add-<?php echo $target[$i];?>">Add personal judgement</a>
          <a href="javascript:void(0)" class="btn btn-default save-field" id="save-<?php echo $target[$i];?>">Save</a>
      </div>
      <?php
      echo '</div>';
        echo '</div><!-- card -->';
        }
      }
      ?>
    </div>

    <!-- tab panel RANKING SUMMARY OVERVIEW -->
    <div role="tabpanel" class="tab-pane fade" id="tab3">

      <?php

      foreach ($section as $value) {
        if($value['section_cat'] == 'ranking')
        {
      ?>
      <div class="card">
        <a class="pull-right" data-toggle="collapse" href="#<?php echo $value['section_slug']?>">
          <i class="fa fa-chevron-down fa-fw"></i>
        </a>
        <h4 class="card-title"><?php echo strtoupper($value['section_name']); ?></h4>
        <span class="card-subtitle"><?php echo $value['section_desc']; ?></span>
        <hr>
        <div class="collapse in res" id="<?php echo $value['section_slug']?>">
        <div class="result-table-wrapper" style="display:none;" id="result-<?php echo $value['section_slug']?>">
          <div class="result-table">
            <table>
              <tr>
                <td rowspan="4" style="vertical-align:middle" class="table-score-wrapper">
                  <span class="table-score">100</span>
                  <span>score %</span>
                </td>
              </tr>
              <tr>
                <td><strong>8/10</strong></td>
                <td>Importance</td>
                <td rowspan="2" style="vertical-align:middle"><strong><em>What: <?php echo $value['section_desc']; ?></em></strong></td>
              </tr>
              <tr>
                <td>5/10</td>
                <td>Difficulty level</td>
              </tr>
              <tr>
                <td>na</td>
                <td>Last review score</td>
                <td><strong><em>Why: In 2015, Internet users only have prolonged interactions with websites that are easy to use.</em></strong></td>
              </tr>
            </table>
          </div>
          <a href="#" class="btn btn-default edit-field" id="edit-<?php echo $value['section_slug'];?>"><i class="fa fa-pencil"></i> Edit</a>
        </div><!-- Result table wrapper -->
        <div class="report-form" id="report-<?php echo $value['section_slug']?>">
          <p><strong>What needs fixing?</strong></p>
          <?php
          foreach ($point as $i => $point_val)
          {
            $target[$i] = $value['section_slug'].$i;
            if($value['id_section'] == $point_val['id_section'])
            {
          ?>
          <div class="checkbox">
            <label><input type="checkbox" data-toggle="collapse" data-target="#<?php echo $target[$i];?>"><?php echo $point_val['point_name'][$i]; ?></label>
            <div class="collapse" id="<?php echo $target[$i];?>">
              <div class="well">
                <div class="form-group">
                  <span><strong>Explanation</strong></span>
                  <input type="text" name="name" value="<?php echo $point_val['point_what_need_fixing'][$i];?>" class="form-control">
                </div>
                <div class="form-group">
                  <span><strong>Who can fix it?</strong></span>
                  <select class="form-control" name="">
                    <option value="">-- select user --</option>
                    <?php
                      if($point_val['point_who_can_fix'][$i] == 'Webmaster')
                      {
                        echo '<option value="Webmaster" selected>Webmaster</option>';
                        echo '<option value="Basic user">Basic user</option>';
                      }
                      elseif ($point_val['point_who_can_fix'][$i] == 'Basic user')
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
                <div class="form-group">
                  <span><strong>How do you fix it?</strong></span>
                  <input type="text" name="name" value="<?php echo $point_val['point_how_to_fix'][$i];?>" class="form-control">
                </div>
              </div>
            </div><!-- collapse -->
          </div><!-- checkbox -->
          <?php
            }
          }
          ?>
          <hr />
          <div class="personal-wrapper" id="wrapper-<?php echo $target[$i];?>">

          </div>
          <a href="#" class="btn btn-default add-field" id="add-<?php echo $target[$i];?>">Add personal judgement</a>
          <a href="#" class="btn btn-default save-field" id="save-<?php echo $target[$i];?>">Save</a>
      </div>
      <?php
        echo '</div>';
        echo '</div><!-- card -->';
        }
      }
      ?>

    </div>

    <!-- tab panel CONTENT MANAGEMENT -->
    <div role="tabpanel" class="tab-pane fade" id="tab4">

      <?php
      foreach ($section as $value) {
        if($value['section_cat'] == 'content management')
        {
      ?>
      <div class="card">
        <a class="pull-right" data-toggle="collapse" href="#<?php echo $value['section_slug']?>">
          <i class="fa fa-chevron-down fa-fw"></i>
        </a>
        <h4 class="card-title"><?php echo strtoupper($value['section_name']); ?></h4>
        <span class="card-subtitle"><?php echo $value['section_desc']; ?></span>
        <hr>
        <div class="collapse in res" id="<?php echo $value['section_slug']?>">
        <div class="result-table-wrapper" style="display:none;" id="result-<?php echo $value['section_slug']?>">
          <div class="result-table">
            <table>
              <tr>
                <td rowspan="4" style="vertical-align:middle" class="table-score-wrapper">
                  <span class="table-score">100</span>
                  <span>score %</span>
                </td>
              </tr>
              <tr>
                <td><strong>8/10</strong></td>
                <td>Importance</td>
                <td rowspan="2" style="vertical-align:middle"><strong><em>What: <?php echo $value['section_desc']; ?></em></strong></td>
              </tr>
              <tr>
                <td>5/10</td>
                <td>Difficulty level</td>
              </tr>
              <tr>
                <td>na</td>
                <td>Last review score</td>
                <td><strong><em>Why: In 2015, Internet users only have prolonged interactions with websites that are easy to use.</em></strong></td>
              </tr>
            </table>
          </div>
          <a href="#" class="btn btn-default edit-field" id="edit-<?php echo $value['section_slug'];?>"><i class="fa fa-pencil"></i> Edit</a>
        </div><!-- Result table wrapper -->
        <div class="report-form" id="report-<?php echo $value['section_slug']?>">
          <p><strong>What needs fixing?</strong></p>
          <?php
          foreach ($point as $i => $point_val)
          {
            $target[$i] = $value['section_slug'].$i;
            if($value['id_section'] == $point_val['id_section'])
            {
          ?>
          <div class="checkbox">
            <label><input type="checkbox" data-toggle="collapse" data-target="#<?php echo $target[$i];?>"><?php echo $point_val['point_name'][$i]; ?></label>
            <div class="collapse" id="<?php echo $target[$i];?>">
              <div class="well">
                <div class="form-group">
                  <span><strong>Explanation</strong></span>
                  <input type="text" name="name" value="<?php echo $point_val['point_what_need_fixing'][$i];?>" class="form-control">
                </div>
                <div class="form-group">
                  <span><strong>Who can fix it?</strong></span>
                  <select class="form-control" name="">
                    <option value="">-- select user --</option>
                    <?php
                      if($point_val['point_who_can_fix'][$i] == 'Webmaster')
                      {
                        echo '<option value="Webmaster" selected>Webmaster</option>';
                        echo '<option value="Basic user">Basic user</option>';
                      }
                      elseif ($point_val['point_who_can_fix'][$i] == 'Basic user')
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
                <div class="form-group">
                  <span><strong>How do you fix it?</strong></span>
                  <input type="text" name="name" value="<?php echo $point_val['point_how_to_fix'][$i];?>" class="form-control">
                </div>
              </div>
            </div><!-- collapse -->
          </div><!-- checkbox -->
          <?php
            }
          }
          ?>
          <hr />
          <div class="personal-wrapper" id="wrapper-<?php echo $target[$i];?>">

          </div>
          <a href="#" class="btn btn-default add-field" id="add-<?php echo $target[$i];?>">Add personal judgement</a>
          <a href="#" class="btn btn-default save-field" id="save-<?php echo $target[$i];?>">Save</a>
      </div>
      <?php
        echo '</div>';
        echo '</div><!-- card -->';
        }
      }
      ?>

    </div>

    <!-- tab panel SOCIAL INTEGRATION -->
    <div role="tabpanel" class="tab-pane fade" id="tab5">

      <?php
      foreach ($section as $value) {
        if($value['section_cat'] == 'social integration')
        {
      ?>
      <div class="card">
        <a class="pull-right" data-toggle="collapse" href="#<?php echo $value['section_slug']?>">
          <i class="fa fa-chevron-down fa-fw"></i>
        </a>
        <h4 class="card-title"><?php echo strtoupper($value['section_name']); ?></h4>
        <span class="card-subtitle"><?php echo $value['section_desc']; ?></span>
        <hr>
        <div class="collapse in res" id="<?php echo $value['section_slug']?>">
        <div class="result-table-wrapper" style="display:none;" id="result-<?php echo $value['section_slug']?>">
          <div class="result-table">
            <table>
              <tr>
                <td rowspan="4" style="vertical-align:middle" class="table-score-wrapper">
                  <span class="table-score">100</span>
                  <span>score %</span>
                </td>
              </tr>
              <tr>
                <td><strong>8/10</strong></td>
                <td>Importance</td>
                <td rowspan="2" style="vertical-align:middle"><strong><em>What: <?php echo $value['section_desc']; ?></em></strong></td>
              </tr>
              <tr>
                <td>5/10</td>
                <td>Difficulty level</td>
              </tr>
              <tr>
                <td>na</td>
                <td>Last review score</td>
                <td><strong><em>Why: In 2015, Internet users only have prolonged interactions with websites that are easy to use.</em></strong></td>
              </tr>
            </table>
          </div>
          <a href="#" class="btn btn-default edit-field" id="edit-<?php echo $value['section_slug'];?>"><i class="fa fa-pencil"></i> Edit</a>
        </div><!-- Result table wrapper -->
        <div class="report-form" id="report-<?php echo $value['section_slug']?>">
          <p><strong>What needs fixing?</strong></p>
          <?php
          foreach ($point as $i => $point_val)
          {
            $target[$i] = $value['section_slug'].$i;
            if($value['id_section'] == $point_val['id_section'])
            {
          ?>
          <div class="checkbox">
            <label><input type="checkbox" data-toggle="collapse" data-target="#<?php echo $target[$i];?>"><?php echo $point_val['point_name'][$i]; ?></label>
            <div class="collapse" id="<?php echo $target[$i];?>">
              <div class="well">
                <div class="form-group">
                  <span><strong>Explanation</strong></span>
                  <input type="text" name="name" value="<?php echo $point_val['point_what_need_fixing'][$i];?>" class="form-control">
                </div>
                <div class="form-group">
                  <span><strong>Who can fix it?</strong></span>
                  <select class="form-control" name="">
                    <option value="">-- select user --</option>
                    <?php
                      if($point_val['point_who_can_fix'][$i] == 'Webmaster')
                      {
                        echo '<option value="Webmaster" selected>Webmaster</option>';
                        echo '<option value="Basic user">Basic user</option>';
                      }
                      elseif ($point_val['point_who_can_fix'][$i] == 'Basic user')
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
                <div class="form-group">
                  <span><strong>How do you fix it?</strong></span>
                  <input type="text" name="name" value="<?php echo $point_val['point_how_to_fix'][$i];?>" class="form-control">
                </div>
              </div>
            </div><!-- collapse -->
          </div><!-- checkbox -->
          <?php
            }
          }
          ?>
          <hr />
          <div class="personal-wrapper" id="wrapper-<?php echo $target[$i];?>">

          </div>
          <a href="#" class="btn btn-default add-field" id="add-<?php echo $target[$i];?>">Add personal judgement</a>
          <a href="#" class="btn btn-default save-field" id="save-<?php echo $target[$i];?>">Save</a>
      </div>
      <?php
        echo '</div>';
        echo '</div><!-- card -->';
        }
      }
      ?>

    </div>

    <!-- tab panel QUALITY/RETENTION/CONVERSION -->
    <div role="tabpanel" class="tab-pane fade" id="tab6">

      <?php
      foreach ($section as $value) {
        if($value['section_cat'] == 'quality/retention/convertion')
        {
      ?>
      <div class="card">
        <a class="pull-right" data-toggle="collapse" href="#<?php echo $value['section_slug']?>">
          <i class="fa fa-chevron-down fa-fw"></i>
        </a>
        <h4 class="card-title"><?php echo strtoupper($value['section_name']); ?></h4>
        <span class="card-subtitle"><?php echo $value['section_desc']; ?></span>
        <hr>
        <div class="collapse in res" id="<?php echo $value['section_slug']?>">
        <div class="result-table-wrapper" style="display:none;" id="result-<?php echo $value['section_slug']?>">
          <div class="result-table">
            <table>
              <tr>
                <td rowspan="4" style="vertical-align:middle" class="table-score-wrapper">
                  <span class="table-score">100</span>
                  <span>score %</span>
                </td>
              </tr>
              <tr>
                <td><strong>8/10</strong></td>
                <td>Importance</td>
                <td rowspan="2" style="vertical-align:middle"><strong><em>What: <?php echo $value['section_desc']; ?></em></strong></td>
              </tr>
              <tr>
                <td>5/10</td>
                <td>Difficulty level</td>
              </tr>
              <tr>
                <td>na</td>
                <td>Last review score</td>
                <td><strong><em>Why: In 2015, Internet users only have prolonged interactions with websites that are easy to use.</em></strong></td>
              </tr>
            </table>
          </div>
          <a href="#" class="btn btn-default edit-field" id="edit-<?php echo $value['section_slug'];?>"><i class="fa fa-pencil"></i> Edit</a>
        </div><!-- Result table wrapper -->
        <div class="report-form" id="report-<?php echo $value['section_slug']?>">
          <p><strong>What needs fixing?</strong></p>
          <?php
          foreach ($point as $i => $point_val)
          {
            $target[$i] = $value['section_slug'].$i;
            if($value['id_section'] == $point_val['id_section'])
            {
          ?>
          <div class="checkbox">
            <label><input type="checkbox" data-toggle="collapse" data-target="#<?php echo $target[$i];?>"><?php echo $point_val['point_name'][$i]; ?></label>
            <div class="collapse" id="<?php echo $target[$i];?>">
              <div class="well">
                <div class="form-group">
                  <span><strong>Explanation</strong></span>
                  <input type="text" name="name" value="<?php echo $point_val['point_what_need_fixing'][$i];?>" class="form-control">
                </div>
                <div class="form-group">
                  <span><strong>Who can fix it?</strong></span>
                  <select class="form-control" name="">
                    <option value="">-- select user --</option>
                    <?php
                      if($point_val['point_who_can_fix'][$i] == 'Webmaster')
                      {
                        echo '<option value="Webmaster" selected>Webmaster</option>';
                        echo '<option value="Basic user">Basic user</option>';
                      }
                      elseif ($point_val['point_who_can_fix'][$i] == 'Basic user')
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
                <div class="form-group">
                  <span><strong>How do you fix it?</strong></span>
                  <input type="text" name="name" value="<?php echo $point_val['point_how_to_fix'][$i];?>" class="form-control">
                </div>
              </div>
            </div><!-- collapse -->
          </div><!-- checkbox -->
          <?php
            }
          }
          ?>
          <hr />
          <div class="personal-wrapper" id="wrapper-<?php echo $target[$i];?>">

          </div>
          <a href="#" class="btn btn-default add-field" id="add-<?php echo $target[$i];?>">Add personal judgement</a>
          <a href="#" class="btn btn-default save-field" id="save-<?php echo $target[$i];?>">Save</a>
      </div>
      <?php
        echo '</div>';
        echo '</div><!-- card -->';
        }
      }
      ?>

    </div>

</div>

</div>