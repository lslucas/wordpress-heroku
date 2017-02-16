// $.fn.setAllToMaxHeight = function(){
// return this.height( Math.max.apply(this, $.map( this , function(e){ return $(e).height() }) ) );
// }

$.fn.setAllToMaxHeight = function(){
return this.css({ 'height' : '' }).height( Math.max.apply(this, jQuery.map( this , function(e){ return jQuery(e).height() }) ) );
}



