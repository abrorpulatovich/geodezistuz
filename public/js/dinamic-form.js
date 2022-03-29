// dinamic form

var counter = 1;

$(document).on('click', '#plus_btn', function () {
    addRow();
});


function addRow() {
    var tr = '<tr>' +
        '<td>' +
        '<input id="old_company_name" type="text" class="form-control" name="workplaces[' + counter + '][old_company_name]" value="" required="required">' +
        '</td>' +
        '<td>' +
        '<input id="position_name" type="text" class="form-control" name="workplaces[' + counter + '][position_name]" value="" required="required">' +
        '</td>' +
        '<td>' +
        '<input id="from_date" type="text" class="form-control dinamic_date' + counter + '" name="workplaces[' + counter + '][from_date]" value="" required="required">' +
        '</td>' +
        '<td>' +
        '<input id="to_date" type="text" class="form-control dinamic_date' + counter + '" name="workplaces[' + counter + '][to_date]" value="" required="required">' +
        '</td>' +
        '<td>' +
        '<button type="button" class="btn btn-danger" style="margin-left:4px" id="minus_btn"><i class="lni lni-trash"></i></button>' +
        '</td>' +
        '</tr>';
    $('tbody').append(tr);

    $('.dinamic_date' + counter).inputmask("datetime", {
        mask: "1-2-y",
        leapday: "-02-29",
        placeholder: "dd-mm-yyyy",
        separator: "-",
        alias: "dd-mm-yyyy"
    });

    counter++;
}

$('tbody').on('click', '#minus_btn', function () {
    $(this).parent().parent().remove();
});

