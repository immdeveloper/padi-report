var base_url = $('#base_url').val();

$(document).ready(function(){
  changeIconOnCollapse();
  dataTable();
  dynamic_form();
  dynamic_point_check();
  dynamic_priority_task_form();
  backtotop();
  getPriorityType();
  $('.modal').on('hidden.bs.modal', function(e)
  {
      $(this).removeData();
  }) ;
});

function getSectionMeta()
{
  var section = new Array();
  var section_count = $('._section').length;
  for (var i = 0; i < section_count; i++) {
    section[i] = {
      section_name: $('._section').eq(i).val(),
      section_id: $('._section').eq(i).data('id'),
      section_importance: $('._section').eq(i).data('importance'),
      section_score: $('._section').eq(i).attr('data-score'),
      section_why: $('._section').eq(i).data('why'),
      section_priority: 0
    };
  }

  return section;
}

function calculatePriority()
{
  var section = getSectionMeta();
  var tmp1 = new Array();
  var tmp2 = new Array();
  var priority_point = new Array();
  var priority_task = new Array();
  for (var i = 0; i < section.length; i++)
  {
    tmp1[i] = parseInt(section[i]['section_score']) / parseInt(section[i]['section_importance']);
    tmp2[i] = tmp1[i] / parseInt(section[i]['section_importance']);
    section[i].section_priority = parseFloat(tmp2[i]).toFixed(2);
  }

  section.sort(function(a,b){
    return parseFloat(a.section_priority) - parseFloat(b.section_priority);
  });

  for (var i = 0; i < 4; i++) {
    priority_task[i] = section[i];
  }

  priority_task.sort(function(a,b){
    return parseInt(a.section_id) - parseInt(b.section_id);
  });


  return priority_task;
}

function priority_summary_validation()
{
  var pass = true;
  /*Form Validation for all input*/
  if($('input[type=radio][name=set-priority-task]:checked').val() == 'manual')
  {
    $('.priority-block input').each(function(){
      if($(this).val() == "")
      {
        $(this).addClass('not-valid');
        pass = false;
      }
      else
      {
        $(this).removeClass('not-valid');
      }
    });
  }

  /*Form Validation for textarea*/
  if($('.modal-body #report-summary').val().trim().length == 0)
  {
    $('.modal-body #report-summary').addClass('not-valid');
    pass = false;
  }
  else
  {
    $('.modal-body #report-summary').removeClass('not-valid');
  }

  /*Form Validation radio button*/
  if($('input[type=radio][name=set-priority-task]').is(':checked') == false)
  {
    $('input[type=radio][name=set-priority-task]').closest('label').css('color', '#f03');
    pass = false;
  }
  else
  {
    $('input[type=radio][name=set-priority-task]').closest('label').css('color', '#333');
  }

  return pass;
}

