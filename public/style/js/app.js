$(function(){


	$('.login-block input').on('focus', function(){
		$('.login-block').css({
			'background-color' : '#E0E0E0',
		});
		$('.login-block i').css({
			'color' : '#c90909',
		});

		$('.password-block').css({
			'background-color' : '#F0F0F0',
		});
		$('.password-block i').css({
			'color' : '#444444',
		});
	});

	$('.password-block input').on('focus', function(){
		$('.password-block').css({
			'background-color' : '#E0E0E0',
		});
		$('.password-block i').css({
			'color' : '#c90909',
		});

		$('.login-block').css({
			'background-color' : '#F0F0F0',
		});
		$('.login-block i').css({
			'color' : '#444444',
		});
	});

	
	$('.owl-carousel').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    responsive:{
	        0:{
	            items:1
	        },
	        600:{
	            items:1
	        },
	        1000:{
	            items:1
	        }
	    }
	});

	// $('.grid').masonry({
	//   // options
	//   itemSelector: '.grid-item',
	//   columnWidth: 200
	// });


	// $('.grid').packery({
	//   // options
	//   itemSelector: '.grid-item',
	//   gutter: 10
	// });


	$('#search').click(function(){
		$('body').css('position', 'relative');
		$('body').append('<div class="search-cover"><form class="search-form"><input type="text" placeholder="Поиск..."/><input type="submit" value="Поиск"></form></div>');
		$('.search-form').animate({
			'width' : '43%',
		}, 500).animate({
			'width' : '40%',
		}, 400);
	});

	$('body').click(function(e){
		if(e.target == $('.search-cover')[0]){
			$('.search-form').animate({
				'width' : '43%',
			}, 400).animate({
				'width' : '0'
			}, 500);
			setTimeout(function(){
				$('.search-cover').remove();
			}, 900);			
		}
	});
});