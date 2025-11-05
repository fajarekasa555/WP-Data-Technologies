var clock = $('#live-clock');
var date = $('#live-date');


$(document).ajaxError(function(event, jqhxr){
    var response = jqhxr.responseJSON;
    if((jqhxr.status == 401 && response.message == 'Unauthenticated.') || (jqhxr.status == 419 && response.message == 'CSRF token mismatch.')){
        toastr.error('Failed', 'Session Expired');
        setTimeout(() => { window.location.href=(response.url != undefined ? response.url : '/login-petugas') }, 200);
    }
    if(jqhxr.status == 403){
        toastr.error('Failed', response.message);
    }
});


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(function() {
    $('body').buildForm();
    $('.dropdown-submenu a.dropdown-toggle-submenu').click(function(e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });
    $.extend(true, $.fn.dataTable.defaults, {
        initComplete : function() {
            $('[data-toggle="tooltip"]', this).tooltip();
        }
    });

    if ($('#sidebar .singgle-item a[href="'+window.location.href+'"]')) {
        $('#sidebar .singgle-item a[href="'+window.location.href+'"]').addClass('active');
        $('#sidebar .singgle-item a[href="'+window.location.href+'"]').parent().css('background', '#2196f3');
        $('#sidebar .menu-item .menu-submenu .menu-item a[href="'+window.location.href+'"]').css('background', '#2196f3');
        $('#sidebar .menu-item .menu-submenu .menu-item a[href="'+window.location.href+'"]').addClass('text-light').parent().parent().parent().children('.menu-item-toggle').addClass('active');
        $('#sidebar .menu-item .menu-submenu .menu-item a[href="'+window.location.href+'"]').parent().parent().css('height', 'auto');
        $('#sidebar .menu-item .menu-submenu .menu-item a[href="'+window.location.href+'"]').parent().css('background', '#2196f3');
    }

    setInterval(time, 1000);
    setTimeout(function() {
        $('.alert-success').fadeOut(1000);
    }, 3000);

    $(window).on('fullscreenchange', function(e){
        if($('#fullscreenTrigger').attr('active')){
            $('#fullscreenTrigger').removeAttr('active');
            $('#icon-fullscreen').attr('class','fa fa-expand');
        }else{
            $('#fullscreenTrigger').attr('active', true);
            $('#icon-fullscreen').attr('class','fa fa-compress');
        }
    }).scroll(function(){
        if ($(this).scrollTop() > 1){
            $('#sticky-header-desktop-sticky-wrapper').addClass("is-sticky");
            $('#sticky-header-desktop').addClass('sticky');
        }else{
            $('#sticky-header-desktop-sticky-wrapper').removeClass("is-sticky");
            $('#sticky-header-desktop').removeClass('sticky');
        }
    });

    if($('#fullscreen').hasClass('aside-desktop-maximized')){
        $('#col-header-center').attr('class','col-md-6');
        $('#col-header-end').attr('class','col-md-6');
    }else{
        $('#col-header-center').attr('class','col-md-7 pr-5');
        $('#col-header-end').attr('class','col-md-5');
    }

    $('#fullscreenTrigger').on('click', function(){
        if($(this).attr('active')){
            document.exitFullscreen();
        }else{
            document.documentElement.requestFullscreen();
        }
    })

    $.ucfirst = function(str) {

    var text = str;


    var parts = text.split(' '),
        len = parts.length,
        i, words = [];
    for (i = 0; i < len; i++) {
        var part = parts[i];
        var first = part[0].toUpperCase();
        var rest = part.substring(1, part.length);
        var word = first + rest;
        words.push(word);

    }

    return words.join(' ');
    };
});

feather.replace();

