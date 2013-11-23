/**
 *
 */

(function ($) {
    "use strict";

    function voteUp()
    {
        vote($('.up-score a').prop('href'), 1);
    }

    function voteDown()
    {
        vote($('.down-score a').prop('href'), -1);
    }

    function vote(url, value)
    {
        $.ajax({
            url: url
        }).done(function () {
            var score = $('.vote-current-score');
            score.text(parseInt(score.text(), 10) + value);
        }).fail(function () {
            alert('failed');
        }).always(function () {

        });
    }

    $('.up-score a').click(function (event) {
        event.preventDefault();
        voteUp();
    });
    $('.down-score a').click(function (event) {
        event.preventDefault();
        voteDown();
    });
})(jQuery);
