// AJAX JS

function showToastr(type, message, title) {
    var options = {
        closeButton: false,
        debug: false,
        newestOnTop: true,
        progressBar: true,
        positionClass: "toast-top-right",
        preventDuplicates: false,
        onclick: null,
        showDuration: 300,
        hideDuration: 1000,
        timeOut: 5000,
        extendedTimeOut: 1000,
        showEasing: 'swing',
        hideEasing: 'linear',
        showMethod: 'fadeIn',
        hideMethod: 'fadeOut'
    };
    toastr[type](message, title, options);
}

function getSubCategories(page_url, id) {
    var cat_id = $("#cat_main").val();
    $.ajax({
        url: page_url + '?main=' + cat_id + '&cat=' + id,
        type: "GET",
        dataType: "html",
        success: function(data, textStatus, xhr) {
            if (data != '0') {
                $("#cat_id").html(data);
            } else {
                $("#cat_id").html('<option value=""> - SELECT - </option>');
            }
        },
        error: function(data, textStatus, xhr) {
            // alert('Error:'+data);
        }
    });
}