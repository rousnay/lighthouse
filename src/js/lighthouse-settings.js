( function( $ ) {

/***
Primary Nav manu Toggle hide/show
***/
jQuery("#hamburger").click(function(){
  jQuery("#site-nav").fadeToggle("slow");
});

/***
Menu Button Animation
***/
var toggles = document.querySelectorAll(".c-hamburger");

for (var i = toggles.length - 1; i >= 0; i--) {
  var toggle = toggles[i];
  toggleHandler(toggle);
};

function toggleHandler(toggle) {
  toggle.addEventListener( "click", function(e) {
    e.preventDefault();
    (this.classList.contains("is-active") === true) ? this.classList.remove("is-active") : this.classList.add("is-active");
  });
};



  // setTimeout(function(){
  //   $('body').addClass('loaded');
  // }, 3000);





// if ($(".is-active")[0]){

//     $('body, html').css({
//             'overflow': 'hidden',
//         });

// } else {

//     $('body, html').css({
//             'overflow': 'auto',
//         });

// };

// if ($('#hamburger').hasClass('is-active')) {
//           $('body, html').css({
//             'overflow': 'hidden',
//         });
// }
// if ($('#hamburger').not('is-active')) {
//       $('body, html').css({
//             'overflow': 'auto',
//         });
// }

$( "#hamburger" ).click(function() {
  $( 'body, html' ).toggleClass( "body-overflow" );
});

/***
Initialize Smooth Scroll
***/
smoothScroll.init({
  speed: 1000,
  easing: 'easeInOutCubic',
  offset: 0,
  updateURL: true,
  callback: function ( toggle, anchor ) {}
});

/***
Court booking popup
***/

if ( $.isFunction($.fn.bPopup) ) {
  jQuery('#booking-popup').bPopup({
    follow: [false, false], //x, y
    appendTo: '.home-row-slider',
    speed :'900',
    transition :'fadeIn'
  });
}

$(".btn-open").click(function(){
  jQuery('#booking-popup').bPopup({
    follow: [false, false], //x, y
    appendTo: '.home-row-slider',
    speed :'900',
    transition :'fadeIn'
  });
});

$(".nav-court1").click(function(){
  $(".popup-court1").fadeIn("slow");
  $(".popup-court2").fadeOut("slow");

  $(".court-field:nth-child(even)").fadeIn("slow");
  $(".court-field:nth-child(odd)").fadeOut("slow");

  $(".nav-court1").addClass("active-court");
  $(".nav-court2").removeClass("active-court");
});

$(".nav-court2").click(function(){
  $(".popup-court1").fadeOut("slow");
  $(".popup-court2").fadeIn("slow");

  $(".court-field:nth-child(even)").fadeOut("slow");
  $(".court-field:nth-child(odd)").fadeIn("slow");

  $(".nav-court1").removeClass("active-court");
  $(".nav-court2").addClass("active-court");
});

/***
Slider
***/
if ( $.isFunction($.fn.bjqs) ) {
  jQuery('#main-slider').bjqs({
    responsive  : true
  });
};


/***
Accordion
***/
if ( $.isFunction($.fn.accordion) ) {
  jQuery( "#accordion-local, #accordion-regional" ).accordion({
    animate: 350
  });

  jQuery( "#other-coach-box" ).accordion({
    animate: 350,
    collapsible: true,
    active: false
  });
};

/***
Carousel
***/
if ( $.isFunction($.fn.jcarousel) ) {
  
  jQuery('.jcarousel').jcarousel({
        // Configuration goes here
      });

  var jcarousel = $('.jcarousel');

  jcarousel
  .on('jcarousel:reload jcarousel:create', function () {
    var carousel = $(this),
    width = carousel.innerWidth();

    if (width >= 900) {
      width = width / 3;
    } else if (width >= 700) {
      width = width / 2;
    }

    carousel.jcarousel('items').css('width', Math.ceil(width) + 'px');
  })
  .jcarousel({
    wrap: 'circular'
  });

  $('.jcarousel-control-prev')
  .jcarouselControl({
    target: '-=1'
  });

  $('.jcarousel-control-next')
  .jcarouselControl({
    target: '+=1'
  });

  $('.jcarousel-pagination')
  .on('jcarouselpagination:active', 'a', function() {
    $(this).addClass('active');
  })
  .on('jcarouselpagination:inactive', 'a', function() {
    $(this).removeClass('active');
  })
  .on('click', function(e) {
    e.preventDefault();
  })
  .jcarouselPagination({
    perPage: 1,
    item: function(page) {
      return '<a href="#' + page + '">' + page + '</a>';
    }
  });
};

/***
Isotope Setup
***/
if ($.isFunction($.fn.imagesLoaded) ) {
  var $container = $('#blogContent'),

      // create a clone that will be used for measuring container width
      $containerProxy = $container.clone().empty().css({ visibility: 'hidden' });   

      $container.after( $containerProxy );  

    // get the first item to use for measuring columnWidth
    var $item = $container.find('.blog-item').eq(0);
    $container.imagesLoaded(function(){
      $(window).smartresize( function() {

    // calculate columnWidth
    var colWidth = Math.floor( $containerProxy.width() / 3 ); // Change this number to your desired amount of columns

    // set width of container based on columnWidth
    $container.css({
        width: colWidth * 3 // Change this number to your desired amount of columns
      })
    .isotope({

      // disable automatic resizing when window is resized
      resizable: false,

      // set columnWidth option for masonry
      masonry: {
        columnWidth: colWidth
      }
    });

    // trigger smartresize for first time
  }).smartresize();
    });

// filter items when filter link is clicked
$('#filters li').click(function(){
  $('#filters li.active').removeClass('active');
  var selector = $(this).attr('data-filter');
  $container.isotope({ filter: selector, animationEngine : "css" });
  $(this).addClass('active');
  return false;

});


// filter items when filter link is selected from dropdown
$(function() {
    $select = $('#filters select');
    $container.isotope({
        itemSelector: '.blog-item'
    });

    $select.change(function() {
        var filters = $(this).val();
;
        $container.isotope({
            filter: filters
        });
    });

});

};
/***
Google Map Settings
***/
if (typeof google != 'undefined') {

  var map;
  var tiasa = new google.maps.LatLng(1.306700, 103.875378);
  var tiasaIcon = new google.maps.LatLng(1.302852, 103.875147);

 //The CenterControl adds a control to the map that recenters the map on tiasa.
 function CenterControl(controlDiv, map) {

  // Set CSS for the control border
  var controlUI = document.createElement('div');
  controlUI.style.backgroundColor = '#1e1e1e';
  controlUI.style.border = '5px solid #f4bb56';
  // controlUI.style.borderRadius = '3px';
  // controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
  controlUI.style.cursor = 'pointer';
  controlUI.style.marginBottom = '60px';
  controlUI.style.textAlign = 'center';
  controlUI.title = 'Click to recenter the map';
  controlDiv.appendChild(controlUI);

  // Set CSS for the control interior
  var controlText = document.createElement('div');
  controlText.style.color = '#f4bb56';
  controlText.style.fontFamily = 'A2TypeBeckett, Sans-Serif';
  controlText.style.fontSize = '42.07px';
  controlText.style.lineHeight = '60px';
  controlText.style.paddingLeft = '35px';
  controlText.style.paddingRight = '35px';
  controlText.style.textTransform = 'uppercase';
  controlText.innerHTML = 'Center Location';
  controlUI.appendChild(controlText);

  // Setup the click event listeners: simply set the map to tiasa
  google.maps.event.addDomListener(controlUI, 'click', function() {
    map.setCenter(tiasa)
  });
}

function initialize() {
  var mapDiv = document.getElementById('map-canvas');
  var mapOptions = {
    zoom: 15,
    center: tiasa,
    styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#d1dcdc"}]},{"featureType":"administrative","elementType":"labels.text.stroke","stylers":[{"color":"#54787a"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#037696"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#009ed0"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#dcd4c6"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#acc94d"},{"weight":"0.5"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#123540"},{"visibility":"on"}]}]

  }
  map = new google.maps.Map(mapDiv, mapOptions);

  // Create the DIV to hold the control and call the CenterControl() constructor passing in this DIV.
  var centerControlDiv = document.createElement('div');
  centerControlDiv.setAttribute('style', 'left:0 !important');
  centerControlDiv.style.right = '0';
  centerControlDiv.style.margin = 'auto';
  centerControlDiv.style.width = '340px';
  centerControlDiv.className = "btn-center";

  var centerControl = new CenterControl(centerControlDiv, map);

  centerControlDiv.index = 1;
  map.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(centerControlDiv);

  //Add Marker Icon
  var image = '../wp-content/themes/Tiasa/images/icon-stadium.png';
  var beachMarker = new google.maps.Marker({
    position: tiasaIcon,
    map: map,
    icon: image
  });
}
google.maps.event.addDomListener(window, 'load', initialize);
};

} )( jQuery );
/***
Page Animations Setup
***/
  //VIEWPORT ANIMATION


