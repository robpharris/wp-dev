var auto_close;
var winWidth;
var winHeight;
var slider_interval;

var sFunctions = {
	chkHeader : jQuery('header').height(),
};
function close_dd(t,b){
	"use strict";
	if(t.hasClass('open')){
		b.blur();
		t.removeClass('open');
		jQuery('.overlay').hide().appendTo('body');
	}
}
function showDD(this_,time){
	"use strict";
	this_.closest('li').addClass('open');
	jQuery('.overlay').appendTo('li.open').show();
	if(time > 0){
		auto_close = setTimeout(close_dd, time, this_.closest('li'), this_);
	}
}

function smile_slider(n){
	"use strict";
	var num_slides = jQuery('.home-slider > .slide-home').length;
	if(num_slides > 1){
		
		if(n === num_slides){
			n=1;
		}else{
			n++;
		}
		jQuery('.slide-home').removeClass('active');
		jQuery('.home-slider .slide-home:nth-child('+ n + ')').addClass('active');
		
		jQuery('.slide-btn').removeClass('active');	
		jQuery('.slide-btn[data-for-slide="'+n+'"]').addClass('active');	
		//console.log(n);
		slider_interval = setTimeout(smile_slider,12000,n);
		jQuery('.home-slider a').mouseenter(function(){
			clearTimeout(slider_interval);
		});
		jQuery('.home-slider a').mouseleave(function(){
			setTimeout(smile_slider,6000,n);
		});
		
		if(jQuery('.slider-control').length === 0){
			jQuery('.home-slider').append('<div class="slider-control"></div>');
			var sn = 1;
			jQuery('.home-slider > .slide-home').each(function(){
				jQuery('.slider-control').append('<div class="slide-btn" data-for-slide="'+sn+'"></div>');
				if(jQuery(this).hasClass('active')){
					jQuery('.slide-btn[data-for-slide="'+sn+'"]').addClass('active');
				}
				sn++;
			});
			
			jQuery('.slide-btn').click(function(){
				clearTimeout(slider_interval);
				console.log('clicked ' + jQuery(this).data('for-slide'));
				smile_slider(jQuery(this).data('for-slide') - 1);
			});
		}
		
	}else{
		return;
	}
}

function window_resized(){
	"use strict";
	console.log('window resized');
	winWidth = jQuery(window).width();
	winHeight = jQuery(window).height();
	sFunctions.chkHeader = jQuery('header').height();
	setLayout();
}

function setLayout(){
	"use strict";
	if(sFunctions.chkHeader < 101){
		jQuery('.main_body').css("height","calc(100% - 195px)");
	}else{
		jQuery('.main_body').removeAttr('style');
	}
	
	/*if(winWidth < 740){
		console.log('footer should move');
		jQuery('footer').detach().appendTo('.menu-main-menu-container').show();
	}else if(winWidth > 740 && jQuery('.menu-main-menu-container footer').length > 0){
		jQuery('.menu-main-menu-container footer').detach().appendTo('body');	 
 	}*/
	
}

function smile_init(){
	"use strict";
	if(jQuery('.overlay').length === 0){
		jQuery('body').append('<div class="overlay"></div>');
	}
	jQuery('.appt_close').click(function(){close_appt();});
	jQuery('.contact_close').click(function(){close_contact();});
	jQuery('.appt_btn').click(function(e){
		e.preventDefault();
		jQuery('.overlay').addClass('mask').show();
		jQuery('#appointment-form').show();
		jQuery('.overlay.mask').click(function(){
			close_appt();
		});
	});
	winWidth = jQuery(window).width();
	winHeight = jQuery(window).height();
	console.log(winWidth + " -- " + winHeight);
	if(winWidth < 1240){
		jQuery('button.menu_show').click(function(){
			jQuery('.nav_holder').toggleClass('show_menu');
		});
		jQuery('button.close_menu_btn').click(function(){
			jQuery('.nav_holder').toggleClass('show_menu');
		});
	}
	jQuery('.dd_init').click(function(){
		showDD(jQuery(this),7500);
	});
	jQuery('.dd_init').parent().mouseenter(function(){ clearTimeout(auto_close); showDD(jQuery(this),0); });
	jQuery('.overlay').mouseenter(function(){
			clearTimeout(auto_close);
			auto_close = setTimeout(close_dd, 350, jQuery('li.open'), jQuery('li.open .dd_init'));
	});
	setLayout();

	console.log(jQuery(window).height());
	jQuery(window).scroll(function(){
		//console.log("Scrolling: " + jQuery(window).scrollTop());
		if(jQuery(window).scrollTop() > jQuery(window).height()) {
			jQuery('#btn_back_top').fadeIn('fast');
		}else{
			jQuery('#btn_back_top').fadeOut('fast');
		}
	});

	jQuery(window).resize(function(){
		window_resized();
	});
	if(jQuery('.home-slider').length === 1){
		//smile_slider(1);
	}
	jQuery('.smooth-scroll a').click(function(e){
		e.preventDefault();
		var hash = jQuery(this).attr('href');
		//console.log(jQuery(this));
		jQuery('html,body').animate({
			scrollTop: jQuery(hash).offset().top
		}, 800, function(){
			window.location.hash = hash;
		});
	});

	if(jQuery('.wonderplugin-pdf-iframe').length > 0 && jQuery(window).width() > 1200){
		jQuery('.wonderplugin-pdf-iframe').css({'min-height': '1200px'})
	}

	jQuery('.contact_show').click(function(e){
		e.preventDefault();
		close_dd(jQuery('li.open'),jQuery('li.open .dd_init'));
		var cntc = jQuery(this).attr('href');
		console.log(cntc);
		jQuery(cntc).fadeIn('fast');
		jQuery('.overlay').addClass('mask').show();
	});
	
}

function close_appt(){
	"use strict";
	jQuery('#appointment-form').hide();
	jQuery('.overlay').removeClass('mask').hide();
}
function close_contact(){
	"use strict";
	jQuery('#contact_holder').fadeOut('fast');
	jQuery('.overlay').removeClass('mask').hide();
}

jQuery(document).ready(function(){
	"use strict";
	smile_init();
 });