(function(){
	'use strict';
	if($('.top-bar').length>0)
		var t = $('.top-bar').height();
	else t=0;
	$('.header-div .arrow').click(function(){

		if($(this).parent().hasClass('hover')){
			$(this).parent().removeClass("hover");
		}else{
			$(this).parent().addClass("hover");
		}
	});
	$('.search-parent > a').click(function(){

		if($(this).parent().hasClass('active')){
			$(this).parent().removeClass("active");
		}else{
			$(this).parent().addClass("active");
		}
		$('.cart-parent').removeClass("active");
		$('#menu').removeClass("in");
	});
	$('.cart-parent > a').click(function(){

		if($(this).parent().hasClass('active')){
			$(this).parent().removeClass("active");
		}else{
			$(this).parent().addClass("active");
		}
		$('.search-parent').removeClass("active");
		$('#menu').removeClass("in");
	});
	$('.close-btn').click(function(){
		$('.search-parent').removeClass("active");
		$('#menu li').removeClass("hover");
		$('.cart-parent').removeClass("active");


	});
	$('.menu-icon').click(function(){
		$('.search-parent').removeClass("active");
		$('.cart-parent').removeClass("active");
	})
	$('#menu li').click(function(){
		if($(window).width()<1001){
			$('.search-parent').removeClass("active");
			$('.cart-parent').removeClass("active");
		}
	});
	var k=0;
	$(window).scroll(function(){
		if($(window).width()>1000){
			if($(window).scrollTop()>200+t){
				$('.header-div').removeAttr('style').addClass('pin');
			}else{

				$('.header-div').css({top:-$(window).scrollTop()}).removeClass('pin');
			}if($(window).scrollTop()>150+t){
				$('.header-div').addClass('before');
			}else{

				$('.header-div').removeClass('before');
			}

		}else{

			//$('.header-div').css({top:$(window).scrollTop()})
			if($(window).scrollTop()<k){
				$('.header-div').addClass('off').removeClass('woff').removeAttr('style');
				$('#menu').removeClass('in');
				$('.search-parent').removeClass('active');
				$('.cart-parent').removeClass('active');
				k=0;
			}
		}
		if($(window).scrollTop()>t){
			if(!$('.header-div').hasClass('woff')){
				$('.header-div').addClass('pin-start').addClass('off');
			}

		}else{
			$('.header-div').removeClass('pin-start').removeClass('off');
		}
	});
	if($(window).scrollTop()>150+t){
		$('.header-div').addClass('pin');
	}else{
		$('.header-div').removeAttr('style').removeClass('pin');
	}
	$(window).resize(function(){
		if($(window).width()>1000){
			$('.header-div').removeAttr('style');
		}
	});
	if($(window).scrollTop()>t){
		$('.header-div').addClass('off').addClass('pin-start');
	}else{
		$('.header-div').removeClass('off').removeClass('pin-start');
	}
	$('.menu-icon').click(function(){
		if($('#menu').hasClass('in')){
			$('.header-div').addClass('off').removeClass('woff').removeAttr('style');
			if($(window).scrollTop()>t){
				if(!$('.header-div').hasClass('woff')){
					$('.header-div').addClass('pin-start').addClass('off');
				}

			}else{
				$('.header-div').removeClass('pin-start').removeClass('off');
			}

		}else{
			k=$(window).scrollTop();
			$('.header-div').removeClass('off').addClass('woff').css({top:$(window).scrollTop()});
		}
	})

	$('.cart-parent >a').click(function(){
		if($(window).width()<1001){
			if(!$('.cart-parent').hasClass('active')){
				$('.header-div').addClass('off').removeClass('woff').removeAttr('style');
				if($(window).scrollTop()>t){
					if(!$('.header-div').hasClass('woff')){
						$('.header-div').addClass('pin-start').addClass('off');
					}

				}else{
					$('.header-div').removeClass('pin-start').removeClass('off');
				}
			}else{
				k=$(window).scrollTop();
				$('.header-div').removeClass('off').addClass('woff').css({top:$(window).scrollTop()});
			}
		}
	})
	$('.search-parent >a').click(function(){
		if($(window).width()<1001){
			if(!$('.search-parent').hasClass('active')){
				$('.header-div').addClass('off').removeClass('woff').removeAttr('style');
				if($(window).scrollTop()>t){
					if(!$('.header-div').hasClass('woff')){
						$('.header-div').addClass('pin-start').addClass('off');
					}

				}else{
					$('.header-div').removeClass('pin-start').removeClass('off');
				}
			}else{
				k=$(window).scrollTop();
				$('.header-div').removeClass('off').addClass('woff').css({top:$(window).scrollTop()});
			}
		}
	})
})();