jQuery(document).ready(function( $ ) {

if($(window).width() >= 769){

    jQuery('.title-area .page-title, .title-area .post-title').addClass("hiddens").viewportChecker({
      classToAdd: 'visibles animated slideInUp',
      offset: 150,
      repeat: false
    });

    jQuery('.load-fadeIn, .header-area, .shop-content p').addClass("hiddens").viewportChecker({
      classToAdd: 'visibles animated fadeIn',
      offset: 150,
      repeat: false
    });
    jQuery('.load-fadeInUp').addClass("hiddens").viewportChecker({
      classToAdd: 'visibles animated fadeInUp',
      offset: 150,
      repeat: false
    });
    jQuery('.load-fadeInDown, .header-text h3').addClass("hiddens").viewportChecker({
      classToAdd: 'visibles animated fadeInDown',
      offset: 150,
      repeat: false
    });
    jQuery('.load-fadeInLeft').addClass("hiddens").viewportChecker({
      classToAdd: 'visibles animated fadeInLeft',
      offset: 150,
      repeat: false
    });
    jQuery('.load-fadeInRight').addClass("hiddens").viewportChecker({
      classToAdd: 'visibles animated fadeInRight',
      offset: 150,
      repeat: false
    });
    jQuery('.load-slideInUp').addClass("hiddens").viewportChecker({
      classToAdd: 'visibles animated slideInUp',
      offset: 150,
      repeat: false
    });
    jQuery('.load-slideInDown').addClass("hiddens").viewportChecker({
      classToAdd: 'visibles animated slideInDown',
      offset: 150,
      repeat: false
    });
    jQuery('.load-slideInLeft').addClass("hiddens").viewportChecker({
      classToAdd: 'visibles animated slideInLeft',
      offset: 150,
      repeat: false
    });
    jQuery('.load-slideInRight').addClass("hiddens").viewportChecker({
      classToAdd: 'visibles animated slideInRight',
      offset: 150,
      repeat: false
    });
    jQuery('.load-bounceIn').addClass("hiddens").viewportChecker({
      classToAdd: 'visibles animated bounceIn',
      offset: 150,
      repeat: false
    }); 
    jQuery('.load-bounceInLeft').addClass("hiddens").viewportChecker({
      classToAdd: 'visibles animated bounceInLeft',
      offset: 150,
      repeat: false
    });
    jQuery('.load-bounceInRight').addClass("hiddens").viewportChecker({
      classToAdd: 'visibles animated bounceInRight',
      offset: 150,
      repeat: false
    });
    jQuery('.load-bounceInUp').addClass("hiddens").viewportChecker({
      classToAdd: 'visibles animated bounceInUp',
      offset: 150,
      repeat: false
    });
    jQuery('.load-bounceInDown').addClass("hiddens").viewportChecker({
      classToAdd: 'visibles animated bounceInDown',
      offset: 150,
      repeat: false
    });    
    jQuery('.load-lightSpeedIn').addClass("hiddens").viewportChecker({
      classToAdd: 'visibles animated lightSpeedIn',
      offset: 150,
      repeat: false
    });
    jQuery('.load-flipInX').addClass("hiddens").viewportChecker({
      classToAdd: 'visibles animated flipInX',
      offset: 150,
      repeat: false
    });
    jQuery('.load-zoomIn').addClass("hiddens").viewportChecker({
      classToAdd: 'visibles animated zoomIn',
      offset: 150,
      repeat: false
    });
    jQuery('.load-pulse').addClass("hiddens").viewportChecker({
      classToAdd: 'visibles animated pulse',
      offset: 150,
      repeat: false
    });

};
  });
