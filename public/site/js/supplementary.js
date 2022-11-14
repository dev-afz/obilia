
const notificationManager = (type = 'info', message) => {
    switch (type) {
        case 'success':
            Notiflix.Notify.success(message);
            break;
        case 'failure':
            Notiflix.Notify.failure(message);
            break;
        case 'warning':
            Notiflix.Notify.warning(message);
            break;
        case 'info':
            Notiflix.Notify.info(message);
            break;
        default:
            Notiflix.Notify.info(message);
            break;
    }
}



