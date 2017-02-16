jQuery(document).ready(function($) {
/*global $:false */
/*global window: false */

(function(){
  "use strict";


$(function ($) {


			$.okvideo({ source: okplayer_obj.vdo_source, //set your video source here
		                    autoplay:true,
		                    loop: okplayer_obj.loop_status,
		                    highdef:true,
		                    hd:true,
		                    adproof: true,
		                    volume: okplayer_obj.mute_status, // control the video volume by setting a value from 0 to 99

		                 });




});
// $(function ($)  : ends

})();
//  JSHint wrapper $(function ($)  : ends

});


