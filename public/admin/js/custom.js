/*
* Datatable Button Events
* */
$(document).on('click','.view , .edit ',function () {
    window.location.href = $(this).attr('data-url');
});
$(document).on('click','.remove',function () {
    let table = $('#dataTableBuilder').DataTable();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'DELETE',
        url: $(this).attr('data-url'),
        data: {
            id: $(this).attr('data-id'),
        },
        dataType: 'json',
        success: function(data) {
            table.ajax.reload();
        },
        error: function(data) {
            console.log(data);
        }
    });
});
/*
* Media Multiple File Upload
* */

$(document).on('change','#mediaForm #file_upload',function(){
    let form = $('#mediaForm');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: form.attr('action'),
        data: form.serialize(),
        dataType: 'json',
        success: function(data) {
            console.log('SUCCESS : ' + JSON.stringify(data));
        },
        error: function(data) {
            console.log('ERROR :' + JSON.stringify(data));
        }
    });
});
