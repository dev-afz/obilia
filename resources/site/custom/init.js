"use strict";

Notiflix.Loading.init({
    zindex: 999999,
});
Notiflix.Block.init({
    zindex: 9999999,
});

Notiflix.Notify.init({
    zindex: 99999999,
    position: 'right-bottom',
    cssAnimation: true,
    cssAnimationDuration: 400,
    cssAnimationStyle: 'zoom',
});



const notify = Notiflix.Notify;

/*
|--------------------------------------------------------------------------
| Supplementary functions
|--------------------------------------------------------------------------
|
| These functions are used from anywhere in the application as supplementary
|
*/







const rebound = ({
    form = null,
    data = null,
    method = 'POST',
    url = null,
    refresh = false,
    reset = true,
    reload = false,
    redirect = null,
    block = 'empty',
    beforeSendCallback = null,
    successCallback = null,
    errorCallback = null,
    completeCallback = null,
    notification = true,
    logging = true,
    returnData = false,
    processData = false,

}) => {
    if (form === null && data === null) {
        throw new Error('No form or data provided in rebound()');
    }
    if (url === null) {
        throw new Error('No url provided in rebound()');
    }

    if (form !== null) {
        const formData = $(form)[0];
        form = new FormData(formData);
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        method: method,
        data: data ?? form,
        processData: processData,
        contentType: (processData) ? 'application/x-www-form-urlencoded' : false,
        beforeSend: function () {

            if (block) {
                (block !== 'empty') ? Notiflix.Block.hourglass(block) : Notiflix.Loading.hourglass();
            }
            if (beforeSendCallback !== null) {
                beforeSendCallback.apply(null, arguments);
            }
        },
        success: function (response) {
            (logging) ? console.log(response) : null;
            if (block) {
                (block !== 'empty') ? Notiflix.Block.remove(block) : Notiflix.Loading.remove();
            }
            if (reset) {
                if (form) {
                    $(form).find('input').each(function () {
                        $(this).val('').trigger('change');
                    });
                }

            }

            if (reload) {
                location.reload();
            }
            if (notification) {
                notificationManager(response.status, response.message);
            }
            (refresh || response.refresh) ? location.reload() : null;
            if (redirect !== null || (response.redirect !== null && response.redirect !== undefined)) {
                window.location.href = redirect ?? response.redirect;
            }
            if (successCallback !== null) {
                successCallback.apply(null, arguments);
            }

            if (returnData) {
                return response;
            }
            if (form) {
                $(form).find('.is-invalid').each(function () {
                    $(this).removeClass('is-invalid');
                });
            }
            return true;
        },
        error: function (xhr, status, error) {
            // (logging) ? console.error(error) : null;
            console.log(xhr);
            if (block) {
                (block !== 'empty') ? Notiflix.Block.remove(block) : Notiflix.Loading.remove();
            }
            if (errorCallback !== null) {
                errorCallback.apply(null, xhr);
            }
            if (xhr.status == 422) {
                $(form).find('.is-invalid').each(function () {
                    $(this).removeClass('is-invalid');
                });
                $.each(xhr.responseJSON.errors, function (key, item) {
                    notify.failure(item[0]);
                    $(form).find(`[name=${key}]`).addClass('is-invalid');
                    console.log(key);
                });
            } else if (xhr.status == 500) {
                notify.failure(error);
            } else {
                notify.failure(error);
            }
            return false;
        },
        complete: (response) => {
            console.log("complete", response);
            if (block) {
                if (block !== 'empty') {
                    Notiflix.Block.remove(block);
                } else {
                    Notiflix.Loading.remove();
                }
            }
            if (completeCallback !== null) {
                completeCallback.apply(null, response);
            }
        }
    });
}



// remove is-invalid class from input if it is valid
$(document).on('keyup change', 'form input,select,textarea', function () {
    if ($(this).val()) {
        if ($(this).is('input')) {
            $(this).removeClass('is-invalid');
        } else if ($(this).is('select')) {
            $(this).closest('.form-group').find('.select2-selection').css('border',
                '1px solid #ced4da');
        } else if ($(this).is('textarea')) {
            $(this).removeClass('is-invalid');
        }
    } else {
        if ($(this).is('input')) {
            $(this).addClass('is-invalid');
        } else if ($(this).is('select')) {
            $(this).closest('.form-group').find('.select2-selection').css('border',
                '1px solid red');
        } else if ($(this).is('textarea')) {
            $(this).addClass('is-invalid');
        }
    }
});


$(document).on('change', '[data-like-toggle]', function () {
    const id = $(this).data('like-toggle');
    const checkbox = $(this);

    $(this).prop('disabled', true);

    const url = window.location.origin + '/like/job';
    rebound({
        url: url,
        method: 'POST',
        processData: true,
        block: false,
        data: {
            id: id
        },
        successCallback: (response) => {
            console.log(response);
        },
        completeCallback: (response) => {
            $(checkbox).prop('disabled', false);
        }
    });
});

$(document).on('change', '[data-uncheckable]', function () {
    if ($(this).is(':checked')) {
        $(this).prop('checked', false).trigger('change');
    }
});
