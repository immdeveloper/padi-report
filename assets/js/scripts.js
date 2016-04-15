$(document).ready(function(){
  changeIconOnCollapse();
  dataTable();
  dynamic_form();
  dynamic_point_check();
});

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
      var id = $(this).attr('id');
      var id_wrapper = $('#'+id).closest('div').find(wrapper).attr('id');

      if(x < max_fields){ //max input box allowed
          x++; //text box increment
          $('#'+id_wrapper).append(
            '<div class="well">' +
                '<a href="#" class="pull-right remove-field"><i class="fa fa-times fa-fw"></i></a>' +
              '<div class="clearfix"></div>' +
              '<div class="row">' +
                '<div class="col-md-4 col-lg-4" style="padding-right:0">' +
                  '<div class="form-group">' +
                    '<span><strong>What needs fixing?</strong></span>' +
                    '<input type="text" name="name" value="" class="form-control">' +
                  '</div>' +
                '</div>' +
                '<div class="col-md-8">' +
                  '<div class="form-group">' +
                    '<span><strong>Explanation</strong></span>' +
                    '<input type="text" name="name" value="" class="form-control">' +
                  '</div>' +
                '</div>' +
              '</div>' +
              '<div class="form-group">' +
                '<span><strong>Who can fix it?</strong></span>' +
                '<select class="form-control" name="">' +
                  '<option value="">-- select user --</option>' +
                  '<option value="1">Webmaster</option>' +
                  '<option value="2">End user</option>' +
                '</select>' +
              '</div>' +
              '<div class="form-group">' +
                '<span><strong>How do you fix it?</strong></span>' +
                '<input type="text" name="name" value="" class="form-control">' +
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
  $.ajax({
    url: 'save',
    type: 'POST',
    dataType: 'json',
    data: forms,
    beforeSend: function() {
      $('.preload').fadeIn();
      $('#load-status').html('Preparing fetching data');
    },
    error: function() {
      alert('error');
    },
    success: function(res) {
      console.log(desktop_score);
      console.log($('#hidden-url').val());
      console.log(res);
      if($('#check-user-experience4').is(":checked")){
        console.log("checked");
      }

   },
   complete: function() {
$('.preload').fadeOut();
   }
  });

})

$('.edit-field').click(function(e){
  e.preventDefault();
  var edit_id = $(this).attr('id');
  var wrapper_id = $('#'+edit_id).closest('div').attr('id');
  var collapse_id = $('#'+wrapper_id).parents('.res').attr('id');
  var result_id = $('#'+collapse_id).children('.report-form').attr('id');
  $('#'+wrapper_id).hide();
  $('#'+result_id).fadeIn();
});

/*AJAX*/