function getPriorityType()
{
  /*Save Priority and Summary*/
  $(document).on("click", "#btn-save-summary", function(e){
    e.preventDefault();
    var pass = priority_summary_validation();

    /*Validation passed*/
    if(pass == true)
    {
      var type = '';
      var count = 4;
      var arr = new Array();

      $('.priority-summary-result').fadeIn();
      $('.priority-summary-form').fadeOut();
      $('.modal-footer #save-all-report').fadeIn();
      $('.modal-footer #btn-edit-summary').fadeIn();
      $('.modal-footer #btn-save-summary').fadeOut();

      /*Manual priority*/
      if($('input[type=radio][name=set-priority-task]:checked').val() == 'manual')
      {
        type = 'manual';
        count = $('.priority-block').length;
        for (var i = 0; i < count; i++) {
          arr[i] = $('.priority-block').eq(i).data('id');
        }
      }
      else
      {
        type = 'auto';
        arr = calculatePriority();
        $('#state').val('true');
      }

      loopPriorityResult(count, arr, type);
      loopPriorityTable(count, arr, type);
      $('.report-summary').html($('.modal-body #report-summary').val());
      $('.modal-body #report-summary-result').val($('.modal-body #report-summary').val());
    }
    else {
      alert('error');
    }
  });

  /*Edit Priority and Summary*/
  $(document).on("click", "#btn-edit-summary", function(e){
    e.preventDefault();
    $('.modal-footer #save-all-report').fadeOut();
    $('.modal-footer #btn-edit-summary').fadeOut();
    $('.modal-footer #btn-save-summary').fadeIn();
    $('.priority-summary-result').fadeOut();
    $('.priority-summary-form').fadeIn();
  });

  /*Check priority*/
  $('input[type=radio][name=set-priority-task]').change(function() {
        if ($(this).val() == 'auto') {
            $('.priority-container').fadeOut();
        }
        else if ($(this).val() == 'manual') {
            $('.priority-container').fadeIn();
            $('.priority-block input').each(function(){
              $(this).removeClass('not-valid');
            });
        }
    });

  $('.priority-type').on('change', function() {
    var id = $(this).data('id');
    var value = $(this).val();
    $.ajax({
      url: base_url + 'priority-type/' + value,
      type: 'POST',
      dataType: 'json',
      beforeSend: function() {

      },
      error: function() {
        alert('priority type error');
      },
      success: function(res) {
        var data = '';
        var index = '';
        var why = '';
        var how = '';

        $('.modal-body #result-type-' + id)
            .empty()
            .append($("<option></option>")
                       .attr("value", "")
                       .text("-- select " + value + "--"));

        $.each(res, function(key, output) {
          if(value == 'section')
          {
            val = output.section_cat;
            data = val.substr(0,1).toUpperCase()+val.substr(1);
            index = output.id_section;
          }
          else if(value == 'sub-section')
          {
            data = output.section_name;
            index = output.id_section;
          }
          else if (value == 'point')
          {
            data = output.point_name;
            index = output.id_point;
            why = output.point_what_need_fixing;
            how = output.point_how_to_fix;
          }
             $('.modal-body #result-type-' + id)
                 .append($("<option></option>")
                            .attr("value", index)
                            .attr("data-why", why)
                            .attr("data-how", how)
                            .text(data));
        });

        $('.modal-body #result-type-' + id).on('change', function() {
          $('.modal-body #priority-what-' + id).val($(this).find(':selected').text());
          $('.modal-body #priority-why-' + id).val($(this).find(':selected').data('why'));
          $('.modal-body #priority-how-' + id).val($(this).find(':selected').data('how'));
        });

     },
   });
  });
}

function loopPriorityResult(count, arr, type)
{
  $('.priority-result').empty();
  if(type == 'manual')
  {
    for (var i = 0; i < count; i++)
    {
      $('.priority-result').append(
        '<div class="form-group">' +
        '<input type="hidden" name="priority-what[]" id="priority-result-what-' + i + '" value="'+ $('.modal-body #priority-what-' + arr[i]).val() +'">' +
        '<input type="hidden" name="priority-why[]" id="priority-result-why-' + i + '" value="'+ $('.modal-body #priority-why-' + arr[i]).val() +'">' +
        '<input type="hidden" name="priority-how[]" id="priority-result-how-' + i + '" value="' + $('.modal-body #priority-how-' + arr[i]).val() + '">' +
        '</div>'
      );
    }
  }
  else
  {
    for (var i = 0; i < count; i++)
    {
      $('.priority-result').append(
        '<div class="form-group">' +
        '<input type="hidden" name="priority-what[]" id="priority-result-what-' + i + '" value="'+ arr[i].section_name +'">' +
        '<input type="hidden" name="priority-why[]" id="priority-result-why-' + i + '" value="'+ arr[i].section_why +'">' +
        '<input type="hidden" name="priority-how[]" id="priority-result-how-' + i + '" value="lorem ipsum">' +
        '</div>'
      );
    }
  }
}