$.fn.buildForm = function() {
    $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    $.each(this, function(key, elem) {
        $('[data-input-type="select2"]', elem).each(function(key, elem) {
            // var containerCssClass = '';
            if ($(elem).hasClass('form-control-sm')) {
                // containerCssClass = 'select2-sm';
            }
            if ($(elem).parents('.dataTables_filter').length == 0) {
                $(elem).css('width', '100%');
            }
            if ($(elem).parents('.bootbox.modal').length == 1) {
                $(elem).select2({
                    dropdownParent: $('.bootbox.modal'),
                    // containerCssClass: containerCssClass,
                    dropdownAutoWidth: false
                });
            } else if ($(elem).parents('.modal').length == 1) {
                $(elem).select2({
                    dropdownParent: $('.modal'),
                    // containerCssClass: containerCssClass,
                    dropdownAutoWidth: false
                });
            } else {
                $(elem).select2({
                    // containerCssClass: containerCssClass,
                    dropdownAutoWidth: false
                });
            }
        });
        $('[data-input-type="select2-tag"]', elem).each(function(key, elem) {
            // var containerCssClass = '';
            if ($(elem).hasClass('form-control-sm')) {
                // containerCssClass = 'select2-sm';
            }
            if ($(elem).parents('.dataTables_filter').length == 0) {
                $(elem).css('width', '100%');
            }
            if ($(elem).parents('.bootbox.modal').length == 1) {
                $(elem).select2({
                    dropdownParent: $('.bootbox.modal'),
                    tags: true,
                    // containerCssClass: containerCssClass,
                    dropdownAutoWidth: false
                });
            } else if ($(elem).parents('.modal').length == 1) {
                $(elem).select2({
                    dropdownParent: $('.modal'),
                    tags: true,
                    // containerCssClass: containerCssClass,
                    dropdownAutoWidth: false
                });
            } else {
                $(elem).select2({
                    tags: true,
                    // containerCssClass: containerCssClass,
                    dropdownAutoWidth: false
                });
            }
        });
        $('[data-input-type="number-format"]', elem).each(function(key, elem) {
            var thousand_separator = lang['thousand_separator'];
            if ($(elem).data('thousand-separator') != undefined) {
                if ($(elem).data('thousand-separator') == false) {
                    thousand_separator = '';
                } else {
                    thousand_separator = $(elem).data('thousand-separator');
                    if (thousand_separator === true) {
                        thousand_separator = lang['thousand_separator'];
                    }
                }
            }
            var decimal_separator = lang['decimal_separator'];
            if ($(elem).data('decimal-separator') != undefined) {
                if ($(elem).data('decimal-separator') == false) {
                    decimal_separator = '';
                } else {
                    decimal_separator = $(elem).data('decimal-separator');
                    if (decimal_separator === true) {
                        decimal_separator = lang['decimal_separator'];
                    }
                }
            }
            var precision = 2;
            if ($(elem).data('precision') != undefined ) {
                precision = parseInt($(elem).data('precision'));
            }
            $(elem).number(true, precision, decimal_separator, thousand_separator).on('focus', function(){$(this).select()});
        });
        $('[data-input-type="datepicker"]', elem).each(function(key, elem) {
            if ($(elem).data('end-date')) {
                var endDate = new Date($(elem).data('end-date'));
            } else {
                var endDate = false;
            }

            $(elem).datepicker({
                format : lang['datepicker_format'],
                endDate : endDate,
                enableOnReadonly : false,
                orientation: 'bottom'
            });
        });

        $('[data-input-type="datetimepicker"]', elem).each(function(key, elem) {
            $('.datetimepicker-days .table-condensed thead tr th.switch').removeClass('switch').addClass('datepicker-switch')
            $(elem).datetimepicker({
                format : 'dd-mm-yyyy hh:ii',
            });
        });
        $('[data-input-type="timepicker"]', elem).each(function(key, elem) {
            $(elem).timepicker({
                showMeridian: false
            });
        });
        $('[data-input-type="dateinput"]', elem).each(function(key, elem) {
            $(elem).inputmask('datetime', {
                placeholder: 'dd-mm-yyyy',
                mask: "99-99-9999",
                greedy: false,
            });
        });
        $('[data-input-type="datetimeinput"]', elem).each(function(key, elem) {
            $(elem).inputmask('datetime', {
                placeholder: 'dd-mm-yyyy hh:ii',
                mask: "99-99-9999 99:99",
                greedy: false,
            });
        });
        $('[data-input-type="number"]', elem).each(function(key, elem) {
            $(elem).inputmask({
                mask: '9',
                repeat: 16,
                greedy: false,
                numericInput: true
            });
        });
    });
}

function swalConfirm(msg, action) {
    Swal.fire({
        title: msg,
        showCancelButton: true,
        confirmButtonText: 'OK',
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            if ($.isFunction(action)) {
                action();
            } else {
                document.location.href=action;
            }
        }
    })
}



function coalesce(str, to) {
    if (str == null) {
        if (to) {
            return to;
        } else {
            return '';
        }
    } else {
        return str;
    }
}


function toFloat(value) {
    value = parseFloat(value);
    if (!$.isNumeric(value)) {
        return 0;
    } else {
        return value;
    }
}



$(document).ajaxError(function(event, jqhxr, settings, thrownError){
    var response = jqhxr.responseJSON;
    if((jqhxr.status == 401 && response.message == 'Session Expired') ||
    (jqhxr.status == 419 && response.message == 'CSRF token mismatch.')){
        toastr.error('Failed', 'Session Expired')
        setTimeout(() => { window.location.href=response.url;}, 200);
    }
})


