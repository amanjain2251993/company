function deleteConfirm(callback, msg, title) {
    if (msg === undefined) { msg = 'Are you sure to delete?'; }
    if (title === undefined) { title = 'Confirm Delete?'; }
    $("#smart-confirmation-box .delete-confirm-msg").html(msg);
    $("#smart-confirmation-box .delete-confirm-title").html(title);
    $('#smart-confirmation-box .yes-btn').off('click');
    $('#smart-confirmation-box').modal({
        backdrop: 'static',
        keyboard: false
    });
    $('#smart-confirmation-box .yes-btn').on('click', function(e) {
        $("#smart-confirmation-box").modal("hide");
        callback();
    });
}
function sagNotify(msg, status) {
    $(".alert-positions").remove();
    var option = '';
    var icon_option = '';
    switch (status) {
        case 'success':
            option = 'success';
            icon_option = 'icon-dot-tick f-18';
            break;
        case 'error':
            option = 'danger';
            icon_option = 'fa fa-exclamation-circle';
            break;
        case 'warning':
            option = 'warning';
            icon_option = 'fa fa-exclamation-triangle f-10';
            break;
    }
    $("body").append('<div class="alert-positions">\
    <div class="alert alert-' + option + '-box alert-dismissible">\
        <button type="button" class="close" data-dismiss="alert"><i class="icon-cross"></i></button>\
        <div class="d-flex">\
          <div class="d-flex flex-wrap mr15"><span class="d-table"> <i class="' + icon_option + '"></i></span> </div>\
          <div class="d-flex flex-wrap f-14">' + msg + '</div>\
        </div></div></div>');

    window.setTimeout(function() {
        $(".alert-positions").fadeTo(1000, 0).slideUp(500, function() {
            $(this).slideUp();
        });
    }, 2000);
	}	
 
