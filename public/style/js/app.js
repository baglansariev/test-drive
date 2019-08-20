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


	$('#search').click(function(){
		$('body').css('position', 'relative');
		$('body').append('<div class="search-cover"><form class="search-form" method="post"><input type="text" placeholder="Поиск..."/><input type="submit" value="Поиск"></form></div>');
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

	$('.dg-wrapper a').click(function (e) {
		e.preventDefault();
	});
	$('.dg-center').click(function(e){
		var src = $(this).data('src');
		console.log(src);
	});

	$('.album-image').on('click', function () {
		// console.log($(this).children().find('.album-image-cover'));
		var img = $(this).data('src');
		var download = $(this).data('download');
		$('body').append('<div class="album-image-cover"><div class="album-image-full"><img src="'+ img +'"><a href="' + download + '" class="img-download"><i class="fas fa-download"></i></a><span class="img-close"><i class="fas fa-times"></i></span></div></div>')

		$('.img-close').on('click', function () {
			$('.album-image-cover').remove();
		});
	});
});