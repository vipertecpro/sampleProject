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
$(document).on('click','.activate',function () {
    let table = $('#dataTableBuilder').DataTable();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'PATCH',
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

$(document).ready(function() {
    if (location.hash) {
        $("a[href='" + location.hash + "']").tab("show");
    }
    $(document.body).on("click", "a[data-toggle='pill']", function(event) {
        location.hash = this.getAttribute("href");
    });
});
$(window).on("popstate", function() {
    var anchor = location.hash || $("a[data-toggle='pill']").first().attr("href");
    $("a[href='" + anchor + "']").tab("show");
});
