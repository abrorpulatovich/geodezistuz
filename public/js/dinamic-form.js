// dinamic form

$('#plus_btn').on('click', function(){
    addRow();
});

function addRow(){
    var tr = '<tr>'+
                '<td>'+
                    '<input id=\"old_company_name\" type="text" class=\"form-control\" name="workplaces[][old_company_name]" value="" required="required">'+
                '</td>'+
                '<td>'+
                    '<input id=\"position_name\" type="text" class=\"form-control\" name="workplaces[][position_name]" value="" required="required">'+
                '</td>'+
                '<td>'+
                    '<input id=\"from_date\" type="text" class=\"birth_date form-control\" name="workplaces[][from_date]" value="" required="required">'+
                '</td>'+
                '<td>'+
                    '<input id=\"to_date\" type="text" class=\"birth_date form-control\" name="workplaces[][to_date]" value="" required="required">'+
                '</td>'+
                '<td>'+
                    '<button type="button" class=\"btn btn-danger\" style="margin-left:4px" id=\"minus_btn\">O‘chirish</button>'+
                '</td>'+
            '</tr>';
    $('tbody').append(tr);
}

$('tbody').on('click', '#minus_btn', function(){
    $(this).parent().parent().remove();
});

