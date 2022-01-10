      
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
         $('#comp_nameshow').show();
         $('#comp_innshow').show();

         $('#genderhide').hide();
         $('#comp_addressshow').show();

         $('#specialisthide').hide();
         $('#avatarhide').hide();
         $('#comp_siteshow').show();
         $('#comp_logoshow').show();

      } else {
         $('#emailhide').show();
         $('#birthhide').show();
         $('#comp_nameshow').hide();
         $('#comp_innshow').hide();

         $('#genderhide').show();
         $('#comp_addressshow').hide();

         $('#specialisthide').show();
         $('#avatarhide').show();
         $('#comp_siteshow').hide();
         $('#comp_logoshow').hide();
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
