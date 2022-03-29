Inputmask().mask("input");
$(document).ready(function () {

    $('.phone').inputmask({mask: '+\\9\\9\\899 999 99 99'});
    $('.inn').inputmask({mask: '999999999'});
    $('#publish_date').inputmask({mask: '99-99-9999'});

    $('.birth_date').inputmask("datetime", {
        mask: "1-2-y",
        leapday: "-02-29",
        placeholder: "dd-mm-yyyy",
        separator: "-",
        alias: "dd-mm-yyyy"
    });

    $('.passport').inputmask({mask: '[AA] 9999999'});
});

$(document).ready(function () {
    $('input[type="radio"]').click(function () {
        if ($(this).attr('id') == 'company') {
            $('#emailhide').addClass('hidden');
            $('#passport_hide').addClass('hidden');
            $('#full_namehide').addClass('hidden');
            $('#birthhide').addClass('hidden');
            $('#birth_date').attr('required', false);
            $('#passport').attr('required', false);

            $('#comp_nameshow').removeClass('hidden');
            $('#comp_directorshow').removeClass('hidden');
            $('#director_name').attr('required', true);
            $('#company_name').attr('required', true);
            $('#comp_innshow').removeClass('hidden');
            $('#company_inn').attr('required', true);

            $('#genderhide').addClass('hidden');
            $('#comp_addressshow').removeClass('hidden');

            $('#specialisthide').addClass('hidden');
            $('#avatarhide').addClass('hidden');
            $('#comp_siteshow').removeClass('hidden');
            $('#comp_logoshow').removeClass('hidden');

            $('#status').val('2');
            $('#nameregister').text('Yuridik shaxs uchun ro‘yxatdan o‘tish')

        } else {
            $('#emailhide').removeClass('hidden');
            $('#passport_hide').removeClass('hidden');
            $('#birthhide').removeClass('hidden');
            $('#birth_date').attr('required', true);
            $('#full_namehide').removeClass('hidden');
            $('#name').attr('required', true);
            $('#passport').attr('required', true);

            $('#comp_nameshow').addClass('hidden');
            $('#comp_directorshow').addClass('hidden');
            $('#company_name').attr('required', false);
            $('#director_name').attr('required', false);
            $('#comp_innshow').addClass('hidden');
            $('#company_inn').attr('required', false);

            $('#genderhide').removeClass('hidden');
            $('#comp_addressshow').addClass('hidden');

            $('#specialisthide').removeClass('hidden');
            $('#avatarhide').removeClass('hidden');
            $('#comp_siteshow').addClass('hidden');
            $('#comp_logoshow').addClass('hidden');

            $('#status').val('1');
            $('#nameregister').text('Jismoniy shaxs uchun ro‘yxatdan o‘tish')
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
    'min': 0
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
        $('#salary_hidden').addClass('hidden');
        $('#salary').attr('required', false).val("");
        $(this).val(1);
    } else {
        $('#salary_hidden').removeClass('hidden');
        $('#salary').attr('required', true);
        $(this).val(0);
    }
});

$('#is_history').click(function () {
    if ($('#is_history').is(':checked')) {
        $('#hide_history').addClass('hidden');
        $('#old_company_name').attr('required', false).val("");
        $('#position_name').attr('required', false).val("");
        $('#from_date').attr('required', false).val("");
        $('#to_date').attr('required', false).val("");
        $(this).val(1);
    } else {
        $('#hide_history').removeClass('hidden');
        $('#old_company_name').attr('required', true);
        $('#position_name').attr('required', true);
        $('#from_date').attr('required', true);
        $('#to_date').attr('required', true);
        $(this).val(0);
    }
});
