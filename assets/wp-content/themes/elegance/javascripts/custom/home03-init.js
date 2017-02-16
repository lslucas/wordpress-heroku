jQuery(document).ready(function($) {
$(".fullscreen-carousel").owlCarousel({
        navigation : false,
        pagination: true,
        responsive: true,
        items: 1,
        touchDrag: true,
        navigationText: false,
        mouseDrag: true,
        itemsDesktop: [3000,1],
        itemsDesktopSmall: [1440,1],
        itemsTablet:[1024,1],
        itemsTabletSmall: [600,1],
        itemsMobile: [360,1],
        autoPlay: false,
        autoHeight: false,
        beforeMove: beforeMoving,
        afterMove: afterMoving,
      });


function beforeMoving() {
    $('.fullscreen-carousel .item .inner-overlay .valign').slideUp(50);
}
function afterMoving() {
    $('.fullscreen-carousel .item .inner-overlay .valign').delay(800).slideDown();
}
});

