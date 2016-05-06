<a href="#" class="back-to-top"><i class="fa fa-chevron-circle-up fa-3x"></i></a>

<form action="" method="post" id="hidden-web-url">
  <!-- Keep the url being analyze -->
  <?php
    $hidden_url = $_GET["url"];
    if(strpos($hidden_url, 'http://') !== false || strpos($hidden_url, 'https://') !== false)
    {
      $hidden_url = parse_url($hidden_url, PHP_URL_HOST);
    }
    else
    {
      $hidden_url = parse_url('http://'.$hidden_url, PHP_URL_HOST);
    }
  ?>
  <input type="hidden" name="hidden-url" id="hidden-url" value="<?php echo str_ireplace('www.', '', $hidden_url); ?>" />
</form>
<div class="preload" style="display:none">
  <i class="fa fa-circle-o-notch fa-spin"></i> <span>Getting results...<span id="load-status"></span></span>
</div>
<div class="result">
  <div id="test-scraping">

  </div>
  <a href="#" class="btn btn-default save-all pull-right" id="save-all" style="margin-right:50px; margin-top:30px">Save All</a>
  <div class="result-title">
    <span>Analysis of <span style="color: #0D8FDB;">http://<?= $hidden_url ?></span>
    <span class="result-date"><i class="fa fa-calendar"></i> <?= date("Y F d"); ?></span>
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
  <hr>
  <div class="result-navbar">
    <ul class="list-unstyled">
      <li class="active"><a href="#tab0" role="tab" data-toggle="tab"><i class="fa fa-sitemap fa-fw"></i> Site Structure</a></li>
      <li><a href="#tab1" role="tab" data-toggle="tab"><i class="fa fa-globe fa-fw"></i> SEO</a></li>
      <li><a href="#tab2" role="tab" data-toggle="tab"><i class="fa fa-bar-chart fa-fw"></i> Ranking</a></li>
      <li><a href="#tab3" role="tab" data-toggle="tab"><i class="fa fa-file-o fa-fw"></i> Content Management</a></li>
      <li><a href="#tab4" role="tab" data-toggle="tab"><i class="fa fa-hashtag fa-fw"></i> Social Integration</a></li>
      <li><a href="#tab5" role="tab" data-toggle="tab"><i class="fa fa-diamond fa-fw"></i> Quality/Retention/Convertion</a></li>
    </ul>
  </div>
  <!-- Tab content -->
  <div class="tab-content">
    <?php
    // echo var_dump($data);
    // category loop
    $i = 0;
    $section_count = 0;
    foreach ($data as $category => $section) { ?>
      <div role="tabpanel" class="tab-pane fade<?php if ($i == 0)echo " in active" ?>" id="tab<?php echo $i;?>">

        <?php $section_count += count($section);
        //section loop
        foreach ($section as $section_name => $section_value) { ?>
          <div class="card">
            <a class="pull-right" data-toggle="collapse" href="#<?php echo $section_value['section_slug']?>">
              <i class="fa fa-chevron-down fa-fw"></i>
            </a>
            <h4 class="card-title"><?php echo strtoupper($section_name); ?></h4>
            <span class="card-subtitle"><?php echo $section_value['section_desc']; ?></span>
            <hr>
            <div class="collapse in res" id="<?php echo $section_value['section_slug']?>">
              <div class="result-table-wrapper" style="display:none;" id="result-<?php echo $section_value['section_slug']?>">
                <input type="hidden" class="_section" value="<?php echo strtoupper($section_name); ?>" data-id="<?php echo $section_value['id_section']; ?>" data-why="<?php echo $section_value['section_why']?>" data-importance="<?php echo $section_value['section_importance']?>" data-score="40" />
                <div class="result-table">
                  <table>
                    <tr>
                      <td rowspan="4" style="vertical-align:middle" id="section-score-<?php echo $section_value['section_slug']?>" class="table-score-wrapper">
                        <div id="current-score-<?php echo $section_value['section_slug']?>">
                          <span class="table-score">100</span>
                          <span>score %</span>
                          <span><a href="#" class="btn btn-default edit-score" data-section-name="<?php echo $section_value['section_slug']?>" id="edit-section-score-<?php echo $section_value['section_slug']?>">Edit Score</a></span>
                        </div>
                        <div id="new-score-<?php echo $section_value['section_slug']?>" style="display:none;" class="new-score">
                          <span>Insert New Score</span>
                          <span><input type="number" min="0" max="100" id="input-new-score-<?php echo $section_value['section_slug']?>" value=0></span>
                          <span><a href="#" class="btn btn-default save-score" data-section-name="<?php echo $section_value['section_slug']?>" id="save-new-score-<?php echo $section_value['section_slug']?>">Save New Score</a></span>
                          <span id="new-score-warning-<?php echo $section_value['section_slug']?>" class="new-score-warning" style="display:none;">Insert Score Between 0 - 100</span>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td><strong><?php echo $section_value['section_importance']?>/10</strong></td>
                      <td>Importance</td>
                      <td rowspan="2" style="vertical-align:middle"><strong><em>What: <?php echo $section_value['section_desc']; ?></em></strong></td>
                    </tr>
                    <tr>
                      <td><?php echo $section_value['section_difficulty']?>/10</td>
                      <td>Difficulty level</td>
                    </tr>
                    <tr>
                      <td>na</td>
                      <td>Last review score</td>
                      <td><strong><em>Why: <?php echo $section_value['section_why']; ?> </em></strong></td>
                    </tr>
                  </table>
                </div>
                <a href="#" data-section-name="<?php echo $section_value['section_slug']?>" class="btn btn-default edit-field" id="edit-<?php echo $section_value['section_slug'];?>"><i class="fa fa-pencil"></i> Edit</a>
              </div><!-- Result table wrapper -->
              <div class="report-form" id="report-<?php echo $section_value['section_slug']?>">
                <?php
                  if($section_value['section_slug'] == 'link-profile')
                  {
                ?>
                <p><strong>Upload Majestic result screenshot here</strong></p>
                <form id="image-uploader-form">
                  <div class="well col-md-4">
                    <div class="img-thumb-wrapper">
                      <span class="btn btn-default btn-upload text-center">
                        <span>Browse image...</span><input type="file" name="image" entype="multipart/form-data">
                      </span>
                      <div class="img-thumb" style="display:none;"></div>
                      <input type="hidden" name="img-name" id="img-name"/>
                    </div>
                  </div>
                </form>
                <div class="clearfix"></div>
                <?php } ?>
                <p><strong>What needs fixing?</strong></p>
                <form class="" action="" method="post" id="form-<?php echo $section_value['section_slug']?>">
                  <input id="" name="section-score-<?php echo $section_value['id_section']?>" type="hidden" value="section-score" checked>
                  <input type="hidden" value="0" name="score-section-score-<?php echo $section_value['id_section']?>" class="score-<?php echo $section_value['section_slug']?>">
                  <input type="hidden" value="<?php echo $section_value['id_section']?>" name="section-id-section-score-<?php echo $section_value['id_section']?>">

                  <?php
                  //point loop
                  foreach ($section_value['point'] as $point_value) { ?>
                    <div class="checkbox">
                      <div class="input-group col-md-6" style="margin-bottom:15px;">
                        <span class="form-control" id="text-<?php echo $point_value['id_point'];?>"><strong><?php echo $point_value['point_name']; ?></strong></span>
                        <div class="input-group-btn" data-toggle="buttons">
                          <span class="btn btn-default point-status" data-toggle="tooltip" data-placement="top" title="This point is working" data-id="<?php echo $point_value['id_point']; ?>">
                              <input type="radio" name="point-status" value="working"><i class="fa fa-check fa-fw"></i>
                          </span>
                          <span class="btn btn-default point-status" data-toggle="tooltip" data-placement="top" title="This point need fixing" data-id="<?php echo $point_value['id_point']; ?>">
                              <input type="radio" name="point-status" value="need-fixing"><i class="fa fa-exclamation fa-fw"></i>
                          </span>
                          <span class="btn btn-default point-status" data-toggle="tooltip" data-placement="top" title="Exclude this point" data-id="<?php echo $point_value['id_point']; ?>">
                            <input type="radio" name="point-status" value="exclude">  <i class="fa fa-times fa-fw"></i>
                          </span>
                        </div>
                      </div>

                      <label style="position:absolute; visibility:hidden">
                        <input type="hidden" value="off" name="<?php echo $point_value['id_point']; ?>" id="check-status-<?php echo $point_value['id_point']; ?>">
                        <input id="check-<?php echo $point_value['id_point'];?>"
                        name="<?php echo $point_value['id_point']; ?>"
                        type="checkbox" data-toggle="collapse"
                        data-target="#well-fix<?php echo $point_value['id_point'];?>"
                        onclick="onClickPointCheck(<?php echo $point_value['id_point']; ?>)"; >
                        <input type="hidden" name="source-<?php echo $point_value['id_point']; ?>"
                        value="<?php echo $point_value['id_source'];?>" class="form-control" id="source-<?php echo $point_value['id_point']; ?>">
                        <span></span> <a href="#" class="exclude-point" data-active="1" data-id="<?php echo $point_value['id_point'];?>"><i class="fa fa-times-circle fa-fw" style="color:#f03"></i></a>
                      </label>
                      <div class="collapse in" id="well-desc-<?php echo $point_value['id_point'];?>">
                        <div class="well">
                          <div class="form-group">
                            <span><strong>Description</strong></span>
                            <input type="text" name="description-<?php echo $point_value['id_point']; ?>" id="description-<?php echo $point_value['id_point']; ?>" value="<?php echo $point_value['point_desc'];?>" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="collapse" id="well-fix-<?php echo $point_value['id_point'];?>">
                        <div class="well">
                          <div class="form-group">
                            <span><strong>Explanation</strong></span>
                            <input type="text" name="explanation-<?php echo $point_value['id_point']; ?>" id="explanation-<?php echo $point_value['id_point']; ?>" value="<?php echo $point_value['point_what_need_fixing'];?>" class="form-control" disabled>
                          </div>
                          <div class="form-group">
                            <span><strong>Who can fix it?</strong></span>
                            <select class="form-control" name="who-fix-<?php echo $point_value['id_point']; ?>" id="who-fix-<?php echo $point_value['id_point']; ?>" disabled>
                              <?php
                              if($point_value['point_who_can_fix'] == 'Webmaster')
                              {
                                echo '<option value="Webmaster" selected>Webmaster</option>';
                                echo '<option value="Basic user">Basic user</option>';
                              }
                              elseif ($point_value['point_who_can_fix'] == 'Basic user')
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
                            <input type="text" name="how-fix-<?php echo $point_value['id_point']; ?>" id="how-fix-<?php echo $point_value['id_point']; ?>" value="<?php echo $point_value['point_how_to_fix'];?>" class="form-control" disabled>
                          </div>
                        </div>
                      </div><!-- collapse -->
                    </div><!-- checkbox -->
                    <?php /*point loop*/ } ?>
                    <hr />
                    <div class="personal-wrapper" id="wrapper-<?php echo $section_value['id_section']?>">

                    </div>
                  </form>
                  <a href="javascript:void(0)" class="btn btn-primary save-field" id="save-<?php echo $section_value['id_section'];  ?>" data-section-name="<?php echo $section_value['section_slug']?>">Save</a>
                  <a href="javascript:void(0)" class="btn btn-default add-field" id="add-<?php echo $section_value['id_section']; ?>" data-section-id=<?php echo $section_value['id_section']; ?>><i class="fa fa-plus-circle fa-fw"></i> Personal judgement</a>
                </div>
              </div>
            </div><!-- card -->
            <?php /*Section loop*/ } ?>

          </div><!-- tab-pane -->
          <?php $i++;?>
          <?php /*category loop*/ } ?>

          <div id="total-section" style="display:none;"><?= $section_count ?></div>
          <div id="saved-section" style="display:none;">0</div>
        </div><!-- tab content -->

      </div><!-- Result -->
