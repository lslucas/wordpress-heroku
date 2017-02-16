

if( !device.tablet() && !device.mobile() ) {

            /* if non-mobile device is detected*/ 
              // Parallax Init
              $('.parallax-layer').each(function() {
                    $(this).parallax('20%', 0.1, true);
                });
                        
        } else {
            
            /* if mobile device is detected*/ 
            $('.parallax-layer').addClass('parallax-off');
        }

        
	