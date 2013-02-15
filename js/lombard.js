$(window).load(function(){
	
	var body = $('body');
	
	// ------ Services icon text ----- //
	
	var desc = $('a.desc');
	desc.each(function(){
		$this = $(this);
		$this.css({
			'padding-top': 45-$this.height()/2,
			'padding-bottom': 45-$this.height()/2
		})
	});
	
	// -------- Submenus ------------- //
	
	
		var services = $('header li.menu-item-22');
		
		services.mouseenter(function(){
			services.find('.sub-menu').slideDown('fast');
		}).mouseleave(function(){
			services.find('.sub-menu').slideUp('fast');
		});
		
		services.find('.sub-menu a').prepend('&gt;&nbsp;&nbsp;&nbsp;');
		
		var schedule = $('header li.menu-item-70');
		
		schedule.mouseenter(function(){
			schedule.find('.sub-menu').slideDown('fast');
		}).mouseleave(function(){
			schedule.find('.sub-menu').slideUp('fast');
		});
		
		schedule.find('.sub-menu a').prepend('&gt;&nbsp;&nbsp;&nbsp;');
	
	
	// Site title aligned with logo //
	
	var logo = $('#logo'),
		title = logo.closest('a').next('hgroup').find('h1,h3');
		
		title.css('margin-top',.15*logo.height());
		$(window).resize(function(){
			logoHeight = logo.height();
			title.css('margin-top',.15*logoHeight);
		});
	
	// -------- Callout rotators ----- //
	
	var rotator = $('#rotator'),
		circles = $('#circles'),
		callout = $('#callout');
	
	rotator.find('li:first').css('display','block');

	var num = 1;
    var rotate = function(){
		num++;
        setTimeout(function(i){
			rotator.find('li:first').fadeIn(500, function(){
				$(this).detach().appendTo('ul#rotator').delay(3000).fadeOut(500);
			});
			if (num>2) {
				circles.find('li:last-child').detach().insertBefore(circles.find('li:first-child'));
			}
			rotate();
		}, 4000);
		
    };
    rotate();
	
	var callouts = rotator.find('li');
	
	var rotatorHeight=0; // the height of the highest element (after the function runs)
	var biggest;  // the highest element (after the function runs)
	callouts.each(function(){
		$this = $(this);
		if ( $this.height() > rotatorHeight ) {
			biggest=$this;
			rotatorHeight=$this.height();
		}
	});
	rotator.height(rotatorHeight+30);
	
	$(window).resize(function(){
		var rotatorHeight=0; // the height of the highest element (after the function runs)
		var biggest;  // the highest element (after the function runs)
		callouts.each(function(){
			$this = $(this);
			if ( $this.height() > rotatorHeight ) {
				biggest=$this;
				rotatorHeight=$this.height();
			}
		});
		rotator.height(rotatorHeight+30);
	});
	
	// --------- Borders with rounded edges -------- //
	
	callout.prepend('<div class="roundborder"></div>');
	callout.append('<div class="roundborder"></div>');
	
	$('#left-nav li:first-child').before('<div class="roundborder show-on-phones"></div>');
	$('#left-nav li:not(:last-child)').after('<div class="roundborder"></div>');
	$('#left-nav li:last-child').after('<div class="roundborder"></div>');
	
	$('article.excerpt:not(:last)').after('<div class="roundborder" style="margin-bottom:10px;"></div>');
	
	// ----- Form errors --------- //
	
	$('.error').prev('input,textarea').css('border','3px solid #4B2B34');
	
	// ----------- MAP ----------- //
	
	var icon = $('.map-icon');
	
	icon.each(function(){
		$this = $(this);
		var textual = $(this).find('span'),
			textWidth = textual.outerWidth(),
			aside = textual.closest('aside'),
			photoDiv = aside.next('.photo'),
			photo = photoDiv.find('img'),
			photoWidth = photo.width();
			
		$this.append('<div class="triangle"></div>');	
		
		aside.css({
			left:-300,
			height:0
			});
		photoDiv.css({
			left:-textWidth-4,
			top:-135,
			width:textWidth+48
		});
		textual.css('right',-textWidth);	
		
		$this.mouseenter(function(){
			textual.animate({
				right: 0
			},250);
			aside.css('height',40);
			photoDiv.css('height',135);
			photo.delay(250).animate({
				top: 0
			},250);
		}).mouseleave(function(){
			photo.animate({
				top: 200
			},250);
			textual.delay(250).animate({
				right: -textWidth
			},250);
			photoDiv.delay(500).animate({height:0},1);
			aside.delay(500).animate({height:0},1);
		});
	});
	
	
});