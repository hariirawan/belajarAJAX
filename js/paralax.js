$(window).scroll(function(event) {
	var wScrool = $(this).scrollTop();
	$('.jumbotron img').css({
		transform: 'translate(0,'+wScrool/1.5+'%)'
	});
	$('.jumbotron h1').css({
		transform: 'translate(0,'+wScrool/1+'%)'
	});
	$('.jumbotron p').css({
		transform: 'translate(0,'+wScrool/0.5+'%)'
	});

});