jQuery(document).ready(function($) {
/*global $:false */
/*global window: false */




$(function ($) {

		if( !device.tablet() && !device.mobile() ) {

			 $(function(){
		      $(".player").mb_YTPlayer({
		      	quality: 'highres'
		      });
		    });

		} else {

			/* displays a poster image if mobile device is detected*/
			$('.youtube-bgvideo-page').addClass('yt-poster-img poster-img');

		}



});
// $(function ($)  : ends



});