function loopPriorityTable(count, arr, type)
{
  $('.priority-table-wrapper').empty();

  if(type == 'manual')
  {
      for (var i = 0; i < count; i++)
      {
        $('.priority-table-wrapper').append(
          '<div class="result-table priority-table">' +
            '<table>' +
              '<tr>' +
                '<td rowspan="3" class="table-score-wrapper">' +
                  '<span class="text-red text-priority">PRIORITY TASK</span>' +
                '</td>' +
                '<td style="width:110px;">What?</td>' +
                '<td><strong>'+ $('.modal-body #priority-what-' + arr[i]).val().toUpperCase() +'</strong></td>' +
              '</tr>' +
              '<tr>' +
                '<td style="width:110px;">Why?</td>' +
                '<td>'+ $('.modal-body #priority-why-' + arr[i]).val() +'</td>' +
              '</tr>' +
              '<tr>' +
                '<td style="width:110px;">How to fix it:</td>' +
                '<td>'+ $('.modal-body #priority-how-' + arr[i]).val() +'</td>' +
              '</tr>' +
            '</table>' +
          '</div>'
        );
      }
  }
  else
  {
    for (var i = 0; i < count; i++)
    {
      $('.priority-table-wrapper').append(
        '<div class="result-table priority-table">' +
          '<table>' +
            '<tr>' +
              '<td rowspan="3" class="table-score-wrapper">' +
                '<span class="text-red text-priority">PRIORITY TASK</span>' +
              '</td>' +
              '<td style="width:110px;">What?</td>' +
              '<td><strong>'+ arr[i].section_name +'</strong></td>' +
            '</tr>' +
            '<tr>' +
              '<td style="width:110px;">Why?</td>' +
              '<td>'+ arr[i].section_why +'</td>' +
            '</tr>' +
            '<tr>' +
              '<td style="width:110px;">How to fix it:</td>' +
              '<td>score: '+ arr[i].section_score +' priority: '+ arr[i].section_priority +'</td>' +
            '</tr>' +
          '</table>' +
        '</div>'
      );
    }
  }

}

function backtotop()
{
  if ($('.back-to-top').length) {
    var scrollTrigger = 100, // px
        backToTop = function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('.back-to-top').addClass('show');
            } else {
                $('.back-to-top').removeClass('show');
            }
        };
    backToTop();
    $(window).on('scroll', function () {
        backToTop();
    });
    $('.back-to-top').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });
  }
}

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

//setup before functions
var typingTimer;                //timer identifier
var doneTypingInterval = 1000;  //time in ms, 5 second for example
var url = $('#web-url');
var btn_submit = $('#btn-submit');
btn_submit.prop('disabled', true); //disable submit button by default

btn_submit.click(function(e){ //on btn_submit click in index page
  e.preventDefault();
  var weburl = $('#web-url').val(); //get weburl value pass to form page
  window.location.replace(base_url + 'website-review-form/?url=' + weburl);
});

//on keyup, start the countdown
url.on('keyup', function () {
  clearTimeout(typingTimer);
  typingTimer = setTimeout(doneTyping, doneTypingInterval);
});

//on keydown, clear the countdown
url.on('keydown', function () {
  clearTimeout(typingTimer);
});

//user is "finished typing," do something
function doneTyping () {
  var url_text = $(url).val();
  //var regex = /^(http|https)?:\/\/[a-zA-Z0-9-\.]+\.[a-z]{2,4}/;
  var regex = /^(http)?(s)?(:\/\/)?(www\.)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/;
  $(url).popover({
    content:'url is not valid',
    trigger:'manual',
    placement:'bottom'
  });
  if(regex.test(url_text) == false)
  {
    $(url).popover('show');
    btn_submit.prop('disabled', true);
  }
  else
  {
    $(url).popover('hide');
    btn_submit.prop('disabled', false);
  }
}

/*Change arrow on sidebar icon when collapse*/
function changeIconOnCollapse()
{
  $('.sub-menu').on('show.bs.collapse', function () {
      $(this).parent().find(".arrow-drop").addClass("open");
  });

  $('.sub-menu').on('hide.bs.collapse', function () {
      $(this).parent().find(".arrow-drop").removeClass("open");
  });
}

