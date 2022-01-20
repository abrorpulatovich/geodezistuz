      
$(document).ready(function(){

    $('.phone').inputmask({mask:'+\\9\\9\\899 999 99 99'});

    $('.inn').inputmask({mask:'999999999'});

    $('.birth_date').inputmask("datetime",{
     mask: "1-2-y", 
     leapday: "-02-29",
     placeholder: "dd-mm-yyyy",
     separator: "-", 
     alias: "dd-mm-yyyy"
    });

    $('.passport').inputmask({mask:'[AA] 9999999'});
});

$(document).ready(function() {
   $('input[type="radio"]').click(function() {
      if ($(this).attr('id') == 'company') {
         $('#emailhide').hide();
         $('#passport_hide').hide();
         $('#full_namehide').hide();
         $('#birthhide').hide();
         $('#birth_date').attr('required', false);
         $('#passport').attr('required', false);

         $('#comp_nameshow').show();
         $('#comp_directorshow').show();
         $('#director_name').attr('required', true);
         $('#company_name').attr('required', true);
         $('#comp_innshow').show();
         $('#company_inn').attr('required', true);

         $('#genderhide').hide();
         $('#comp_addressshow').show();

         $('#specialisthide').hide();
         $('#avatarhide').hide();
         $('#comp_siteshow').show();
         $('#comp_logoshow').show();

         $('#status').val('2');

      } else {
         $('#emailhide').show();
         $('#passport_hide').show();
         $('#birthhide').show();
         $('#birth_date').attr('required', true);
         $('#full_namehide').show();
         $('#name').attr('required', true);
         $('#passport').attr('required', true);

         $('#comp_nameshow').hide();
         $('#comp_directorshow').hide();
         $('#company_name').attr('required', false);
         $('#director_name').attr('required', false);
         $('#comp_innshow').hide();
         $('#company_inn').attr('required', false);

         $('#genderhide').show();
         $('#comp_addressshow').hide();

         $('#specialisthide').show();
         $('#avatarhide').show();
         $('#comp_siteshow').hide();
         $('#comp_logoshow').hide();

         $('#status').val('1');
      }
   });
});

$('#region_id').on('change', function () {

    var region_id = $(this).find(':selected').attr('data-id');

    $.ajax({
        type: 'GET',
        url: "/getCities/" + region_id,
        success: function (result) {
            $('#city_id').html(result);
        }
    });
});

$("#salary").inputmask({
        'radixPoint': ',',
        'alias': 'numeric',
        'groupSeparator': ' ',
        'autoGroup': true,
        'digits': 0,
        'placeholder': '',
        'prefix': '',
        'min': 0,

});

$("#salary").on("blur", function () {
    var val = $(this).val();

    while (val.indexOf(' ') !== -1) {
        val = val.replace(' ', '');
    }

    if (val > 50000000) {
        alert("Oylik maosh 50 mln dan kichik bo‘lishi kerak!");
        $(this).val("");
    }
});

$('.hide_salary').click(function () {
    if ($('.hide_salary').is(':checked')) {
        $('#salary_hidden').hide();
        $('#salary').attr('required', false).val("");
        $(this).val(1);
    } else {
        $('#salary_hidden').show();
        $('#salary').attr('required', true);
        $(this).val(0);
    }
});

$('#is_history').click(function () {
    if ($('#is_history').is(':checked')) {
        $('#hide_history').hide();
        $('#old_company_name').attr('required', false).val("");
        $('#position_name').attr('required', false).val("");
        $('#from_date').attr('required', false).val("");
        $('#to_date').attr('required', false).val("");
        $(this).val(1);
    } else {
        $('#hide_history').show();
        $('#old_company_name').attr('required', true);
        $('#position_name').attr('required', true);
        $('#from_date').attr('required', true);
        $('#to_date').attr('required', true);
        $(this).val(0);
    }
});