$.fn.blockUI = function() {
    $(this).block({
        message: '<div class="spinner-border text-primary preload-spinner"></div>',
        overlayCSS: {
            backgroundColor: '#fff',
            opacity: 0.8,
            cursor: 'wait'
        },
        css: {
            border: 0,
            padding: 0,
            backgroundColor: 'transparent'
        }
    })
};

function confirmDialog(title, message, action, cancel = null) {
    Swal.fire({
        icon : 'warning',
        title: title,
        text: message,
        widthAuto: true,
        showCloseButton: true,
        showCancelButton: true,
        buttonsStyling: false,
        allowOutsideClick: false,
        reverseButtons: true,
        customClass: {
            confirmButton: 'btn btn-outline-success',
            cancelButton: 'btn btn-outline-danger mr-3'
        },
        confirmButtonText: 'Oke',
        cancelButtonText: 'Batalkan'
    }).then((result) => {
        if (result.isConfirmed) {
            if ($.isFunction(action)) {
                action();
            } else {
                document.location.href=action;
            }
        } else {
            if($.isFunction(cancel)) {
                cancel();
            } else {
                cancel;
            }
        }
    })
}

function confirmDialogApproval(title, message, action, reject) {
    Swal.fire({
        icon: 'warning',
        title: title,
        text: message,
        widthAuto: true,
        showCloseButton: true,
        showCancelButton: true,
        buttonsStyling: false,
        allowOutsideClick: false,
        reverseButtons: true,
        customClass: {
            confirmButton: 'btn btn-outline-success',
            cancelButton: 'btn btn-outline-danger mr-3'
        },
        confirmButtonText: 'Approve',
        cancelButtonText: 'Reject',
        showCancelButton: true,
    }).then((result) => {
        if (result.isConfirmed) {
            if ($.isFunction(action)) {
                action();
            }
        } else if (result.isDismissed && result.dismiss === Swal.DismissReason.cancel) {
            if ($.isFunction(reject)) {
                reject();
            }
        }
    });
}

function alertDialog(title, cancel = false){
    return Swal.fire({
        icon : 'warning',
        title: title,
        showCloseButton: true,
        showCancelButton: cancel ? true : false,
        buttonsStyling: false,
        allowOutsideClick: false,
        reverseButtons: true,
        customClass: {
            confirmButton: 'btn btn-outline-success',
            cancelButton: 'btn btn-outline-danger mr-3'
        },
        confirmButtonText: 'Oke',
        cancelButtonText:  cancel ? 'Batalkan' : false
    }).then((result) => result);
}

function time() {
    var d = new Date();
    var m = d.getMinutes();
    var h = d.getHours();
    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    var month = months[d.getMonth()];
    clock.html(("0" + h).substr(-2) + "." + ("0" + m).substr(-2));
    date.html(d.getDate()+" "+month+" "+d.getFullYear());
}

function adjust_col(){
    setTimeout(() => {
        if($('#fullscreen').hasClass('aside-desktop-maximized')){
            $('#col-header-center').attr('class','col-md-6');
            $('#col-header-end').attr('class','col-md-6');
        }else{
            $('#col-header-center').attr('class','col-md-7');
            $('#col-header-end').attr('class','col-md-5');
        }
    }, 50);
}

function alertDestroy(){
    return Swal.fire({
        icon : 'warning',
        title: 'Apakah anda yakin menghapus data ini?',
        text : 'Proses ini tidak bisa di batalkan',
        widthAuto: true,
        showCloseButton: true,
        showCancelButton: true,
        buttonsStyling: false,
        allowOutsideClick: false,
        reverseButtons: true,
        customClass: {
            confirmButton: 'btn btn-outline-success',
            cancelButton: 'btn btn-outline-danger mr-3'
        },
        confirmButtonText: 'Oke',
        cancelButtonText: 'Batalkan'
    }).then((result) => result);
}

function ucwords(str) {
    return (str + '').replace(/^([a-z])|\s+([a-z])/g, function ($1) {
        return $1.toUpperCase();
    });
}

function copyLink(link, callback)
{
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val(link).select();
    document.execCommand("copy");
    $temp.remove();
    $.notify("URL copied!", "success");
    if (callback) {
        if (isFunction(callback)) {
            callback();
        } else {
            callback;
        }
    }
}

function dateMonthHumanDate(date) {
    date = date.split('-')
    let month = {
        '01': 'Jan',
        '02': 'Feb',
        '03': 'Mar',
        '04': 'Apr',
        '05': 'Mei',
        '06': 'Jun',
        '07': 'Jul',
        '08': 'Agu',
        '09': 'Sep',
        '10': 'Okt',
        '11': 'Nov',
        '12': 'Des',
    };
    return date[2]+' '+month[date[1]];
}