/*Load Datatable*/
function dataTable()
{
  $('.datatable').DataTable();
}

//onClick point-check checkbox -> disable input field base on checkbox state
function onClickPointCheck(id){
  //if description currently disable i.e checkbox is in checked state
  //enable description, disable explanation, who fix, how fix
  if($('#description-'+id).prop('disabled')){
    $('#well-fix-'+id).collapse("toggle")
    $('#well-desc-'+id).collapse("toggle")
    // $('#check-'+id).attr('data-target', "#well-desc-" + id );
    $('#description-'+id).prop('disabled', false);
    $('#explanation-'+id).prop('disabled', true);
    $('#who-fix-'+id).prop('disabled', true);
    $('#how-fix-'+id).prop('disabled', true);
  }else{//else description currently enable i.e checkbox is in unchecked state
    //disable description, enable explanation, who fix, how fix
    $('#well-desc-'+id).collapse("toggle")
    $('#well-fix-'+id).collapse("toggle")
    // $('#check-'+id).attr('data-target', "#well-fix-" + id );
    $('#description-'+id).prop('disabled', true);
    $('#explanation-'+id).prop('disabled', false);
    $('#who-fix-'+id).prop('disabled', false);
    $('#how-fix-'+id).prop('disabled', false);
  }
}

/*Exclude point from report*/
$('.exclude-point').click(function(e){
  e.preventDefault();
  var id = $(this).data('id');
  if($(this).attr('data-active') == 1)
  {
    $(this).attr('data-active', 0);
    $(this).find('i').attr('class', 'fa fa-check-circle fa fw');
    $(this).find('i').css('color', '#7AA93C');
    $('#check-'+id).attr('checked', false);
    $('#well-' +id).collapse( "hide" );
    $('#check-'+id).attr('aria-expanded', true);
    $('#check-'+id).prop('disabled', true);
    $('#check-status-'+id).prop('disabled', true);
    $('#source-'+id).prop('disabled', true);
    $('#description-'+id).prop('disabled', true);
    $('#explanation-'+id).prop('disabled', true);
    $('#who-fix-'+id).prop('disabled', true);
    $('#how-fix-'+id).prop('disabled', true);
    $('#text-'+id).css('text-decoration', 'line-through');
  }
  else
  {
    $(this).attr('data-active', 1);
    $(this).find('i').attr('class', 'fa fa-times-circle fa fw');
    $(this).find('i').css('color', '#F03');
    $('#check-'+id).prop('disabled', false);
    $('#check-status-'+id).prop('disabled', false);
    $('#source-'+id).prop('disabled', false);
    $('#description-'+id).prop('disabled', false);
    // only enable description because the current state of the checkbox is unchecked
    // $('#explanation-'+id).prop('disabled', false);
    // $('#who-fix-'+id).prop('disabled', false);
    // $('#how-fix-'+id).prop('disabled', false);
    $('#text-'+id).css('text-decoration', 'none');
  }

});

/*Getting Google Page Insights Results*/
$('#btn-analyze').click(function(){
  var url = $('#web-url').val();
  $('#hidden-url').val(url);
  $.ajax({
    url: 'run',
    type: 'POST',
    dataType: 'json',
    data: 'url=' + url,
    beforeSend: function() {
      $('.preload').fadeIn();
      $('#load-status').html('Preparing fetching data');
    },
    error: function() {
      alert('error');
    },
    success: function(res) {
      console.log(res);
      $('#load-status').html('Google PageSpeed API');
      setTimeout(runPagespeed(url, 'desktop'), 0);

      callbacks.displayResult = function(result) {
        $('.preload').fadeOut();
        $('.result').fadeIn();

        var title = result.title;
        var score = result.ruleGroups.SPEED.score + '/100';
        var id = result.id;
        var data = result.screenshot.data;
        var screenshot = data.replace( /\_/g, '/');
        screenshot = screenshot.replace(/\-/g,'+');
        var image = 'data:image/jpeg;base64,' + screenshot;

        $('.website-thumb img').attr('src', image);
        $('#desktop-score').html(score);
        $('#test-url').attr('href', id);
        $('#test-url').html(id);

        $('#load-status').html('Data scraping from Simple HTML DOM');
        $('#test-scraping').html('Google page index: ' + res.google_page_index_result + ' | Bing page index: ' + res.bing_page_index_result);

        $('.preload').fadeOut();
     };
   },
   complete: function() {

   }
  });

})
/*Getting Google Page Insights Results*/

