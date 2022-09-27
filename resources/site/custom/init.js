"use strict";
Notiflix.Loading.init({
    zindex: 999999,
});
Notiflix.Block.init({
    zindex: 9999999,
});
const notify = Notiflix.Notify;

const rebound = ({
    form = null,
    data = null,
    method = 'POST',
    url = null,
    refresh = false,
    reset = true,
    redirect = null,
    block = null,
    beforeSendCallback = null,
    successCallback = null,
    errorCallback = null,
    completeCallback = null,
    showNotify = true,
    logging = true,
    returnData = false,

}) => {
    if (form === null && data === null) {
        throw new Error('No form or data provided in rebound()');
    }
    if (url === null) {
        throw new Error('No url provided in rebound()');
    }

    if (form !== null) {
        const formData = $(form)[0];
        data = new FormData(formData);
    }
    if (data !== null) {
        data = data;
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        method: method,
        data: data,
        processData: (data.length > 0) ? true : false,
        contentType: (data.length > 0) ? true : false,
        beforeSend: () => {
            if (block !== null) {
                Notiflix.Block.hourglass(block);
            } else {
                Notiflix.Loading.hourglass();
            }
            if (beforeSendCallback !== null) {
                beforeSendCallback.apply(this, arguments);
            }
        },
        success: (response) => {
            (logging) ? console.log(response) : null;
            if (successCallback !== null) {
                successCallback.apply(this, arguments);
            }

            if (reset) {
                $(form).find('input').each(function () {
                    $(this).val('').trigger('change');
                });
            }
            if (showNotify) {
                notify.success(response.header ?? 'Success!!', response.message ?? '');
            }
            (refresh || response.refresh) ? location.reload() : null;
            if (redirect !== null || response.redirect !== null) {
                window.location.href = redirect ?? response.redirect;
            }


            if (returnData) {
                return response;
            }
            return true;
        },
        error: (xhr, status, error) => {
            (logging) ? console.error(error) : null;
            if (errorCallback !== null) {
                errorCallback.apply(this, arguments);
            }
            if (xhr.status == 422) {
                $.each(xhr.responseJSON.errors, function (key, item) {
                    notify.failure(item[0]);
                    $(form).find(`[name=${key}]`).addClass('is-invalid');
                });
            } else if (xhr.status == 500) {
                notify.failure(error);
            } else {
                notify.failure(error);
            }
            return false;
        },
        complete: () => {
            if (block !== null) {
                Notiflix.Block.remove(block);
            } else {
                Notiflix.Loading.remove();
            }
            if (completeCallback !== null) {
                completeCallback.apply(this, arguments);
            }
        }
    });



}