<!-- Modal -->

<!-- Save Section Modal -->
<div id="save-section" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Please Save All Section</h4>
      </div>
      <div class="modal-body">
        <p>Some sections are not saved. Please double check your work and save each section.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Save Section Modal -->

<!-- Loading Save to DB Modal -->
<div id="loading-save" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Please Wait</h4>
      </div>
      <div class="modal-body">
        <p>Saving submitted data to database. You will be redirected soon.</p>
        <div class="preload">
          <i class="fa fa-circle-o-notch fa-spin"></i> <span>Saving...<span id="load-status"></span></span>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- Loading Save to DB Modal -->

<!-- Modal -->

<!-- Priority Task and Report Summary Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="modal-priority">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">PRIORITY TASK & REPORT SUMMARY</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group priority-result"></div>
          <div class="form-group">
            <input type="hidden" name="report-summary" id="report-summary-result">
          </div>
        </form>

        <div class="priority-summary-result" style="display:none">
          <input type="hidden" value="false" id="state">
          <div class="priority-table-wrapper"></div>
          <h3>Report Summary</h3>
          <p class="report-summary"></p>
        </div>

        <div class="priority-summary-form">
          <fieldset>
            <legend>Priority Task</legend>
            <span>How you want to generate priority task?</span>
            <div class="radio">
              <label>
                <input type="radio" name="set-priority-task" id="optionsRadios1" value="auto">
                Automatically generate priority task for this report
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="set-priority-task" id="optionsRadios2" value="manual">
                Manually choose priority task for this report <small style="color:#999; font-style:italic">(Only 4 max priority task of each report)</small>
              </label>
            </div>
            <hr />
            <div class="priority-container" style="display:none">
              <div class="priority-block-wrapper">
              <div class="priority-block" data-id="0">
                <a href="#" class="pull-right remove-priority-task"><i class="fa fa-times fa-fw"></i></a>
                <h4>Priority Task 1</h4>
                <form class="form-inline select-priority-type">
                  <div class="form-group">
                    <select class="form-control priority-type" id="priority-type-0" data-id="0">
                      <option>-- Select type of priority task --</option>
                      <option value="section">Section</option>
                      <option value="sub-section">Sub Section</option>
                      <option value="point">Point</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <select class="form-control result-type-0" name="" id="result-type-0">
                      <option>-- Section --</option>
                    </select>
                  </div>
                </form>
                <form>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>What?</label>
                        <input type="text" class="form-control" readonly id="priority-what-0">
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <label>Why?</label>
                        <input type="text" class="form-control" id="priority-why-0">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>How to fix it:</label>
                    <input type="text" class="form-control" id="priority-how-0">
                  </div>
                </form>
              </div><!-- Priority block -->
            </div>
            <a href="#" class="add-priority-task btn btn-default">Add priority task</a>
            <hr />
          </div>
          </fieldset>
          <fieldset>
            <legend>Report Summary</legend>
            <div class="form-group">
              <textarea rows="8" cols="40" class="form-control" id="report-summary"></textarea>
            </div>
          </fieldset>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="#" class="btn btn-default pull-left" id="btn-edit-summary" style="display:none"><i class="fa fa-pencil fa-fw"></i> Edit</a>
        <a href="#" class="btn btn-primary" id="btn-save-summary">Show preview</a>
        <button type="button" class="btn btn-primary" id="save-all-report" style="display:none">Save changes</button>
      </div>
    </div>
  </div>
</div>