/*Add Priority task form*/
function dynamic_priority_task_form()
{
  var max_fields      = 4; //maximum input boxes allowed
  var wrapper         = $('.priority-block-wrapper'); //Fields wrapper
  var add_button      = $('.add-priority-task'); //Add button ID

  var x = 1; //initlal text box count
  var id = 0;

  $(add_button).click(function(e){ //on add input button click
      e.preventDefault();
      if(x < max_fields){ //max input box allowed
          x++; //text box increment
          if(x == 4)
          {
           $(this).attr('disabled', true);
          }
          id++;
          $(wrapper).append(
            '<div class="priority-block" data-id="'+ id +'">' +
              '<a href="#" class="pull-right remove-priority-task"><i class="fa fa-times fa-fw"></i></a>' +
              '<h4>Priority Task ' + x + '</h4>' +
              '<form class="form-inline select-priority-type">' +
                '<div class="form-group" style="margin-right:5px">' +
                  '<select class="form-control priority-type" id="priority-type-'+ id +'" data-id="'+ id +'">' +
                    '<option>-- Select type of priority task --</option>' +
                    '<option value="section">Section</option>' +
                    '<option value="sub-section">Sub Section</option>' +
                    '<option value="point">Point</option>' +
                  '</select>' +
                '</div>' +
                '<div class="form-group">' +
                  '<select class="form-control" id="result-type-'+ id +'">' +
                    '<option>-- Section --</option>' +
                  '</select>' +
                '</div>' +
              '</form>' +
              '<form>' +
                '<div class="row">' +
                  '<div class="col-md-4">' +
                    '<div class="form-group">' +
                      '<label>What?</label>' +
                      '<input type="text" class="form-control" readonly id="priority-what-'+ id +'">' +
                    '</div>' +
                  '</div>' +
                  '<div class="col-md-8">' +
                    '<div class="form-group">' +
                      '<label>Why?</label>' +
                      '<input type="text" class="form-control" id="priority-why-'+ id +'">' +
                    '</div>' +
                  '</div>' +
                '</div>' +
                '<div class="form-group">' +
                  '<label>How to fix it:</label>' +
                  '<input type="text" class="form-control" id="priority-how-'+ id +'">' +
                '</div>' +
              '</form>' +
            '</div><!-- Priority block -->'
          ); //add input box
          getPriorityType();
      }
  });

  $(wrapper).on("click",".remove-priority-task", function(e){ //user click on remove text
      e.preventDefault();
      if(x != 1)
      {
        $(this).closest('.priority-block').remove(); x--;
        $(add_button).attr('disabled', false);
      }
  })
}

