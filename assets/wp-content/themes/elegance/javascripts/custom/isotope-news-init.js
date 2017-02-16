jQuery(document).ready(function($) {
/*global $:false */
/*global window: false */

(function(){
  "use strict";


$(function ($) {


    $(window).load(function(){



        var $container = $('.news-container');

        $container.isotope({
              itemSelector: '.news-item'
            });

        $container.imagesLoaded( function(){
            $container.isotope({
              itemSelector: '.news-item'
            });
        });



        // window resize and layout regenerate
        $(window).resize(function() {
            $container.isotope({
              itemSelector: '.news-item'
            });
        });

    });




});
// $(function ($)  : ends

})();
//  JSHint wrapper $(function ($)  : ends

});









