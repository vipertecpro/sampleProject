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
        type: 'POST',
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