//personal judgment generator
function dynamic_form()
{
  var max_fields      = 10; //maximum input boxes allowed
  var wrapper         = $(".personal-wrapper"); //Fields wrapper
  var add_button      = $(".add-field"); //Add button ID

  var x = 1; //initlal text box count
  $(add_button).click(function(e){ //on add input button click
      e.preventDefault();
      var section_id = $(this).data('section-id');
      var id = $(this).attr('id');
      var id_wrapper = $('#'+id).closest('div').find(wrapper).attr('id');
      // alert(section_id);
      if(x < max_fields){ //max input box allowed
          x++; //text box increment
          $('#'+id_wrapper).append(
            '<div class="well">' +
                '<a href="#" class="pull-right remove-field"><i class="fa fa-times fa-fw"></i></a>' +
              '<div class="clearfix"></div>' +
              '<input id="check-'+section_id+'" name="personal-'+section_id + x +'" style="display:none" type="checkbox" value="personal" checked>' +
              '<div class="row">' +
                '<div class="col-md-4 col-lg-4" style="padding-right:0">' +
                  '<div class="form-group">' +
                    '<span><strong>What needs fixing?</strong></span>' +
                    '<input type="hidden" value="'+section_id+'" name="id-section-personal-'+section_id + x +'">' +
                    '<input type="text" name="name-personal-'+section_id + x +'" value="" class="form-control">' +
                  '</div>' +
                '</div>' +
                '<div class="col-md-8">' +
                  '<div class="form-group">' +
                    '<span><strong>Explanation</strong></span>' +
                    '<input type="text" name="explanation-personal-'+section_id + x +'" value="" class="form-control">' +
                  '</div>' +
                '</div>' +
              '</div>' +
              '<div class="form-group">' +
                '<span><strong>Who can fix it?</strong></span>' +
                '<select class="form-control" name="who-fix-personal-'+section_id + x +'">' +
                  '<option value="">-- select user --</option>' +
                  '<option value="Webmaster">Webmaster</option>' +
                  '<option value="Basic user">Basic user</option>' +
                '</select>' +
              '</div>' +
              '<div class="form-group">' +
                '<span><strong>How do you fix it?</strong></span>' +
                '<input type="text" name="how-fix-personal-'+section_id + x +'" value="" class="form-control">' +
              '</div>' +
            '</div>'
          ); //add input box
      }
  });

  $(wrapper).on("click",".remove-field", function(e){ //user click on remove text
      e.preventDefault(); $(this).closest('.well').remove(); x--;
  })
}

//edit point check in backend
function dynamic_point_check()
{
  var max_fields      = 10; //maximum input boxes allowed
  var wrapper         = $(".point-check-wrapper"); //Fields wrapper
  var add_button      = $(".add-point-check"); //Add button ID

  var x = 0; //initlal text box count
  $(add_button).click(function(e){ //on add input button click
      e.preventDefault();
      if(x < max_fields){ //max input box allowed
          x++; //text box increment
          $(wrapper).append(
            '<div class="card">' +
              '<fieldset>' +
                '<legend>Point Check ' + x + ' <a href="javascript:void(0)" class="remove-point-check pull-right"><i class="fa fa-remove"></i></a></legend>' +
                '<div class="form-group">' +
                  '<label>Point check name</label>' +
                  '<input type="text" class="form-control" name="point_check_name[]">' +
                '</div>' +
                '<div class="row">' +
                  '<div class="col-md-6">' +
                    '<div class="form-group">' +
                      '<label>What needs fixing?</label>' +
                      '<input type="text" class="form-control" name="point_what_need_fixing[]">' +
                    '</div>' +
                  '</div>' +
                  '<div class="col-md-6">' +
                    '<div class="form-group">' +
                      '<label>Description</label>' +
                      '<input type="text" class="form-control" name="point_desc[]">' +
                    '</div>' +
                  '</div>' +
                '</div>' +
                '<div class="row">' +
                  '<div class="col-md-6">' +
                    '<div class="form-group">' +
                      '<label>Who can fix it?</label>' +
                      '<select class="form-control" name="point_who_can_fix[]">' +
                        '<option value="">-- select user --</option>' +
                        '<option value="Webmaster">Webmaster</option>' +
                        '<option value="Basic user">Basic user</option>' +
                      '</select>' +
                    '</div>' +
                  '</div>' +
                  '<div class="col-md-6">' +
                    '<div class="form-group">' +
                      '<label>How do you fix it?</label>' +
                      '<input type="text" class="form-control" name="point_how_to_fix[]">' +
                    '</div>' +
                  '</div>' +
                '</div>' +
              '</fieldset>' +
            '</div>'
          ); //add input box
      }
  });

  $(wrapper).on("click",".remove-point-check", function(e){
      e.preventDefault(); $(this).closest('.card').remove(); x--;
  });
}

