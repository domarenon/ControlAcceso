function changeMove(){
    if (document.getElementById('toggle_move').checked)
    {
        document.getElementById("st_move").setAttribute('value', 'OUT');
    }
    else{
        document.getElementById("st_move").setAttribute('value', 'IN');
    }
}

function get_codebar_string(st_code){
    var length = String(st_code).length;
    for (var i = 0; i < 12 - length; i++){
        st_code = "0"+st_code;
    }
    var lastDig= (st_code[0]*1)+
                (st_code[1]*3)+
                (st_code[2]*1)+
                (st_code[3]*3)+
                (st_code[4]*1)+
                (st_code[5]*3)+
                (st_code[6]*1)+
                (st_code[7]*3)+
                (st_code[8]*1)+
                (st_code[9]*3)+
                (st_code[10]*1)+
                (st_code[11]*3);
    if (lastDig%10 != 0) 
    {lastDig =10-(lastDig%10);}
    else{
        lastDig = 0;
    }
    return st_code+lastDig;
}


$(document).ready(function(){
    if (document.body.contains(document.getElementById('new_move'))){
        if (document.getElementById('st_code').value==""){
            document.getElementById('new_move').disabled=true;
        }
        else{
            document.getElementById('new_move').disabled=false;
        }
    }

    if (document.body.contains(document.getElementById('export'))){
        $('#user_flt').click(function () {
            $('#select_user').prop('disabled', false).trigger("chosen:updated");
            $('#select_unity').prop('disabled', true).val(null).trigger("chosen:updated");
            $('#select_dependency').prop('disabled', true).val(null).trigger("chosen:updated");
        });
        $('#unit_flt').click(function () {
            $('#select_user').prop('disabled', true).val(null).trigger("chosen:updated");
            $('#select_unity').prop('disabled', false).trigger("chosen:updated");
            $('#select_dependency').prop('disabled', true).val(null).trigger("chosen:updated");
        });
        $('#dependency_flt').click(function () {
            $('#select_user').prop('disabled', true).val(null).trigger("chosen:updated");
            $('#select_unity').prop('disabled', true).val(null).trigger("chosen:updated");
            $('#select_dependency').prop('disabled', false).trigger("chosen:updated");
        });
    }

    $('.input-daterange').datepicker({
        format: "yyyy-mm-dd",
        language: "es",
        todayHighlight: true
    });

    $('.select_chosen').chosen({
        max_shown_results: 6,
        no_results_text: "No existe"
    });
    $('#select_user').on('change', function(e) {
        var id_user = $(this).find(":selected").val()
        $("input[name='dataSearch']").val(id_user)
        $("button[name='btnSearch']").click()
    });

    $('#move_table').DataTable( {
        "pagingType": "full_numbers",
        "language": {
            "url": "./misc/language/DT-Spanish.json"},
        "order": [[ 6, "desc" ]]
    } );

    $('#user_table').DataTable( {
        "pagingType": "full_numbers",
        "language": {
            "url": "./misc/language/DT-Spanish.json"},
        "order": [[ 5, "desc" ]]
    } );
    
    
  });
