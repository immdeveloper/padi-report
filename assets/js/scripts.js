$(document).ready(function(){
  changeIconOnCollapse();
  dataTable();
  dynamic_form();
  dynamic_point_check();
});

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

//setup before functions
var typingTimer;                //timer identifier
var doneTypingInterval = 1000;  //time in ms, 5 second for example
var url = $('#web-url');
var btn_submit = $('#btn-submit');

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
  var regex = /^(http|https)?:\/\/[a-zA-Z0-9-\.]+\.[a-z]{2,4}/;
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
              '<input id="check-'+section_id+'" name="personal-'+section_id + x +'" type="checkbox" value="personal" checked>' +
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
                  '<option value="1">Webmaster</option>' +
                  '<option value="2">End user</option>' +
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
  var section_name = $(this).data('section-name');
  //calculate saved section
  var savedSection = parseInt($('#saved-section').html());
  $('#saved-section').html(savedSection+1);
  // alert(totalSection + savedSection);
  //calculate saved section
  //calculate section score
  var selected = [];
  $('#form-'+ section_name + ' input:checked').each(function() {
      selected.push($(this).attr('name'));
  });
  var totalSelected = selected.length;
  var totalCheckbox = $('#form-' + section_name ).find('input:checkbox').length;
  var totalNotSelected = totalCheckbox - totalSelected;
  var sectionScore = Math.round(totalNotSelected * 100 / totalCheckbox);//alert(sectionScore);
  $('#result-' + section_name ).find('.table-score').html(sectionScore);
  $('#form-'+ section_name ).find('.score-'+ section_name).val(sectionScore);
  $('#section-score-' + section_name ).removeClass('red');
  $('#section-score-' + section_name ).removeClass('orange');
  if (sectionScore < 50) {
    $('#section-score-' + section_name ).addClass('red');
  }else if (sectionScore < 80) {
    $('#section-score-' + section_name ).addClass('orange');
  }
  //calculate section score
  var wrapper_id = $('#'+save_id).closest('div').attr('id');
  var collapse_id = $('#'+wrapper_id).parents('.res').attr('id');
  var result_id = $('#'+collapse_id).children('.result-table-wrapper').attr('id');
  $('#'+wrapper_id).hide();
  $('#'+result_id).fadeIn();
});


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
    url: 'save',
    type: 'POST',
    dataType: 'json',
    data: forms,
    beforeSend: function() {
      $('#loading-save').modal({
          backdrop: 'static'
      });
      $('#loading-save').modal('show');
      //$('.preload').fadeIn();
      // $('#load-status').html('Preparing fetching data');
    },
    error: function() {
      alert('error');
    },
    success: function(res) {
      // console.log(desktop_score);
      // console.log($('#hidden-url').val());
      console.log(res);
      // window.location.href=""
      // if($('#check-user-experience4').is(":checked")){
      //   console.log("checked");
      // }

   },
   complete: function() {
$('.preload').fadeOut();
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
