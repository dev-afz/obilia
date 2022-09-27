"use strict";

function setTheme(data) {
    const theme = $(data).children().attr('class');
    const type = theme.split(" ");
    const exp = (d => d.setFullYear(d.getFullYear() + 1))(new Date)
    document.cookie = (type[1] === 'feather-moon') ? 'theme=dark; expires=Thu, 01 Jan 2026 00:00:00 UTC; path=/' : 'theme=light; expires=Thu, 01 Jan 2026 00:00:00 UTC; path=/';
}

function toast(type, head, text) {
    toastr[type](text, head, {
        closeButton: true,
        tapToDismiss: false,
        showMethod: "slideDown",
        hideMethod: "slideUp",
        timeOut: 2000,
        progressBar: true,
    });
}


function sendReport(error) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    blockUI();
    $.ajax({
        type: "post",
        url: "http://127.0.0.1:8000/admin/miscellaneous/report-error",
        data: {
            error: error,
            from: location.href
        },
        success: function (response) {
            unblockUI();
            toast('success', 'Success', 'Report has been sent.');
            console.log(response);
        },
        error: function (response) {
            unblockUI();
            console.log(response);
            toast('error', 'Error',
                'There was an error while sending report. please contact the development team.');
            // console.log(response);
        }
    });
}


function blockUI(message = null) {
    $.blockUI({
        message:
            message ?? '<div class="d-flex justify-content-center align-items-center"><p class="mr-50 mb-0">Please wait...</p> <div class="spinner-grow spinner-grow-sm text-white" role="status"></div> </div>',
        css: {
            backgroundColor: 'transparent',
            color: '#fff',
            border: '0'
        },
        overlayCSS: {
            opacity: 0.5
        }
    });
}

function unblockUI() {
    $.unblockUI();
}

const blockDiv = (div, message = null) => {
    $(div).block({
        message:
            message ?? '<div class="d-flex justify-content-center align-items-center"><p class="mr-50 mb-0">Please wait...</p> <div class="spinner-grow spinner-grow-sm text-white" role="status"></div> </div>',
        css: {
            backgroundColor: 'transparent',
            color: '#fff',
            border: '0'
        },
        overlayCSS: {
            opacity: 0.5
        }
    });
}

const unblockDiv = (div) => {
    $(div).unblock();
}


// const validated = (form) => {
//     $(form).validate({
//         errorClass: "error",
//         validClass: "success",
//         errorElement: "span",
//         ignore: ":hidden:not(.summernote, .checkbox),.note-editable.card-block",
//         errorPlacement: function (error, element) {
//             if (element.hasClass("select2-hidden-accessible")) {
//                 error.insertAfter(element.next("span.select2"));
//             } else if (element.hasClass("summernote")) {
//                 error.insertAfter(element.siblings(".note-editor"));
//             } else if (element.hasClass("touchspin")) {
//                 error.insertAfter(element.siblings(".input-group-append"));
//             } else if (element.hasClass("checkbox")) {
//                 error.insertAfter(element.siblings("label"));
//             } else {
//                 error.insertAfter(element);
//             }
//         }
//     });
// }

function validate(form) {
    if (form[0].checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
        form.addClass('was-validated');
        return false;
    }
    form.addClass('was-validated');
    return true;
}



function rebound({
    selector = null,
    data = null,
    method = "POST",
    route = null,
    reset = true,
    reload = false,
    successCallback = null,
    errorCallback = null,
    loader = null,
    returnData = false,
    block = null,
    blockMessage = null,
}) {
    if (selector === null && data === null) {
        toast('error', 'Error', 'Please set the selector or data');
        return false
    }
    if (route == null) {
        toast('error', 'Error', 'Please set the route');
        return false
    }
    if (selector !== null) {
        var form = $(selector)[0];
        var formData = new FormData(form);
    }
    if (data !== null) {
        var formData = new FormData();

        $.each(data, function (key, value) {
            formData.append(key, value);
            console.log(key, value);
        });

    }

    const btn = $(selector).find('button[type="submit"]');
    const btn_text = $(btn).text();
    $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    (block !== null) ? blockDiv(block, blockMessage) : blockUI(blockMessage);
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    console.log(formData);
    $.ajax({
        type: method,
        url: route,
        processData: (data?.length > 0) ? true : false,
        contentType: (data?.length > 0) ? true : false,
        data: data ?? formData,
        success: function (response) {
            $(btn).html(btn_text);
            console.log(response);
            if (selector !== null) {
                $(selector).removeClass('was-validated');
                if (reset) {
                    $(selector)[0].reset();
                    $(selector).trigger("reset");
                    $(`form#${$(selector).attr('id')} select, form input[type=checkbox]`).trigger("change");
                    $(selector).find('.custom-file-label').html('Choose file');
                }

                $(selector).closest('.modal').modal('hide');
            }
            (block !== null) ? unblockDiv(block) : unblockUI();
            if (method == "get" || method == "GET") { } else {
                toast((response.type) ? response.type : 'success', response.header, response.message);
                if ($.fn.DataTable && response.table !== undefined) {
                    $('#' + response.table).DataTable().ajax.reload();
                }
            }

            if (reload || response.reload) {
                location.reload();
            }
            if (successCallback !== null) {
                successCallback.apply(null, arguments);
            }
            if (method == "get" || method == "GET" || returnData) {
                return response;
            }

            return true
        },
        error: function (xhr, status, error) {
            (block !== null) ? unblockDiv(block) : unblockUI();
            $(btn).html(btn_text);
            if (xhr.status == 422) {
                $.each(xhr.responseJSON.errors, function (key, item) {
                    toast('error', 'Error', item[0]);
                    console.log(item);
                });
            } else if (xhr.status == 500) {
                toast('error', 'Error500', error);
                console.error(xhr.responseJSON.errors);
                // report(xhr.responseJSON);
            } else {
                // report(xhr.responseJSON);
                toast('error', 'Error', error);
                console.error(xhr.responseJSON.errors);
            }


            if (errorCallback !== null) {
                errorCallback.apply(null, arguments);
            }

            return false;
        }
    });
}

(() => {
    $(document).on('click', '[data-view-image]', function () {
        console.log('click');
        try {
            Swal.fire({
                html: '<img class="s-image" src="' + $(this).attr('src') + '"  alt="image"/>',
                showCloseButton: true,
                showCancelButton: false,
                showConfirmButton: false,
                width: '800px',
            });
        } catch (error) {
            console.log(error);
            toast('warning', 'Warning', 'Import Swal library');
        }

    });
})();