$('.save-field').click(function(e){
  e.preventDefault();
  var save_id = $(this).attr('id');
  var sectionName = $(this).data('section-name');

  if(validateForm(sectionName)){
    //if section form is validated, saved section + 1
    setSavedSection(1);

    //calculate section score
    var sectionScore = calculateSectionScore(sectionName);
    $('#result-' + sectionName ).find('.table-score').html(sectionScore);
    $('#form-'+ sectionName ).find('.score-'+ sectionName).val(sectionScore);
    $('#result-' + sectionName).find('._section').attr('data-score', sectionScore);

    changeSectionScoreBackground(sectionScore, sectionName);

    var wrapper_id = $('#'+save_id).closest('div').attr('id');
    var collapse_id = $('#'+wrapper_id).parents('.res').attr('id');
    var result_id = $('#'+collapse_id).children('.result-table-wrapper').attr('id');
    $('#'+wrapper_id).hide();
    $('#'+result_id).fadeIn();
  }
});

//change #section-score- background based on section score
function changeSectionScoreBackground(sectionScore, sectionName){
  $('#section-score-' + sectionName ).removeClass('red');
  $('#section-score-' + sectionName ).removeClass('orange');
  $('#section-score-' + sectionName ).removeClass('blue');
  if (sectionScore < 50) {
    $('#section-score-' + sectionName ).addClass('red');
  }else if (sectionScore < 80) {
    $('#section-score-' + sectionName ).addClass('orange');
  }
}

//calculate section score
function calculateSectionScore(sectionName) {
  var selected = [];
  $('#form-'+ sectionName + ' input:checked').each(function() {
      selected.push($(this).attr('name'));
  });
  var totalSelected = selected.length;
  var totalCheckbox = $('#form-' + sectionName ).find('input:checkbox').length;
  var totalDisabledCheckbox = $('#form-' + sectionName).find('input[type="checkbox"]').filter(function() {
    return this.disabled;
  }).length;
  totalCheckbox -= totalDisabledCheckbox;
  var totalNotSelected = totalCheckbox - totalSelected;
  var sectionScore = Math.round(totalNotSelected * 100 / totalCheckbox);//alert(sectionScore);
  return sectionScore;
}

//validate section form -> check if section form input field has value
function validateForm(sectionName){
  var warning = 0;

  $("form#form-"+ sectionName + " :input").each(function(){
      var input = $(this);
        //if input field doesn't have value and is not in disable state
        if(!input.val() && !input.prop("disabled")){
          input.addClass('warning');
          warning++;
        }else{
          input.removeClass('warning');
        }
  });
  // if no warning or all required field is not empty
  if (warning == 0) {
    return true;
  }else{ // if there is warning or there are some empty required field
    return false;
  }
}

//set saved section +1 or -1
function setSavedSection(number){// parameter could be 1 or -1
  var savedSection = parseInt($('#saved-section').html());//get current saved section
  $('#saved-section').html(savedSection + number); // set saved section plus one or minus one
}

$('.save-all').click(function(){
  //var url = $('#web-url').val();
  var desktop_score = $('#desktop-score').html();
  //var forms[1] = $('#form-user-navigation').serialize();
    var totalSection = $('#total-section').html();
    var savedSection = parseInt($('#saved-section').html());
    if (totalSection != savedSection) {
      $('#save-section').modal('show');
      //$('#modal-priority').modal('show');
    }else{
      $('#modal-priority').modal('show');
      $('#modal-priority').on('shown.bs.modal', function (e) {
        if($('#state').val() == 'true')
        {
            $('#btn-save-summary').trigger('click');
        }
        else
        {
            console.log('not valid');
        }
        $(this).off('shown.bs.modal');
      })
    }
});

