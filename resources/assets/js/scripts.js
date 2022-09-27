(function (window, undefined) {
    'use strict';

    /*
    NOTE:
    ------
    PLACE HERE YOUR OWN JAVASCRIPT CODE IF NEEDED
    WE WILL RELEASE FUTURE UPDATES SO IN ORDER TO NOT OVERWRITE YOUR JAVASCRIPT CODE PLEASE CONSIDER WRITING YOUR SCRIPT HERE.  */


    document.addEventListener("DOMContentLoaded", function () {
        const toggle = document.querySelector('[data-collapsed]');
        toggle.addEventListener('click', () => {
            const is_collapsed = toggle.getAttribute('data-collapsed');
            if (is_collapsed == 'true') {
                toggle.setAttribute('data-collapsed', 'false');

            } else {
                toggle.setAttribute('data-collapsed', 'true');

            }
            document.cookie = "sidebar_collapsed=" + toggle.getAttribute('data-collapsed');
        });
    });


})(window);
