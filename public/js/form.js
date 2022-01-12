      
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
});

$(document).ready(function() {
   $('input[type="radio"]').click(function() {
      if ($(this).attr('id') == 'company') {
         $('#emailhide').hide();
         $('#birthhide').hide();
         $('#birth_date').attr('required', false);

         $('#comp_nameshow').show();
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
         $('#birthhide').show();
         $('#birth_date').attr('required', true);

         $('#comp_nameshow').hide();
         $('#company_name').attr('required', false);
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

