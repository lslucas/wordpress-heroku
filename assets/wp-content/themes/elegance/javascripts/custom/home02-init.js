
/*global $:false */
/*global window: false */

(function(){
  "use strict";


$(function ($) {


    $(window).load(function(){



        var $container = $('.works-container');

        $container.imagesLoaded( function(){
            $container.isotope({
              itemSelector: '.works-item'
            });
        });


        // window resize and layout regenerate
        $(window).resize(function() {
            $container.isotope({
              itemSelector: '.works-item'
            });
        });

    });




});
// $(function ($)  : ends

})();
//  JSHint wrapper $(function ($)  : ends











