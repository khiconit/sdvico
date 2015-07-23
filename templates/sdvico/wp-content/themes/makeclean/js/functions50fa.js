(function($)
{
	"use strict";

	/* Event - Window Scroll */
	$(window).scroll(function()
	{
		var scroll	=	$(window).scrollTop();
		var height	=	$(window).height();

		/*** set sticky menu ***/
		if( scroll >= 90 )
		{
			$('.menu-block').addClass("navbar-fixed-top").delay( 2000 ).fadeIn();
		}
		else if ( scroll <= height )
		{
			$('.menu-block').removeClass("navbar-fixed-top");
		}
		else
		{
			$('.menu-block').removeClass("navbar-fixed-top");
		} // set sticky menu - end		

		if ($(this).scrollTop() >= 50)
		{
			// If page is scrolled more than 50px
			$('#back-to-top').fadeIn(200);    // Fade in the arrow
		}
		else
		{
			$('#back-to-top').fadeOut(200);   // Else fade out the arrow
		}
	});
	/* Event - Window Scroll /- */

	$('#back-to-top').click(function()
	{
		// When arrow is clicked
		$('body,html').animate(
		{
			scrollTop : 0 // Scroll to top of body
		},800);
	});		
	
	$('.dial').each(function ()
	{
		var $this = $(this);
		var myVal = $(this).data("value");		

		$this.appear(function()
		{
			// alert(myVal);
			$this.knob({ });
			$({ value: 0 }).animate({ value: myVal },
			{
				duration: 2000,
				easing: 'swing',
				step: function ()
				{
					$this.val(Math.ceil(this.value)).trigger('change');
				}
			});
		});
	});
	
	
	/* Event - Document Ready /- */	
	$(document).ready(function($)
	{

		/* Custom */
		$('#main-navigation').find(' > ul').append( $('#tpl-menu-search').html() );

		$('.menu-search-link a').click(function(){
			$(this).parent().find('.sb-search').toggleClass('sb-search-open');
			$('.sb-search-input').focus();
		});

		$('#main-navigation').find('> ul > li').each(function(){
            if($(this).find('ul').length >0) {
	            $(this).addClass('dropdown');
	            $(this).find('ul').each(function(){ $(this).addClass('dropdown-menu'); });
	        }
        });
        $('#main-navigation').removeClass('building-menu');

        /* Comment reply class */
        $('a.comment-reply-link').each(function(){
        	$(this).addClass('reply');
        });


		var scroll	=	$(window).scrollTop();
		var height	=	$(window).height();

		/*** set sticky menu ***/
		if( scroll >= height -500 )
		{
			$('.menu-block').addClass("navbar-fixed-top").delay( 2000 ).fadeIn();
		}
		else if ( scroll <= height )
		{
			$('.menu-block').removeClass("navbar-fixed-top");
		}
		else
		{
			$('.menu-block').removeClass("navbar-fixed-top");
		} // set sticky menu - end

		$('.navbar-nav li a, .logo-block a').on('click', function(event)
		{
			var anchor = $(this);

			if( anchor == 'undefined' || anchor == null || anchor.attr('href') == '#' ) { return; }
			if ( anchor.attr('href').indexOf('#') === 0 )
			{
				if( $(anchor.attr('href')).length )
				{
					$('html, body').stop().animate( { scrollTop: $(anchor.attr('href')).offset().top - 72 }, 1500, 'easeInOutExpo' );					
				}
				event.preventDefault();
			}
		});

		$('.goto-next a').on('click', function(event)
		{
			var anchor = $(this);

			if( anchor == 'undefined' || anchor == null || anchor.attr('href') == '#' ) { return; }
			if ( anchor.attr('href').indexOf('#') === 0 )
			{
				if( $(anchor.attr('href')).length )
				{
					$('html, body').stop().animate( { scrollTop: $(anchor.attr('href')).offset().top - 150 }, 1500, 'easeInOutExpo' );			
				}
				event.preventDefault();
			}
		});
		
		/* Window Hight Set to Elements /- */
		var window_height = $(window).height();
		var window_width = $(window).width();


		
		/* Themeton Carousel */
		$(".tt-carousel").each(function(){
			var $self = $(this);
			var $carousel = $self.find('.owl-carousel');
			var items = parseInt($self.data('items'), 10);
			var duration = parseInt($self.data('duration'), 10);

			$carousel.owlCarousel({
				autoPlay: duration,
				items : items,
				itemsDesktop : [1000,2],
				itemsDesktopSmall : [900,2],
				itemsTablet: [700,2],
				itemsMobile : [480,1],
				navigation : true,
				pagination: false
			});
			
		});


				
		$("#default" ).click(function()
		{
			$("#color" ).attr("href", "css/color-schemes/default.css");
			return false;
		});
		
		$("#green" ).click(function()
		{
			$("#color" ).attr("href", "css/color-schemes/green.css");
			return false;
		});
		
		$("#red" ).click(function()
		{
			$("#color" ).attr("href", "css/color-schemes/red.css");
			return false;
		});
		
		$("#yellow" ).click(function()
		{
			$("#color" ).attr("href", "css/color-schemes/yellow.css");
			return false;
		});

		$("#light-green" ).click(function()
		{
			$("#color" ).attr("href", "css/color-schemes/light-green.css");
			return false;
		});

		$("#orange" ).click(function()
		{
			$("#color" ).attr("href", "css/color-schemes/orange.css");
			return false;
		});

		$("#pink" ).click(function()
		{
			$("#color" ).attr("href", "css/color-schemes/pink.css");
			return false;
		});

		$("#black" ).click(function()
		{
			$("#color" ).attr("href", "css/color-schemes/black.css");
			return false;
		});

		// picker buttton
		$(".picker_close").click(function()
		{
			$("#choose_color").toggleClass("position");
		});
		
		/* Type 1 */
		$('.statistics-box').each(function (){
			var $this = $(this);
			var myVal = $(this).data("value");

			$this.appear(function(){
				var statistics_count = 0;
				statistics_count = $this.find('.count').attr( "data-statistics_percent" );
				$this.find('.count').animateNumber({ number: statistics_count }, 2000);		
			});
		});
		
		/* Price Filter */
		$( "#slider-range" ).slider({
			range: true,
			min: 0,
			max: 15000,
			values: [ 0, 10000 ],
			slide: function( event, ui ) {
				$( "#amount" ).html( "$" + ui.values[ 0 ] )
				$( "#amount2" ).html( "$" + ui.values[ 1 ] );
			}
		});
		
		$( "#amount" ).html( "$" + $( "#slider-range" ).slider( "values", 0 ) );
		$( "#amount2" ).html( " $" + $(  "#slider-range" ).slider( "values", 1 ) );	

		/* Portfolio Details Slider */
		$('#portfolio-carousel').flexslider({
			animation: "slide",
			controlNav: false,			
			animationLoop: true,
			slideshow: false,
			itemWidth: 110,
			itemMargin: 10,
			asNavFor: '#portfolio-slider',
		});

		$('#portfolio-slider').flexslider({
			animation: "fade",
			controlNav: false,
			animationLoop: false,
			slideshow: false,
			sync: '#portfolio-carousel',
			directionNav: false
		});
		
		/* Product Details Slider */
		$('#product-carousel').flexslider({
			animation: "slide",
			controlNav: false,
			animationLoop: false,
			slideshow: false,
			itemWidth: 125,
			itemMargin: 10,
			asNavFor: '#product-slider',
		});

		$('#product-slider').flexslider({
			animation: "fade",
			controlNav: false,
			animationLoop: false,
			slideshow: false,
			sync: "#product-carousel",
			directionNav: false
		});


		/* Testimonial carousel */
		$('.testimonial .item:first-child').addClass('active');
		$(".testimonial.boxed .carousel").each(function() {
    		var indicators = $(this).find(".carousel-indicators"); 
    		$(this).find(".carousel-inner").children(".item").each(function(index) {
    		    (index === 0) ?
    		    indicators.append("<li data-target='#myCarousel' data-slide-to='"+index+"' class='active'></li>") : 
    		    indicators.append("<li data-target='#myCarousel' data-slide-to='"+index+"'></li>");
    		});
            $(this).carousel();
        });



		
		/* gMAP */
		$("#gmap").gMap({
			controls: false,
			scrollwheel: true,
			
			markers: [
				{
					latitude: 47.670553,
					longitude: 9.588479,
					icon: {
						image: "images/map-marker.png",
						iconsize: [26, 46],
						iconanchor: [12,46]
					}
				},
				{
					latitude: 47.65197522925437,
					longitude: 9.47845458984375
				},
				{
					latitude: 47.594996,
					longitude: 9.600708,
					icon: {
						image: "images/map-marker.png",
						iconsize: [26, 46],
						iconanchor: [12,46]
					}
				}
			],
			icon: {
				image: "images/map-marker.png", 
				iconsize: [26, 46],
				iconanchor: [12, 46]
			},
			latitude: 47.58969,
			longitude: 9.473413,
			zoom: 10
		});
		
		/* Quick Contact Form */
		$( "#btn_submit" ).on( "click", function(event) {
		  event.preventDefault();
		  var mydata = $("form").serialize();
		  
			$.ajax({
				type: "POST",
				dataType: "json",
				url: "quick-contact.php",
				data: mydata,
				success: function(data) {

					if( data["type"] == "error" ){
						$("#alert-msg").html(data["msg"]);
						$("#alert-msg").removeClass("alert-msg-success");
						$("#alert-msg").addClass("alert-msg-failure");
						$("#alert-msg").show();
					} else {
						$("#alert-msg").html(data["msg"]);
						$("#alert-msg").addClass("alert-msg-success");
						$("#alert-msg").removeClass("alert-msg-failure");					
						$("#quick_name").val("");
						$("#quick_phone").val("");
						$("#quick_email").val("");
						$("#quick_message").val("");
						$("#alert-msg").show();						
					}				
				},
				error: function(xhr, textStatus, errorThrown) {
					//alert(textStatus);
				}
			});
			return false;
			
		});		
		/* Quick Contact Form /- */
		
		/* Contact Form */
		$( "#btn_smt" ).on( "click", function(event) {
		  event.preventDefault();
		  var mydata = $("form").serialize();
		  
			$.ajax({
				type: "POST",
				dataType: "json",
				url: "contact.php",
				data: mydata,
				success: function(data) {
					
					if( data["type"] == "error" ){
						$("#alert-msg").html(data["msg"]);
						$("#alert-msg").removeClass("alert-msg-success");
						$("#alert-msg").addClass("alert-msg-failure");
						$("#alert-msg").show();
					} else {
						$("#alert-msg").html(data["msg"]);
						$("#alert-msg").addClass("alert-msg-success");
						$("#alert-msg").removeClass("alert-msg-failure");					
						$("#input_name").val("");
						$("#input_email").val("");
						$("#input_phone").val("");
						$("#input_street").val("");
						$("#input_category").val("");
						$("#input_city").val("");
						$("#input_state").val("");
						$("#input_zipcode").val("");
						$("#textarea_message").val("");
						$("#alert-msg").show();						
					}

				},
				error: function(xhr, textStatus, errorThrown) {
					//alert(textStatus);
				}
			});
			return false;
			
		});		
		/* Contact Form /- */	



		// This button will increment the value
	    $('.qtyplus').click(function(e){
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('data-field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If is not undefined
	        if (!isNaN(currentVal)) {
	            // Increment
	            $('input[name='+fieldName+']').val(currentVal + 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });
	    // This button will decrement the value till 0
	    $(".qtyminus").click(function(e) {
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('data-field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If it isn't undefined or its greater than 0
	        if (!isNaN(currentVal) && currentVal > 0) {
	            // Decrement one
	            $('input[name='+fieldName+']').val(currentVal - 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });



	    $('.portfolio-image-block .zoom-link').magnificPopup({
			delegate: 'a:first-Child',
			type: 'image',
			tLoading: 'Loading image #%curr%...',
			mainClass: 'mfp-img-mobile',
			gallery: {
				enabled: true,
				navigateByImgClick: true,
				preload: [0,1] // Will preload 0 - before current, and 1 after the current image
			},
			image: {
				tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',				
			}
		});

	    $('a.magnific-pops').magnificPopup({
			type: 'image',
			tLoading: 'Loading image #%curr%...',
			mainClass: 'mfp-img-mobile',
			gallery: {
				enabled: true,
				navigateByImgClick: true,
				preload: [0,1] // Will preload 0 - before current, and 1 after the current image
			},
			image: {
				tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
			}
		});



		/* Woocommerce Ajax Complete Request */
		$(document).ajaxComplete(function( event, request, settings ) {
			if( settings.data.indexOf('action=woocommerce_get_refreshed_fragments')>-1 || settings.data.indexOf('action=woocommerce_add_to_cart')>-1 ){
				var response = request.responseJSON;

				if( typeof response.fragments!=='undefined' && typeof response.fragments['div.widget_shopping_cart_content']!=='undefined' ){
					var cart = response.fragments['div.widget_shopping_cart_content'];
					var $cart = $(cart);
					var total = $cart.find('.total .amount').text();

					var q = 0;
					$cart.find('.quantity').each(function(){
						var $q = $(this);
						$q.find('.amount').remove();
						var s = $q.text();
						s = s.replace(/×/ig, '').replace(/ /ig, '');
						q += parseInt(s, 10);
					});
					$('header .ow-padding-left.cart').find('.amount').text( total );
					$('header .ow-padding-left.cart').find('.cart-icon').text( q );

					// jQuery('.woocommerce-shcart').each(function(){
					// 	var $this = jQuery(this);
					// 	$this.find('.shcart-content').html( cart );

					// 	var count = 0;
					// 	//var total = $this.find('.shcart-content').find('.total .amount').html();
					// 	$this.find('.shcart-content').find('.quantity').each(function(){
					// 		var $quant = jQuery(this).clone();
					// 		$quant.find('.amount').remove();
					// 		count += parseInt($quant.text());
					// 	});

					// 	$this.find('.shcart-display .total-cart').html( count );
					// });
				}
				
			}
		});
		
	    	
		
	});	
	/* document.ready /- */		
	
	/* Event - Window Resize /- */
	$(window).resize(function()
	{
		/* Window Hight Set to Elements /- */
		var window_height = $(window).height();
		var window_width = $(window).width();
		// $(".header").css("height", window_height + "px");
	});
	/* Event - Window Resize /- */


	/* Portfolio Filter */
	$('.portfolio-content').each(function(){
		var $folio = $(this);
		var pager = 1;
		var load_state = true;
		var masonry_state = false;
		var folio_args = $folio.find('.folio-args').html();
		var column_class = $folio.data('column-class');

		var portfolio_lightbox = function(){
			$('.portfolio-image-block .zoom-link').magnificPopup({
				delegate: 'a:first-Child',
				type: 'image',
				tLoading: 'Loading image #%curr%...',
				mainClass: 'mfp-img-mobile',
				gallery: {
					enabled: true,
					navigateByImgClick: true,
					preload: [0,1] // Will preload 0 - before current, and 1 after the current image
				},
				image: {
					tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',				
				}
			});
		};

		portfolio_lightbox();

		$folio.find('.portfolio-categories li a').on('click', function(e) {
			masonry_state = true;

			var filterValue = $(this).parent().attr('data-value');
			filterValue = filterValue!='*' ? '.'+filterValue : filterValue;
            $folio.find('.portfolio-list').isotope({ filter: filterValue });

			$folio.find(".portfolio-categories li a").removeClass('active');
			$(this).addClass('active');
		});

		var loading_state = false;
		$folio.find('.portfolio-loadmore a').on('click', function(e){

			if( !load_state ){ return; }
			if( loading_state ){ return; }

			pager++;
			$.post(
				theme_options.ajax_url, {
					action: 'tt_portfolio_posts',
					pager: pager,
					folio_args: folio_args
				},
				function(data){
					loading_state = false;
					var $result = $.parseJSON(data);
					if( parseInt($result.result,10)>0 ){
						var $items = $('<div></div>').append($result.folio);
						$items.find('> li').each(function(){
							$(this).addClass(column_class);

							if( !masonry_state ){
								$folio.find('ul.portfolio-list').append( $(this) );
							}
							else{
								$folio.find('ul.portfolio-list').append( $(this) );
								$folio.find('ul.portfolio-list').isotope( 'appended', $(this) )
							}
						});

						if( masonry_state ){
							setTimeout(function(){
								$folio.find('ul.portfolio-list').isotope('layout');
							}, 400);
						}

						portfolio_lightbox();
					}
					else{
						load_state = false;
						$folio.find('.portfolio-loadmore a').hide();
					}
				}
			);
			loading_state = true;
		});

	});

	var wow = new WOW(
	{
		boxClass:     'wow',      // animated element css class (default is wow)
		animateClass: 'animated', // animation css class (default is animated)
		offset:       0,          // distance to the element when triggering the animation (default is 0)
		mobile:       true,       // trigger animations on mobile devices (default is true)
		live:         true        // act on asynchronously loaded content (default is true)
	});
	wow.init();
	
	/* Event - Window Load */
	$(window).load(function()
	{	

	});
	/* Event - Window Load /- */
	
	if (!$('html').is('.ie6, .ie7, .ie8'))
	{
		/* Event - Window Load */
		$(window).load(function()
		{		
			/* Loader */
			$("#site-loader").delay(1000).fadeOut("slow");
		});
		/* Event - Window Load /- */
	}
	else
	{
		$("#site-loader").css('display','none');
	}
	
})(jQuery);