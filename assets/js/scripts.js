var base_url = $('#base_url').val();

$(document).ready(function(){
  changeIconOnCollapse();
  dataTable();
  dynamic_form();
  dynamic_point_check();
  dynamic_priority_task_form();
  backtotop();
  getPriorityType();
});

function showPreload(wrapper, text)
{
  //Generating report preview, please wait...
  $html = '<div class="preload2" style="display:none; background-image:url(' + base_url + 'assets/images/rolling.svg)">' +
      '<span>' + text + '</span>'+
    '</div>';
  wrapper.html($html);
}

function getPriorityType()
{
  /*Save Priority and Summary*/
  $('#btn-save-summary').click(function(e){
    e.preventDefault();
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
    if($('#report-summary').val().trim().length == 0)
    {
      $('#report-summary').addClass('not-valid');
      pass = false;
    }
    else
    {
      $('#report-summary').removeClass('not-valid');
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

    if(pass == true)
    {
      $('.priority-summary-result').fadeIn();
      $('.priority-summary-form').fadeOut();
      var count = $('.priority-block').length;
      var arr = new Array();
      for (var i = 0; i < count; i++) {
        arr[i] = $('.priority-block').eq(i).data('id');
      }
      loopPriorityResult(count, arr);
      loopPriorityTable(count, arr);
      $('.report-summary').html($('#report-summary').val());
      $('#report-summary-result').val($('#report-summary').val());
      var saved = parseInt($('#saved-section').html());
      $('#saved-section').html(saved+1);
    }
  });

  /*Edit Priority and Summary*/
  $('#btn-edit-summary').click(function(e){
    e.preventDefault();
    $('.priority-summary-result').fadeOut();
    $('.priority-summary-form').fadeIn();
    var saved = parseInt($('#saved-section').html());
    $('#saved-section').html(saved-1);
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
        alert('error');
      },
      success: function(res) {
        var data = '';
        var index = '';
        var why = '';
        var how = '';
        $('#result-type-' + id)
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
             $('#result-type-' + id)
                 .append($("<option></option>")
                            .attr("value", index)
                            .attr("data-why", why)
                            .attr("data-how", how)
                            .text(data));
        });

        $('#result-type-' + id).on('change', function() {
          $('#priority-what-' + id).val($(this).find(':selected').text());
          $('#priority-why-' + id).val($(this).find(':selected').data('why'));
          $('#priority-how-' + id).val($(this).find(':selected').data('how'));
        });

     },
   });
  });
}

function loopPriorityResult(count, arr)
{
  $('.priority-result').empty();
  for (var i = 0; i < count; i++)
  {
    $('.priority-result').append(
      '<div class="form-group">' +
      '<input type="hidden" name="priority-what[]" id="priority-result-what-' + i + '" value="'+ $('#priority-what-' + arr[i]).val() +'">' +
      '<input type="hidden" name="priority-why[]" id="priority-result-why-' + i + '" value="'+ $('#priority-why-' + arr[i]).val() +'">' +
      '<input type="hidden" name="priority-how[]" id="priority-result-how-' + i + '" value="' + $('#priority-what-' + arr[i]).val() + '">' +
      '</div>'
    );
  }
}

function loopPriorityTable(count, arr)
{
  $('.priority-table-wrapper').empty();
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
            '<td><strong>'+ $('#priority-what-' + arr[i]).val().toUpperCase() +'</strong></td>' +
          '</tr>' +
          '<tr>' +
            '<td style="width:110px;">Why?</td>' +
            '<td>'+ $('#priority-why-' + arr[i]).val() +'</td>' +
          '</tr>' +
          '<tr>' +
            '<td style="width:110px;">How to fix it:</td>' +
            '<td>'+ $('#priority-how-' + arr[i]).val() +'</td>' +
          '</tr>' +
        '</table>' +
      '</div>'
    );
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
    var savedSection = parseInt($('#saved-section').html());
    $('#saved-section').html(savedSection+1);

    //calculate section score
    var sectionScore = calculateSectionScore(sectionName);
    $('#result-' + sectionName ).find('.table-score').html(sectionScore);
    $('#form-'+ sectionName ).find('.score-'+ sectionName).val(sectionScore);
    $('#section-score-' + sectionName ).removeClass('red');
    $('#section-score-' + sectionName ).removeClass('orange');
    if (sectionScore < 50) {
      $('#section-score-' + sectionName ).addClass('red');
    }else if (sectionScore < 80) {
      $('#section-score-' + sectionName ).addClass('orange');
    }

    var wrapper_id = $('#'+save_id).closest('div').attr('id');
    var collapse_id = $('#'+wrapper_id).parents('.res').attr('id');
    var result_id = $('#'+collapse_id).children('.result-table-wrapper').attr('id');
    $('#'+wrapper_id).hide();
    $('#'+result_id).fadeIn();
  }
});

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

$('.save-all').click(function(){
  //var url = $('#web-url').val();
  var desktop_score = $('#desktop-score').html();
  var forms = $('form').serialize();
  //var forms[1] = $('#form-user-navigation').serialize();
    var totalSection = $('#total-section').html();
    var savedSection = parseInt($('#saved-section').html());
    if (totalSection != savedSection) {
      $('#save-section').modal('show');
    }else{
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
      alert('error');
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

}
})

$('.edit-field').click(function(e){
  e.preventDefault();
  //calculate saved section
  var savedSection = parseInt($('#saved-section').html());
  $('#saved-section').html(savedSection-1);
  //calculate saved section
  var edit_id = $(this).attr('id');
  var wrapper_id = $('#'+edit_id).closest('div').attr('id');
  var collapse_id = $('#'+wrapper_id).parents('.res').attr('id');
  var result_id = $('#'+collapse_id).children('.report-form').attr('id');
  $('#'+wrapper_id).hide();
  $('#'+result_id).fadeIn();
});

/*AJAX*/