$(document).on('click', '#save-all-report', function(e){
  e.preventDefault();
  var forms = $('form').serialize();
  $.ajax({
    url: base_url + 'save',
    type: 'POST',
    dataType: 'json',
    data: forms,
    beforeSend: function() {
      // $('#loading-save').modal({
      //     backdrop: 'static'
      // });
      //$('#loading-save').modal('show');
      $('.preload2').fadeIn();
      // $('#load-status').html('Preparing fetching data');
    },
    error: function() {
      alert('save-all error');
    },
    success: function(res) {
      // console.log(desktop_score);
      // console.log($('#hidden-url').val());
      console.log(res);
      window.location.replace(base_url+'report/'+res+'/preview');
      // if($('#check-user-experience4').is(":checked")){
      //   console.log("checked");
      // }

   },
   complete: function() {
  $('.preload2').fadeOut();
   }
  });
});

$('#update-all').click(function(){
    var forms = $('form').serialize();
    var totalSection = $('#total-section').html();
    var savedSection = parseInt($('#saved-section').html());
    console.log('update');
    if (totalSection != savedSection) {
      $('#save-section').modal('show');
    }else{
      $.ajax({
        url: base_url + 'update',
        type: 'POST',
        dataType: 'json',
        data: forms,
        beforeSend: function() {
          $('.preload2').fadeIn();
        },
        error: function() {
          alert('update-all error');
        },
        success: function(res) {
          console.log(res);
          //window.location.replace(base_url+'report/'+res+'/preview');
        },
        complete: function() {
          $('.preload2').fadeOut();
        }
      });
    }
})

$('.edit-field').click(function(e){
  e.preventDefault();

  setSavedSection(-1);// on edit field, reduce saved section -1

  //hide edit score div if user haven't save the new score
  var sectionName = $(this).data('section-name');
  $('#new-score-warning-' + sectionName).fadeOut();
  $('#current-score-' + sectionName).fadeIn();
  $('#new-score-' + sectionName).fadeOut();
  //hide edit score div if user haven't save the new score
  var edit_id = $(this).attr('id');
  var wrapper_id = $('#'+edit_id).closest('div').attr('id');
  var collapse_id = $('#'+wrapper_id).parents('.res').attr('id');
  var result_id = $('#'+collapse_id).children('.report-form').attr('id');
  $('#'+wrapper_id).hide();
  $('#'+result_id).fadeIn();
});

// onclick button edit score
$('.edit-score').click(function(e){
  e.preventDefault();
  setSavedSection(-1);//on edit score, reduce saved section -1
  // get section name
  var sectionName = $(this).data('section-name');
  //set the section score background to blue
  $('#section-score-' + sectionName ).removeClass('red');
  $('#section-score-' + sectionName ).removeClass('orange');
  $('#section-score-' + sectionName ).addClass('blue');
  // set the input default value to current score in table score class
  $('#input-new-score-' + sectionName).val($('#result-' + sectionName ).find('.table-score').html());

  $('#edit-' + sectionName).hide();
  $('#current-score-' + sectionName).hide();
  $('#new-score-' + sectionName).fadeIn();
});

// onclick button save new score
$('.save-score').click(function(e){
  e.preventDefault();

  var sectionName = $(this).data('section-name');
  var newScore = $('#input-new-score-' + sectionName).val();
  if (newScore < 0 || newScore > 100) {//if input score is not valid
    $('#new-score-warning-' + sectionName).fadeIn();
  }else{
    setSavedSection(1);//on finish save new score, add saved section +1
    $('#result-' + sectionName ).find('.table-score').html(newScore);
    $('#form-'+ sectionName ).find('.score-'+ sectionName).val(newScore);
    $('#result-' + sectionName ).find('._section').attr('data-score', newScore);
    changeSectionScoreBackground(newScore, sectionName);

    $('#edit-' + sectionName).fadeIn();
    $('#new-score-warning-' + sectionName).fadeOut();
    $('#current-score-' + sectionName).fadeIn();
    $('#new-score-' + sectionName).hide();
  }
});

/*AJAX*/
