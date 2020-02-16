$(function () {
  //Initialize Select2 Elements
  $('.select2').select2({});

  // image file upload preview
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        // Use the input element's name attrbute to select and
        // update the image element with matching id
        $('#' + input.name).attr('src', reader.result); //e.target.result
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("input[type=file]").change(function() {
    readURL(this);
    //filename = this.files[0].name
    //console.log(filename);
  });

  //datetime picker
  $('.form_datetime').datetimepicker({
    weekStart: 1,
    fontAwesome: true,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 'month',
    minuteStep: 30,
    forceParse: 0,
    showMeridian: 1,
    pickerPosition: "bottom-right",
    //startDate: new Date()
  });

  //date picker
  $('.form_date').datetimepicker({
    fontAwesome: true,
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0,
    pickerPosition: "bottom-right",
    format:'yyyy-mm-dd'
  });

  //time picker
  $('.form_time').datetimepicker({
    fontAwesome: true,
    autoclose: 1,
    todayHighlight: 1,
    startView: 1,
    minuteStep: 30,
    forceParse: 0,
    showMeridian: 1,
    pickerPosition: "bottom-right",
    format: "HH:ii P"
  });

  //time picker
  $('.form_month').datetimepicker({
    fontAwesome: true,
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 3,
    minView: 3,
    forceParse: 0,
    pickerPosition: "bottom-right",
    format:'MM'
  });

  //time picker
  $('.form_year').datetimepicker({
    fontAwesome: true,
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 4,
    minView: 4,
    forceParse: 0,
    pickerPosition: "bottom-right",
    format:'yyyy'
  });

  //time picker
  /*$('.form_time').datetimepicker({
    fontAwesome: true,
    autoclose: 1,
    todayHighlight: 1,
    startView: 1,
    minuteStep: 30,
    forceParse: 0,
    showMeridian: 1,
    pickerPosition: "bottom-right",
    format: "HH:ii P"
  });*/
});