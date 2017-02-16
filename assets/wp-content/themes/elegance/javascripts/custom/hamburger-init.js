jQuery(document).ready(function($) {
/*global $:false */
/*global window: false */

(function(){
  "use strict";


$(function ($) {


	$('#nav-icon').click(function(){
	    $(this).toggleClass('visible-yes');
	    var hidden = $('.mastnav, .social-wrap');
	    var $this = $(this);
	    if ($this.hasClass('visible-yes')){
	    	$this.removeClass('open');
	        hidden.addClass('visible-no');
			hidden.slideUp( "slow", function() {
	        	$('.masthead').removeClass('expanded');
			});

	    } else {
	    	$this.addClass('open');
	        hidden.removeClass('visible-no');
			$('.masthead').addClass('expanded');
			hidden.delay(1000).slideDown();
	    }
    });




});
// $(function ($)  : ends

})();
//  JSHint wrapper $(function ($)  : ends
});

