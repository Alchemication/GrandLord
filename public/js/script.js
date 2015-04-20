/**
 * Created by adam on 11/02/15.
 */

/**
 * Global GrandLord object and methods
 * @type {object}
 */
var GrandLord = {};

/**
 * Show/hide messages
 *
 * @param {string} type
 * @param {string|[]} msg
 */
GrandLord.flashMessage = function (type, msg) {

    var $flash      = $('.flash');
    var $flashModal = $('.flash-modal');

    var closeButton = '<i class="close-btn glyphicon glyphicon-remove pull-right"></i>';

    var success = function (el) {

        var html = '<h4>Success: ' + closeButton + '</h4>';

        html += '<p>' + msg + '</p>';

        el.html(html);
        el.removeClass('alert-danger').removeClass('alert-info').addClass('alert-success').fadeIn();
    };

    var error = function (el) {

        var html = '<h4>Error(s): ' + closeButton + '</h4>';

        if (_.isArray(msg)) {
            html += '<ul>';

            _.each(msg, function (ms) {
                html += '<li>' + ms + '</li>';
            });

            html += '</ul>';
        } else {
            html += '<p>' + msg + '</p>';
        }

        el.html(html);
        el.removeClass('alert-success').removeClass('alert-info').addClass('alert-danger').fadeIn();
    };

    var process = function (el) {

        var html = '<h4>Processing... ' + closeButton + '</h4>';

        el.html(html);
        el.removeClass('alert-danger').removeClass('alert-success').addClass('alert-info').fadeIn();
    };

    var clear = function (el) {
        el.html('');
        el.fadeOut();
    };

    switch (type) {
        case 'modal-error':

            error($flashModal);
            break;

        case 'error':

            error($flash);
            break;

        case 'success':

            success($flash);
            break;

        case 'modal-process':

            process($flashModal);
            break;

        case 'process':

            process($flash);
            break;

        case 'clear':

            clear($flashModal);
            clear($flash);
            break;

        default:
            break;
    }
};

// add app-global events
$(function () {

    // remove flash boxes when 'X' is clicked
    $(document).on('click', '.close-btn', function () {
        $('.flash, .flash-modal').fadeOut();
    });
});
