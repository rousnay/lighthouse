( function( $ ) {

	/******************************
	 Header and Menu
	******************************/
	function contentMargin() {
		var headerHeight	= $('#masthead').height();
		var siteContent		= $('#content');

		siteContent.css('margin-top',headerHeight)
	}

	contentMargin();

	$( window ).resize(function() {
		contentMargin();
	});

	jQuery('#mm-menu li').addClass("mm-menu__item");
	jQuery('#mm-menu a').addClass("mm-menu__link");
	jQuery('#mm-menu a span').addClass("mm-menu__link-text");
	var menu = new Menu;


	/*********************************
	 Load more option to Search result
	*********************************/
    size_art = $(".search-results article").size();
    x=5;

        if(size_art <= 5){
            $('#loadMore').hide();
            $('#showLess').hide();
        }

    $('.search-results article:lt('+x+')').show();

    $('#loadMore').click(function () {
        x= (x+6 <= size_art) ? x+6 : size_art;
        $('.search-results article:lt('+x+')').slideDown();

         $('#showLess').show();
        if(x <= 5  || x == size_art){
            $('#loadMore').hide();
        }

        var visibleArt = $('.search-results').find('article:visible:last');

         $('html, body').animate({
	        scrollTop: $(visibleArt).offset().top
	    }, 1000);
    });

    $('#showLess').click(function () {
        x=(x-6<0) ? 5 : x-6;
        

        $('#loadMore').show();
        $('#showLess').show();
        if(x <= 5){
            $('#showLess').hide();
        }

			
		$('.search-results article').not(':lt('+x+')').hide(1000);

		var visibleArt = $('.search-results').find('article:visible:last').prevAll().eq(7);
		        $('html, body').animate({
			        scrollTop: $(visibleArt).offset().top
			    }, 1000);


    });


	/******************************
	 Font Adjustment
	******************************/
	var a=$("body");
	$("#textplus").click(function(){
		var c=a.css("fontSize");
		var b=parseInt(c.replace("px",""))+1;$(a).css("fontSize",b+"px")
	});
	$("#textminus").click(function(){
		var c=a.css("fontSize");
		var b=parseInt(c.replace("px",""))-1;$(a).css("fontSize",b+"px")
	})


	/******************************
	 Library: owl.carousel
	******************************/
	$("#related-posts").owlCarousel({
		items : 4
	});

	$("#recent-posts").owlCarousel({
		items : 3
	});

	$("#logo-slider").owlCarousel({
		items : 15,
		navigation : true,
		itemsDesktop : [1199,12],
	    itemsDesktopSmall : [980,10],
	    itemsTablet: [768,8],
	    itemsTabletSmall: [600,6],
	    itemsMobile : [400,4],
	    singleItem : false,
	    itemsScaleUp : false,
	    navigationText : ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
	});

	//
	document.addEventListener("touchstart", function(){}, true);


	/******************************
	 Library: jquery.matchHeight.js
	******************************/
    $('#recent-posts .entry').matchHeight();

    $('.about-link .about-block').matchHeight();

    /******************************
	 Other settings
	******************************/
	$(".remove-link a").removeAttr("href");

	$("#ninja_forms_form_1_cont input[type='submit']").attr("onclick", "ga('send', 'event', 'Form Submission', 'Contact Request - Woodingdean', 'Services Pages')");
	
	$("#ninja_forms_form_91_cont input[type='submit']").attr("onclick", "ga('send', 'event', 'Form Submission', 'Contact Request - Stockport', 'Services Pages')");

})(jQuery);


/******************************
Ivan Live Option
******************************/
function ivan_live_search_init() {
	//"use strict";
	var searchTopStyle = jQuery('.live-search'),
		searchfullScreen = jQuery('.live-search.search-full-screen-style'),
		searchfullScreenAlt = jQuery('.live-search.search-full-screen-alt-style'),
		formCloseBtn = jQuery('.live-search').find('.form-close-btn');

	jQuery('.live-search .trigger').click( function(e) {

		e.preventDefault();

		var _element = jQuery(this).siblings('.inner-wrapper');

		if ( jQuery(this).parents('.live-search').hasClass('search-top-style') == true ) {
			// jQuery('#all-site-wrapper').css('top', jQuery(this).siblings('.inner-wrapper').outerHeight());
			jQuery('body').addClass('top-search-active');
			if ( jQuery('.iv-layout.header.stuck').length ) {
				jQuery('.iv-layout.header.stuck').addClass('top-search-active');
			};
		};

		_element.toggleClass('visible');

		if (!jQuery(this).parents('.iv-layout').hasClass('top-header') == true) {
			jQuery('.top-header').addClass('beneath');
		} else if (jQuery(this).parents('.iv-layout').hasClass('top-header') == true) {
			jQuery('.top-header').removeClass('beneath');
		}

		setTimeout(function(){
			_element.find('#s').focus().end()
		}, 300);
		
	});

	if ( searchTopStyle.length && jQuery(window).width() >= 992 ) {
		jQuery(window).on('scroll', function() {
			if ( searchTopStyle.find('.inner-wrapper').hasClass('visible') ) {
				searchTopStyle.find('.inner-wrapper').removeClass('visible');
				jQuery('body').removeClass('top-search-active');
			};
		});
	};

	jQuery(document).mouseup( function(e) {

		var _element = jQuery('.inner-wrapper.visible');

		if (!_element.is(e.target) // if the target of the click isn't the container...
			&& _element.has(e.target).length === 0 ) // ... nor a descendant of the container
		{

			if(jQuery(this).parents('.header.simple-left-right').length == 0) {
				if( _element.hasClass('visible') ) {
					_element.removeClass('visible');
				}
			} else {
				if( _element.hasClass('visible') ) {
					_element.removeClass('visible');
				}
			}
			if ( searchTopStyle.length ) {
				// jQuery('#all-site-wrapper').css('top', 0);
				jQuery('body').removeClass('top-search-active');
				if ( jQuery('.iv-layout.header.stuck').length ) {
					jQuery('.iv-layout.header.stuck').removeClass('top-search-active');
				};
			};
		}

	});

	formCloseBtn.on('click', function() {
		var _element = jQuery('.inner-wrapper.visible');
		_element.removeClass('visible');
		if ( jQuery('.iv-layout.header.stuck').length ) {
			jQuery('.iv-layout.header.stuck').removeClass('top-search-active');
		};
		setTimeout(function(){
			jQuery('.top-header').removeClass('beneath')	
		}, 500);
	});

	if ( searchTopStyle.length ) {
		searchTopStyle.find('.form-close-btn').css('right', searchTopStyle.find('form').offset().left);
		formCloseBtn.on('click', function() {
			var _element = jQuery('.inner-wrapper.visible');
			_element.removeClass('visible');
			// jQuery('#all-site-wrapper').css('top', 0);
			jQuery('body').removeClass('top-search-active');
		});
	};


	jQuery('.live-search .submit-form').click( function(e) {

		e.preventDefault();

		jQuery(this).parents('form').submit();

	});
}
//Live Search
ivan_live_search_init();