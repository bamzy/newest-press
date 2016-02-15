/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - http://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal, window, document, undefined) {

    // Homepage New Releases animation
    var newReleases = function () {
        $('.view-books-new-releases .views-row').css({"paddingTop": "0"}).each(function () {
            var nrShortDesc = $(this).find('.short-desc');
            //var nrMargin = ($(this).find('.nr-picture img').height() + ($(this).find('.nr-text').height()))-275;
            var topMargin = ($(this).find('.nr-text').height());
            $(this).css({"margin-top": -topMargin, "padding-top": "110px"});

        });
        // Mouse Over
        $('.view-books-new-releases .views-row').hover(function () {
                var nrTextDetail = $(this).find('.nr-text').clone().addClass('nr-text-detail').removeClass('nr-text').hide();
                var position = $(this).position();
                nrTextDetail.insertAfter($(this)).css({'opacity': '0', 'display': 'block', 'left': position.left - 270});
                nrTextDetail.find('.short-desc').show();
                if (position.left < 300) {
                    nrTextDetail.addClass('right').css({'text-align': 'left', 'left': position.left + 175});
                }
                ;
                nrTextDetail.animate({
                    'opacity': 1
                }, 200);

                $(this).stop(false, true).animate({
                    'padding-top': 60,
                    'opacity': 1
                }, 100).siblings('.views-row').stop(false, true).animate({
                    'opacity': 0.1
                }, 100);

                $(this).find('.nr-text').animate({
                    'opacity': 0
                }, 30, function () {

                });

            },
            // Mouse Out
            function () {
                var nrTextDetailTwo = $('.nr-text-detail');
                nrTextDetailTwo.animate({
                    'opacity': 0
                }, 100, function () {
                    $(this).remove();
                });
                $(this).animate({
                    'padding-top': 110
                }, 100);

                $(this).find('.nr-text').animate({
                    'opacity': 1
                }, 200, function () {

                });


                $('.view-books-new-releases').hover(function () {

                    },
                    function () {
                        $('.view-books-new-releases .views-row').stop().animate({
                            'opacity': 1,
                            'padding-top': 110
                        }, 100);
                    });


            });

    };

    // Continue Shopping back button
    var continueShopping = function () {
        $('.line-item-continue-shopping a').click(function (e) {
            e.preventDefault();
            parent.history.go(-2);
        });
    };

    // Document ready
    $(document).ready(function () {
        newReleases();
        //continueShopping();

    });

})(jQuery, Drupal, this, this.document);
;
